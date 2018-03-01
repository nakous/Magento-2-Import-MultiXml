<?php
namespace Webmobi\Import\Controller\Adminhtml;

/**
 * Admin blog feed edit controller
 */
class Field extends Actions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'import_field_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Webmobi_Import::field';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Webmobi\Import\Model\Field';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Webmobi_Import::field';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'is_active';

    /**
     * Save request params key
     * @var string
     */
    protected $_paramsHolder 	= 'field';
	
	
	protected $_idKey = 'field_id';
}
