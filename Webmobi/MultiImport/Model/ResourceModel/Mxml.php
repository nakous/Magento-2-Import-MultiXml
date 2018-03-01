<?php
namespace  Webmobi\MultiImport\Model\ResourceModel;

/**
 * Easyslide Slider mysql resource
 */
class Mxml extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('multiimport_xml', 'id');
    }

	public function getXmls()
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from(
            $this->getTable('multiimport_xml'))
        ->where('status = ?', 1)
        ->order('sort_order');

        return $connection->fetchAll($select);
    }
	
	public function getXml($id)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from(
            $this->getTable('multiimport_xml'))
        ->where('id = ?', $id);

        return $connection->fetchAll($select);
    }
}