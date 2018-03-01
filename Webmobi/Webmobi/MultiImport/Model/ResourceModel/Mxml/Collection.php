<?php 
	
namespace Webmobi\MultiImport\Model\ResourceModel\Mxml;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webmobi\MultiImport\Model\Mxml', 'Webmobi\MultiImport\Model\ResourceModel\Mxml');
    }
}