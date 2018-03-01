<?php 
namespace Webmobi\MultiImport\Controller\Adminhtml\ListXml;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
     protected $resultPageFactory;
     public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
         $resultPage = $this->resultPageFactory->create();
         $resultPage->getConfig()->getTitle()->set(__('Multi Import List XML'));
         return $resultPage;
    }
}