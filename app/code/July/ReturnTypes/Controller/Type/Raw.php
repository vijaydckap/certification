<?php


namespace July\ReturnTypes\Controller\Type;


class Raw extends \Magento\Framework\App\Action\Action
{
    private $rawFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\RawFactory $rawFactory
    )
    {
        $this->rawFactory = $rawFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $rawData = $this->rawFactory->create();
        $rawData->setContents('Hi hello am vijaykumar shanmugam');
        return $rawData;
    }
}