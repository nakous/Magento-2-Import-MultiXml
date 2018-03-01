<?php
namespace Webmobi\MultiImport\Api\Data;

interface MXmlInterface
{
    const XML_ID      	= 'id';
    const NAME      	= 'name';
    const URL        	= 'url';
    const CREATEDAT     = 'created_at';
    const STATUS 		= 'status';
    const PRICE  		= 'price';

	
    public function getId();
    public function getName();
    public function getUrl();
    public function getCreatedAt();
    public function getStatus();
    public function getPrice();
	
	
	public function setId($id);
    public function setName($name);
    public function setUrl($url);
    public function setCreatedAt($created_at);
    public function setStatus($status);
    public function setPrice($price);
}