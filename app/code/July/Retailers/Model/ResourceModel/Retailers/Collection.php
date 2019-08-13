<?php


namespace DCKAP\Retailers\Model\ResourceModel\Retailers;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init("DCKAP\Retailers\Model\Retailers","DCKAP\Retailers\Model\ResourceModel\Retailers");
    }

}