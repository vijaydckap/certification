<?php


namespace July\ReturnTypes\Controller\Type;


class Forward extends \Magento\Framework\App\Action\Action
{
    private $forwardFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory
    )
    {
        $this->forwardFactory = $forwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $forward = $this->forwardFactory->create();
//        $forward->setModule("catelog")->setController('Product')->forward('view')->setParams(["id" => '1']);
        $forward->setModule("customer")->setController('account')->forward('login');
        return $forward;
    }
}