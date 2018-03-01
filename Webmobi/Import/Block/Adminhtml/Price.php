<?php
namespace Webmobi\Import\Block\Adminhtml;

/**
 * Admin blog post
 */
class Price extends \Magento\Backend\Block\Widget\Grid\Container
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
        $this->_headerText = __('Price');
        $this->_addButtonLabel = __('Edit Prices');
        parent::_construct();
    }
}
