<?php
namespace  Webmobi\Import\Model\ResourceModel;

/**
 * Easyslide Slider mysql resource
 */
class Field extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('import_field', 'field_id');
    }

	public function getFields($feed_id)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from($this->getTable('import_field'))
        ->where('field_id = ?', $feed_id)
        ->order('sort_order');

        return $connection->fetchAll($select);
    }
	
	public function getField($id)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from(
            $this->getTable('import_field'))
        ->where('field_id = ?', $id);

        return $connection->fetchAll($select);
    }
}