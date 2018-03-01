<?php
namespace Webmobi\Import\Api\Data;

interface FieldInterface
{
	
	const FIELD_ID      = 'field_id';
	const PROD_ID      	= 'prod_id';
	const PROD_ITEM     = 'prod_item';
	const TITLE      	= 'titre';
	const DESC      	= 'description';
	const IMAGES      	= 'images';
	const ATTR        	= 'attributes';
	const STOCK     	= 'stock';
	const PRICE 		= 'price';
	const FEED  		= 'feed_id';
	const SPS_PRICE		= 'special_price';
	const ADDIT_IMAGES	= 'additional_images';
	const SECOND_DESC  	= 'second_description';
	
	const META_T		= 'meta_t';
	const META_K		= 'meta_k';
	const META_D		= 'meta_d';
	// special_price
	// additional_images
	// second_description
	 public function getId();
	 public function getProdId();
	 public function getProdItem();
	 public function getTitle();
	 public function getDescription();
	 public function getImages();
	 public function getAttributes();
	 public function getStock();
	 public function getPrice();
	 public function getFeed();
	 public function getSpecialPrice();
	 public function getAdditionalImages();
	 public function getSecondDescription();
	 public function getMetaT();
	 public function getMetaK();
	 public function getMetaD();
	 
	 
	 
	 public function setId($id);
	 public function setProdId($prod_id);
	 public function setProdItem($prod_item);
	 public function setTitle($titre);
	 public function setDescription($description);
	 public function setImages($images);
	 public function setAttributes($attributes);
	 public function setStock($stock);
	 public function setPrice($price);
	 public function setSpecialPrice($special_price);
	 public function setAdditionalImages($additional_images);
	 public function setSecondDescription($second_description);
	 public function setFeed($feed);
	 public function setMetaT($meta_t);
	 public function setMetaK($meta_k);
	 public function setMetaD($meta_d);

}