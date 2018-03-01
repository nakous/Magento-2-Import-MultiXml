<?php
namespace Webmobi\MultiImport\Block\Adminhtml;

use Webmobi\MultiImport\Api\Data\MXmlInterface;
use Webmobi\MultiImport\Model\ResourceModel\Mxml\CollectionFactory;
use Webmobi\MultiImport\Model\ResourceModel\Mxml\Collection as MxmlCollection;  
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Framework\DataObject\IdentityInterface;

class Mxml extends Template implements IdentityInterface
{
    /**
     * @var Webmobi\MultiImport\Model\ResourceModel\Post\CollectionFactory
     */
    protected $_xmlCollectionFactory;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param Webmobi\MultiImport\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $postCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_xmlCollectionFactory = $postCollectionFactory;
    }
	
    /**
     * @return Webmobi\MultiImport\Model\ResourceModel\Post\Collection
     */
    public function getXmls()
    {
        // Check if posts has already been defined
        // makes our block nice and re-usable! We could
        // pass the 'posts' data to this block, with a collection
        // that has been filtered differently!
        if (!$this->hasData('posts')) {
            $posts = $this->_xmlCollectionFactory
                ->create();
                // ->addFilter('is_active', 1)
                // ->addOrder(
                    // PostInterface::CREATION_TIME,
                    // MxmlCollection::SORT_ORDER_DESC
                // );
            $this->setData('posts', $posts);
        }
        return $this->getData('posts');
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [Webmobi\MultiImport\Model\Mxml::CACHE_TAG . '_' . 'list'];
    }

}