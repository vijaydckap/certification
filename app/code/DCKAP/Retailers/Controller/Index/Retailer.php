<?php


namespace DCKAP\Retailers\Controller\Index;


use Magento\Framework\App\Action\Context;

class Retailer extends \Magento\Framework\App\Action\Action
{
    Private $retailersFactory;
    Private $retailersResource;
    Private $collectionFactory;

    public function __construct(
        Context $context,
        \DCKAP\Retailers\Model\RetailersFactory $retailersFactory,
        \DCKAP\Retailers\Model\ResourceModel\Retailers $retailersResource,
        \DCKAP\Retailers\Model\ResourceModel\Retailers\CollectionFactory $collectionFactory)
    {
        $this->retailersFactory = $retailersFactory;
        $this->retailersResource = $retailersResource;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
//        $id = $this->getRequest()->getParam('id', 1);
//        $collection = $this->retailersFactory->create();
//    $data = $collection->load(1);
//    print_r($data->getData());
//    die;
//        $data = $this->retailersResource->load($collection, $id);
//        print_r($collection->getData());
//        die;

//        $collection->setName("Retailer G")->setCountryId("US")->setRegionId(13);
//        $data = $this->retailersResource->save($collection);
//        print_r($collection->getData());
//        die;
        $collection = $this->collectionFactory->create();
        foreach ($collection->getItems() as $retailerModel) {
            var_dump($retailerModel->getAssociateProduct());
        }

    }

}