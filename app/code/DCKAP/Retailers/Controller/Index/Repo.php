<?php


namespace DCKAP\Retailers\Controller\Index;


use DCKAP\Retailers\Api\Data\RetailerDTOInterface;
use DCKAP\Retailers\Api\Data\RetailerDTOInterfaceFactory;
use Magento\Framework\App\Action\Context;

class Repo extends \Magento\Framework\App\Action\Action
{
    Private $retailerRepository;
    private $retailerDTOFactory;
    private $searchCriteriaFactory;
    private $searchCriteriaBuilder;
    private $scopeConfig;

    public function __construct(
        Context $context,
        \DCKAP\Retailers\Api\Data\RetailerDTOInterfaceFactory $retailerDTOFactory,
        \DCKAP\Retailers\Api\RetailerRepositoryInterface $retailerRepository,
        \Magento\Framework\Api\SearchCriteriaInterfaceFactory $searchCriteriaFactory,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->retailerRepository = $retailerRepository;
        $this->retailerDTOFactory = $retailerDTOFactory;
        $this->searchCriteriaFactory = $searchCriteriaFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->scopeConfig=$scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {

        $address=$this->scopeConfig->getValue('retailers/general/address');
        var_dump($address);

        // var_dump($this->retailerRepository->getById('1')->getName());

        //Save
//        $retailerDTO=$this->retailerDTOFactory->create();
//        $retailerDTO->setName("Retailer X")->setCountryId("US")->setRegionId(7);
//        $retailerDTO=$this->retailerRepository->save($retailerDTO);
//        var_dump($retailerDTO->getId());
//        var_dump($retailerDTO->getName());

        //Delete
//        var_dump($this->retailerRepository->deleteById(5));

        //List Collection
        $searchCriteria = $this->searchCriteriaBuilder->addFilter('region_id', 3)->create();
        $searchresult = $this->retailerRepository->getList($searchCriteria);

        var_dump($searchresult->getTotalCount());
        var_dump($searchresult->getItems());

    }

}