<?php
namespace  Webmobi\Import\Model;

use Webmobi\Import\Api\Data\PriceInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Price extends AbstractModel
    implements PriceInterface, IdentityInterface
{
    /**
     * cache tag
     */
    const CACHE_TAG = 'import_price';
	 /**
     * @var string
     */
    protected $_cacheTag = 'import_price';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'import_price';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webmobi\Import\Model\ResourceModel\Price');
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
		 return $this->getData(self::PRICE_ID);
	}
	public function getPricemin(){
		 return $this->getData(self::PRICEMIN);
	}
	public function getPricemax(){
		 return $this->getData(self::PRICEMAX);
	}
	public function getAdded(){
		 return $this->getData(self::ADDED);
	}
	public function getFeed(){
		 return $this->getData(self::FEED_ID);
	}

	public function setId($id){
		return $this->setData(self::PRICE_ID, $id);
	}
	public function setPricemin($pricemin){
		return $this->setData(self::PRICEMIN, $pricemin);
	}
	public function setPricemax($pricemax){
		return $this->setData(self::PRICEMAX, $pricemax);
	}
	public function setAdded($added){
		return $this->setData(self::ADDED, $added);
	}
	public function setFeed($feed){
		return $this->setData(self::FEED_ID, $feed);
	}
}