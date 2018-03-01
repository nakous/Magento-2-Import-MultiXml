<?php
namespace  Webmobi\Import\Model;

use Webmobi\Import\Api\Data\FieldInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Field extends AbstractModel
    implements FieldInterface, IdentityInterface
{
    /**
     * cache tag
     */
    const CACHE_TAG = 'import_field';
	 /**
     * @var string
     */
    protected $_cacheTag = 'import_field';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'import_field';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webmobi\Import\Model\ResourceModel\Field');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
	 
	 public function getId(){
		 return $this->getData(self::FIELD_ID);
	} 
	 public function getProdItem(){
		 return $this->getData(self::PROD_ITEM);
	}
	 public function getProdId(){
		 return $this->getData(self::PROD_ID);
	}
	 public function getTitle(){
		 return $this->getData(self::TITLE);
	}
	 public function getDescription(){
		 return $this->getData(self::DESC);
	}
	 public function getImages(){
		 return $this->getData(self::IMAGES);
	}
	 public function getAttributes(){
		 return $this->getData(self::ATTR);
	}
	 public function getStock(){
		 return $this->getData(self::STOCK);
	}
	 public function getPrice(){
		 return $this->getData(self::PRICE);
	}
	 public function getFeed(){
		 return $this->getData(self::FEED);
	}
	 public function getSpecialPrice(){
		 return $this->getData(self::SPS_PRICE);
	}
	 public function getAdditionalImages(){
		 return $this->getData(self::ADDIT_IMAGES);
	}
	 public function getSecondDescription(){
		 return $this->getData(self::SECOND_DESC);
	}
	public function getMetaT(){
		 return $this->getData(self::META_T);
	}
	 public function getMetaK(){
		 return $this->getData(self::META_K);
	}
	 public function getMetaD(){
		 return $this->getData(self::META_D);
	}
	 
	 public function setId($id){
		return $this->setData(self::FIELD_ID, $id);
	}
	 public function setProdId($prod_id){
		return $this->setData(self::PROD_ID, $prod_id);
	} 
	 public function setProdItem($prod_item){
		return $this->setData(self::PROD_ITEM, $prod_item);
	}
	 public function setTitle($titre){
		return $this->setData(self::TITLE, $titre);
	}
	 public function setDescription($description){
		return $this->setData(self::DESC, $description);
	}
	 public function setImages($images){
		return $this->setData(self::IMAGES, $images);
	}
	 public function setAttributes($attributes){
		return $this->setData(self::ATTR, $attributes);
	}
	 public function setStock($stock){
		return $this->setData(self::STOCK, $stock);
	}
	 public function setPrice($price){
		return $this->setData(self::PRICE, $price);
	}
	 public function setFeed($feed){
		return $this->setData(self::FEED, $feed);
	}
	 public function setSpecialPrice($special_price){
		return $this->setData(self::SPS_PRICE, $special_price);
	}
	 public function setAdditionalImages($additional_images){
		return $this->setData(self::ADDIT_IMAGES, $additional_images);
	}
	 public function setSecondDescription($second_description){
		return $this->setData(self::SECOND_DESC, $second_description);
	}
	 public function setMetaT($meta_t){
		return $this->setData(self::META_T, $meta_t);
	}
	 public function setMetaK($meta_k){
		return $this->setData(self::META_K, $meta_k);
	}
	 public function setMetaD($meta_d){
		return $this->setData(self::META_D, $meta_d);
	}
}