<?php
namespace Webmobi\Import\Controller\Adminhtml;

/**
 * Admin blog feed edit controller
 */
class Feed extends Actions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'import_feed_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Webmobi_Import::feed';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Webmobi\Blog\Model\Feed';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Webmobi_Import::feed';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'is_active';

    /**
     * Save request params key
     * @var string
     */
    protected $_paramsHolder 	= 'feed';
}
