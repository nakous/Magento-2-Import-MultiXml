<?php
namespace Webmobi\Import\Api\Data;

interface FeedInterface
{
    const FEED_ID      	= 'feed_id';
    const NAME      	= 'name';
    const URL        	= 'url';
    const CREATEDAT     = 'created_at';
    const STATUS 		= 'status';
    const PRICE  		= 'price';
    const PARENTTAG 	= 'parenttag';

	
    public function getId();
    public function getName();
    public function getUrl();
    public function getCreatedAt();
    public function getStatus();
    public function getPrice();
    public function getParent();
	
	
	public function setId($id);
    public function setName($name);
    public function setUrl($url);
    public function setCreatedAt($created_at);
    public function setStatus($status);
    public function setPrant($paret);
    public function setPrice($price);
}