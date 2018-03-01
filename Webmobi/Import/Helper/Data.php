<?php 
namespace Webmobi\Import\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use  Webmobi\Import\Service;
class Data extends AbstractHelper
{	
	private $url ;
	private $field =array(0=>'Any');
	private $parent_node;
	protected $importimageservice;
	
	public function __construct(
		$url,
		$parent
	) {
		$this->importimageservice = new \Webmobi\Import\Service\ImportImageService();
		$this->url = $url;
		$this->parent_node = $parent;
	}

	public function load()
	{
		$products=array();
		if(empty($this->url))
			return false;
		// echo "------";
		// echo $this->parent_node;
		$xml = file_get_contents($this->url);
		$root = new  \SimpleXMLElement($xml);
		if($this->parent_node!=null)
			$products=$root->xpath('//'.$this->parent_node);
		return $products;
	}

	private function get_node_attr($node,$path=""){
		
		foreach($node->attributes() as $ky=>$val){
			$this->field[$path."/@".$ky]= $path."/@".$ky;
		}
	}
	
	private function get_tree_xml_node($products,$node_product){
		
		// $this->get_node_attr($products,$node_product);
		// print_r($products);
		if(count($products))
			foreach ($products as $key=>$second_gen) {
				$path=$node_product.'/'.$key;
				if (is_numeric($key)) 
					$path=$node_product;
				$this->field[$path]= $path;
				$this->get_node_attr($second_gen,$path);
				if(count($second_gen->children())!=0)
					$this->get_tree_xml_node($second_gen,$path);
			}
	}
	public function array_node(){
		$products=$this->load();
		if(!empty($products));
			$this->get_tree_xml_node($products,$this->parent_node);
			
		return array_unique($this->field);
	}
	
	
	/**
     * Prepare form
     *
     * @return $this
     */
	public function special_price( $price_arr,$price){
		
		foreach ($price_arr as $el){
			if($el["added"]!=0){
				$added=1+ ($el["added"]/100);
				if($el["pricemin"] < $price && $el["pricemax"]==0 ){
					return $price*$added;
				} else if($el["pricemin"]==0 && $el["pricemax"] > $price){
					return $price*$added;
				}else if($el["pricemin"] <= $price && $el["pricemax"] >= $price  ){
					return $price*$added;
				}
				
			}
		}
		return $price;
	}
	public function additional_images($element,$parent,$second_gen){
			$val=array();
			if($element && !empty($element)){
				$path =str_replace($parent."/", "", $element);
			
					foreach($second_gen->xpath($path) as $el)
						$val[] = (string) $el ;
			}
			return $val;
		}
	public function field_get_val($element,$parent,$second_gen){
		$val=false;
		if($element && !empty($element)){
			$path =str_replace($parent."/", "", $element);
			
			if(isset($second_gen->{$path}))
				$val = $second_gen->{$path}  ;
			
			// if(is_object($val ))
				// $val = $val->asXML()  ;
		} 
		return $val;
	}
	public function xml_node_to_product($feed_id){
					$products=array();
					
					$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
					
					
					// $product = $objectManager->get('\Magento\Catalog\Model\Product');
					// $product->loadByAttribute('sku', "T1245");  
					// $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
					
					
					// $productObject = $objectManager->get('Magento\Catalog\Model\Product');
					// $product = $productObject->loadByAttribute('sku', "T1245");
					// echo $product->getName();
					// print_r($product->getData());
					  // echo $product->getName();
					// exit;
					
					
					$feedclass = $objectManager->create('\Webmobi\Import\Model\Feed');
					$feed=$feedclass->load($feed_id);
					if(!$feed)
						return;
					
					$fieldclass = $objectManager->create('\Webmobi\Import\Model\Field');
					$field=$fieldclass->load($feed_id,'feed_id');
					
					if($feed->getPrice()==1){
						$rclass =$objectManager->create("Webmobi\Import\Model\ResourceModel\Feed");
						$price_arr = $rclass->getAllPrice($feed_id);
						
					}
					 
					
					$this->parent_node= $field->getProdItem();

					$xml_products=$this->load();
					
					foreach ($xml_products as $key=>$second_gen) {
							$is_in_stock=0;
							$product = $objectManager->create('Magento\Catalog\Model\Product');
							$prodId= (string) $this->field_get_val($field->getProdId(),$field->getProdItem(),$second_gen);
							
							// Check Product exist
							$productObject = $objectManager->get('Magento\Catalog\Model\Product');
							$fproduct = $productObject->loadByAttribute('sku', $feed->getSKU().$prodId);
							if($fproduct) {
								print  " - The product : ".$fproduct->getId()." - ". $fproduct->getName()." is Already existed <b> \n";
								continue;
							}
							
							$title 				= (string) $this->field_get_val($field->getTitle(),$field->getProdItem(),$second_gen);
							$price 				= (float) $this->field_get_val($field->getPrice(),$field->getProdItem(),$second_gen);
							if($feed->getPrice()==1){
								$special_price=$this->special_price( $price_arr,$price);								
							}else{
								$special_price 		= (float) $this->field_get_val($field->getSpecialPrice(),$field->getProdItem(),$second_gen);
							}
							$description		= (string) $this->field_get_val($field->getDescription(),$field->getProdItem(),$second_gen);
							$description2		= (string) $this->field_get_val($field->getSecondDescription(),$field->getProdItem(),$second_gen);
							
							$meta_t		= (string) $this->field_get_val($field->getMetaT(),$field->getProdItem(),$second_gen);
							$meta_k		= (string) $this->field_get_val($field->getMetaK(),$field->getProdItem(),$second_gen);
							$meta_d		= (string) $this->field_get_val($field->getMetaD(),$field->getProdItem(),$second_gen);
							
							$stock 				= (int) $this->field_get_val($field->getStock(),$field->getProdItem(),$second_gen);
							$image 				= (string) $this->field_get_val($field->getImages(),$field->getProdItem(),$second_gen);
							$additional_images 	= $this->additional_images($field->getAdditionalImages(),$field->getProdItem(),$second_gen);
							// print_r($additional_images);
							
							if ($stock>0)
								$is_in_stock=1;
							
							// Validation de product 
							if(empty($prodId)){
								print  " - The product ID Not found! \n";
								continue;
							}
							if(empty($title)){
								print  " - The product name Not found! \n";
								continue;
							}
							
							
							$product->setStoreId(0);
							$product->setSku($feed->getSKU().$prodId); // Set your sku here
							$product->setName($title); // Name of Product
							$product->setDescription($description.' '.$description2);
							$product->setAttributeSetId($product->getDefaultAttributeSetId()); // Attribute set id
							$product->setStatus(2); // Status on product enabled/ disabled 1/0
							// $product->setWeight(10); // weight of product
							$product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
							$product->setTaxClassId(0); // Tax class id
							$product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
							$product->setPrice($price); // price of product
							
							$product->setMetaTitle($meta_t);
							$product->setMetaKeyword($meta_k);
							$product->setMetaDescription($meta_d);
						
							if(!empty($special_price))
								$product->setSpecialPrice($special_price); 
							
							$product->setStockData(
											array(
											'use_config_manage_stock' => 0,
											'manage_stock' => 1,
											'is_in_stock' => $is_in_stock,
											'qty' => $stock
										)
								);
							 	
							$product->save();
							print $product->getId(). " - product : ". $product->getName()." has been Created  <b> \n";
								
								if($this->UR_exists($image)){
										$imagePath=$this->importimageservice->execute($image);
										$product->addImageToMediaGallery($imagePath, array('image', 'small_image', 'thumbnail'), false, false);								 										 
										// $product->save();
								}
							
								if(count($additional_images))
									foreach($additional_images as $img){
										if($this->UR_exists($img)){
											$imagePath=$this->importimageservice->execute($img);
											$product->addImageToMediaGallery($imagePath, null, false, false);								 										 
											// $product->save();
										}
									} 
								// $products[]=$product;
										$product->save();
						}
				print 'The cron finished with successfully :)';
		return $products;
	}
	public function UR_exists($url){
		// if(empty($url))
			// return false;

		// $ext = pathinfo($url, PATHINFO_EXTENSION);
		// $imgExts = array("gif", "jpg", "jpeg", "png");
		// $ext=strtolower ( $ext);
		// if ( !in_array($ext, $imgExts) ){
			// return false;
			// }
		// $headers=get_headers($url);
		// return stripos($headers[0],"200 OK")?true:false;
		$url=trim($url);
		$imgExts = array("image/gif", "image/jpg", "image/jpeg", "image/png");
		if(empty($url))
			return false;
		if (!filter_var($url, FILTER_VALIDATE_URL)) {
			return false;
		}
		 $headers=get_headers($url,1);
		
		if (!stripos($headers[0],"200 OK")){
			return false;
			}
			
		
		if (  $headers['Content-Length'] == 0 ){
			return false;
		}
		if ( !in_array($headers['Content-Type'], $imgExts) ){
			return false;
		}
 
		return true;
	}
}
