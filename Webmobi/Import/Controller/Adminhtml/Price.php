<?php
namespace Webmobi\Import\Controller\Adminhtml;

/**
 * Admin blog feed edit controller
 */
class Price extends Actions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'import_price_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Webmobi_Import::price';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Webmobi\Import\Model\Price';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Webmobi_Import::price';

    /**
     * Status price name
     * @var string
     */
    protected $_statusField     = 'is_active';

    /**
     * Save request params key
     * @var string
     */
    protected $_paramsHolder 	= 'price';
	
	
	protected $_idKey = 'price_id';
}
