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
        $this->_headerText = __('Field');
        $this->_addButtonLabel = __('Edit fields');
        parent::_construct();
    }
}
