<?php


namespace DCKAP\Retailers\Api;


interface RetailerRepositoryInterface
{
    /**
     * @param int $id
     * @return \DCKAP\Retailers\Api\Data\RetailerDTOInterface
     */
    public function getById($id);

    /**
     * @param Data\RetailerDTOInterface $retailer
     * @return \DCKAP\Retailers\Api\Data\RetailerDTOInterface
     */
    public function save(\DCKAP\Retailers\Api\Data\RetailerDTOInterface $retailer);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList($searchCriteria);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id);
}