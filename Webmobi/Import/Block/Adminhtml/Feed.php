<?php
namespace Webmobi\Import\Block\Adminhtml;

/**
 * Admin blog post
 */
class Feed extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml';
        $this->_blockGroup = 'Webmobi_Import';
        $this->_headerText = __('Feed');
        $this->_addButtonLabel = __('Add New Feed');
        parent::_construct();
    }
}
