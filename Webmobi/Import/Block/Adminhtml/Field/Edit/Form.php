<?php
namespace Webmobi\Import\Block\Adminhtml\Field\Edit;

use Webmobi\Import\Helper\Data;
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
		$arr_field=array("0"=>'Field path');
		$model = $this->_coreRegistry->registry('current_model');
		// load module Feed
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();

		$model_feed =$objectManager->create("Webmobi\Import\Model\Feed");
		$feed=$model_feed->load($model->getFeed());
		// echo $feed->getUrl();
		if($feed){
				$helper=new Data($feed->getUrl(),$feed->getParent());
				$arr_field=$helper->array_node();
			}

		$field_name=array(
		 'prod_item'=>'Product Item',
		 'prod_id'=>'Product Id',
		 'titre'=>'Title',
		 'description'=>'Description',
		 'second_description'=>'Second description',
		 'attributes'=>'Attributes',
		 'images'=>'Images',
		 'additional_images'=>'Additional images',
		 'stock'=>'Stock',
		 'price'=>'Price',
		 'special_price'=>'Special price',
		 'meta_t'=>'Meta title',
		 'meta_k'=>'Meta keywords',
		 'meta_d'=>'Meta description'
		 
		);
		// 'attribute'=>'Attribute',
	// 'option'=>'Option'
        /** @var \Magento\Framework\Data\Form $form */
		
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );
		$fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Mappiing XML'), 'class' => 'fieldset-wide']
        );
		foreach($field_name as $key=>$el){
			$fieldset->addField(
				$key,
				'select',
				[ 'label' => __($el),'title' => __($el),'name' => $key,'options' => $arr_field
				]
			);
		}
		// if ($model->getId()) {
            $fieldset->addField('feed_id', 'hidden', ['name' => 'feed_id']);
        // }
		if ($model->getId()) {
            $fieldset->addField('field_id', 'hidden', ['name' => 'field_id']);
        }
		$form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
