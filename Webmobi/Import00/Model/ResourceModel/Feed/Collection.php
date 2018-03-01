<?php 
	
namespace Webmobi\Import\Model\ResourceModel\Feed;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'feed_id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webmobi\Import\Model\Feed', 'Webmobi\Import\Model\ResourceModel\Feed');
    }
}