<?php


namespace July\ReturnTypes\Controller\Type;


class Redirect extends \Magento\Framework\App\Action\Action
{
    private $redirectFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory
    )
    {
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $redirect = $this->redirectFactory->create();
        $redirect->setPath("customer/account/login");
        return $redirect;
    }
}