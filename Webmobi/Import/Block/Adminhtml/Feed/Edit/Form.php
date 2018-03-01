<?php
namespace Webmobi\Import\Block\Adminhtml\Feed\Edit;

/**
 * Adminhtml cms page edit form block
 *
 * 
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
		$model = $this->_coreRegistry->registry('current_model');
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );
		$fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );
		 $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Feed Title'), 'title' => __('Feed Title'), 'required' => true]
        );		 
		
		$fieldset->addField(
            'sku',
            'text',
            ['name' => 'sku', 'label' => __('Sku perfix'), 'title' => __('Sku perfix')]
        );
		$fieldset->addField(
            'parenttag',
            'text',
            ['name' => 'parenttag', 'label' => __('Parent tag name'), 'title' => __('Parent Tag name'), 'required' => true]
        );
		$fieldset->addField(
            'url',
            'text',
            [
                'name' => 'url',
                'label' => __('URL XML'),
                'title' => __('URL XML'),
                'required' => true
            ]
        );
		$fieldset->addField(
            'status',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'status',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );
		$fieldset->addField(
            'price',
            'select',
            [
                'label' => __('Price Config'),
                'title' => __('Price Config'),
                'name' => 'price',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );
		if ($model->getId()) {
            $fieldset->addField('feed_id', 'hidden', ['name' => 'feed_id']);
        }else{
			$model->setCreatedAt(date(DATE_ATOM));
			$fieldset->addField('created_at', 'hidden', ['name' => 'created_at']);
		}
		$form->setValues($model->getData());
		
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
