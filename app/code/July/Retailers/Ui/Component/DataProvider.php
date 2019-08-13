<?php


namespace DCKAP\Retailers\Ui\Component;


class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    public function getData()
{
    return $this->collectionToOutput($this->getSearchResult());

}
    public function collectionToOutput($collection)
{
    $arrItems=[];
    $arrItems['items']=[];
    foreach ($collection->getItems() as $item)
    {
        $arrItems['items'][]=$item->getData();
    }
    $arrItems['totalRecord']=$collection->getSize();
    return $arrItems;
}

}