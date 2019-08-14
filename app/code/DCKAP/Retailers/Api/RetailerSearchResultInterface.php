<?php


namespace DCKAP\Retailers\Api;

use Magento\Framework\Api\SearchResultsInterface;

interface RetailerSearchResultInterface extends SearchResultsInterface
{

    /**
     * Get Items First
     *
     * @return \DCKAP\Retailers\Api\Data\RetailerDTOInterface
     */
    public function getItems();

    /**
     * set items list
     * @param \DCKAP\Retailers\Api\Data\RetailerDTOInterface array $items
     * @return $this
     */
    public function setItems(array $items);

}
