<?php
namespace  Webmobi\Import\Model\ResourceModel;

/**
 * Easyslide Slider mysql resource
 */
class Feed extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('import_feed', 'feed_id');
    }

	public function getFeeds()
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from(
            $this->getTable('import_feed'))
        ->where('status = ?', 1)
        ->order('sort_order');

        return $connection->fetchAll($select);
    }
	
	public function getFeed($id)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from(
            $this->getTable('import_feed'))
        ->where('id = ?', $id);

        return $connection->fetchAll($select);
    }
}