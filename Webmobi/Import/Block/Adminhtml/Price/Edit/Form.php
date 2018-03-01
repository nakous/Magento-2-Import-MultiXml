<?php
namespace Webmobi\Import\Block\Adminhtml\Price\Edit;

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
		
		$models = $this->_coreRegistry->registry('current_model');
		$feed_id = $this->_coreRegistry->registry('feed_id');
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

		$i=0;
 
		foreach($models as $model){
			$i++;
				$fieldset = $form->addFieldset(
						"base_fieldset_$i",
						['legend' => __("Price condition $i"), 'class' => 'fieldset-wide']
					);
				$fieldset->addField(
					"price[$i][pricemin]",
					'text',
					['value'=>$model->getPricemin(),'name' => "price[$i][pricemin]",'label' => __('Price min'),'title' => __('Price min')]
				);
				$fieldset->addField(
					"price[$i][pricemax]",
					'text',
					['value'=>$model->getPricemax(),'name' => "price[$i][pricemax]",'label' => __('Price max'),'title' => __('Price max')]
				);
				$fieldset->addField(
					"price[$i][percentage]",
					'text',
					['value'=>$model->getAdded(),'name' => "price[$i][percentage]",'label' => __('Percentage'),'title' => __('Percentage')]
				);
				$fieldset->addField("price[$i][price_id]", 'hidden', ['value'=>$model->getId(),'name' => "price[$i][price_id]"]);
			
			}
		$k=$i;
		for($i=$k+1; $i<=10;$i++){
			 
				$fieldset = $form->addFieldset(
						"base_fieldset_$i",
						['legend' => __("Price condition $i"), 'class' => 'fieldset-wide']
					);
				$fieldset->addField(
					"price[$i][pricemin]",
					'text',
					['name' => "price[$i][pricemin]",'label' => __('Price min'),'title' => __('Price min')]
				);
				$fieldset->addField(
					"price[$i][pricemax]",
					'text',
					['name' => "price[$i][pricemax]",'label' => __('Price max'),'title' => __('Price max')]
				);
				$fieldset->addField(
					"price[$i][percentage]",
					'text',
					['name' => "price[$i][percentage]",'label' => __('Percentage'),'title' => __('Percentage')]
				);
				
			
			}
		
		

            $fieldset->addField('feed_id', 'hidden', ['name' => 'feed_id','value' =>$feed_id]);
        
		
		// $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
