<?php


namespace DCKAP\Retailers\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = "DCKAP_Retailers::retailers";

    private $pageFactory;

    public function __construct(Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('Magento_Customer::customer');
        $page->getConfig()->getTitle()->prepend(__('Manage Retailers'));
        return $page;
    }
}