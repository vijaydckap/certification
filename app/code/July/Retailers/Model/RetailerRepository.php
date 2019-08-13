<?php


namespace DCKAP\Retailers\Model;

use DCKAP\Retailers\Api\Data;
use DCKAP\Retailers\Api\RetailerRepositoryInterface;
use Magento\CatalogImportExport\Model\Import\Proxy\Product\ResourceModel;
use Magento\Framework\Api\DataObjectHelper;

class RetailerRepository implements RetailerRepositoryInterface
{
    private $retailersFactory;
    private $retailersResource;
    private $retailerDTOFactory;
    private $dataObjectHelper;
    private $collectionFactory;
    private $searchResultFactory;
    private $collectionProcessor;

    public function __construct(RetailersFactory $retailersFactory,
                                \DCKAP\Retailers\Model\ResourceModel\Retailers $retailersResource,
                                DataObjectHelper $dataObjectHelper,
                                \DCKAP\Retailers\Model\ResourceModel\Retailers\CollectionFactory $collectionFactory,
                                \DCKAP\Retailers\Api\RetailerSearchResultInterfaceFactory $searchResultFactory,
                                \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
                                \DCKAP\Retailers\Api\Data\RetailerDTOInterfaceFactory $retailerDTOFactory)
    {
        $this->retailersFactory = $retailersFactory;
        $this->retailersResource = $retailersResource;
        $this->retailerDTOFactory = $retailerDTOFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function getById($id)
    {
        $retailerDTO = $this->retailerDTOFactory->create();

        $retailerModel = $this->retailersFactory->create();
        $this->retailersResource->load($retailerModel, $id);

        $this->dataObjectHelper->populateWithArray(
            $retailerDTO,
            $retailerModel->getData(),
            "\DCKAP\Retailers\Api\Data\RetailerDTOInterface"
        );
        return $retailerDTO;
    }

    public function save(Data\RetailerDTOInterface $retailer)
    {
        $retailerModel = $this->retailersFactory->create();
        if ($retailer->getId()) {
            $this->retailersResource->load($retailerModel, $retailer->getId());
        }
        $retailerModel->setName($retailer->getName());
        $retailerModel->setCountryId($retailer->getCountryId());
        $retailerModel->setRegionId($retailer->getRegionId());

        //print_r($retailerModel->getData());


        $this->retailersResource->save($retailerModel);
        $retailer->setId($retailerModel->getId());
        return $retailer;
    }

    public function getList($searchCriteria)
    {
        /**
         * @var \DCKAP\Retailers\Api\RetailerSearchResultInterface $searchResult *
         */
        $searchResult = $this->searchResultFactory->create();

        /**
         * @var \DCKAP\Retailers\Model\ResourceModel\Retailers\Collection $collection
         */
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $items = [];
        foreach ($collection->getItems() as $retailerModel) {
            $retailerDTO = $this->retailerDTOFactory->create();
            $this->dataObjectHelper->populateWithArray($retailerDTO, $retailerModel->getData(), "\DCKAP\Retailers\Api\Data\RetailerDTOInterface");
            $items[] = $retailerDTO;
        }
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($items);
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

    public function deleteById($id)
    {
        $return = true;
        try {
            $retailerModel = $this->retailersFactory->create();
            $this->retailersResource->load($retailerModel, $id);
            if ($retailerModel->getId()) {
                $this->retailersResource->delete($retailerModel);
            } else {
                $return = false;
            }

        } catch (\Exception $e) {
            $return = false;
        }
        return $return;

    }

}