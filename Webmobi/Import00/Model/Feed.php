<?php
namespace  Webmobi\Import\Model;

use Webmobi\Import\Api\Data\FeedInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Feed extends AbstractModel
    implements FeedInterface, IdentityInterface
{
    /**
     * cache tag
     */
    const CACHE_TAG = 'import_feed';
	 /**
     * @var string
     */
    protected $_cacheTag = 'import_feed';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'import_feed';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webmobi\Import\Model\ResourceModel\Feed');
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
        return $this->getData(self::FEED_ID);
    }

    public function getName(){
        return $this->getData(self::NAME);
    }

    public function getUrl(){
        return $this->getData(self::URL);
    }

    public function getCreatedAt(){
        return $this->getData(self::CREATEDAT);
    }

    public function getStatus(){
        return $this->getData(self::STATUS);
    }

    public function getPrice(){
        return $this->getData(self::PRICE);
    }   
	public function getParent(){
        return $this->getData(self::PARENTTAG);
    }

	public function setId($id){
        return $this->setData(self::FEED_ID, $id);
    }
    public function setName($name){
        return $this->setData(self::NAME, $name);
    }
    public function setUrl($url){
        return $this->setData(self::URL, $url);
    }
    public function setCreatedAt($created_at){
        return $this->setData(self::CREATEDAT, $created_at);
    }
    public function setStatus($status){
        return $this->setData(self::STATUS, $status);
    }
    public function setPrice($price){
        return $this->setData(self::PRICE, $price);
    }   
	public function setParent($parent){
        return $this->setData(self::PARENTTAG, $parent);
    }
}