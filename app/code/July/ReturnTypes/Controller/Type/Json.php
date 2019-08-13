<?php


namespace July\ReturnTypes\Controller\Type;


class Json extends \Magento\Framework\App\Action\Action
{
    private $jsonFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    )
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        $json = $this->jsonFactory->create();
        $jsonData = $json->setJsonData('{"name": "vijay", "age":"40"}');
        return $jsonData;
    }
}