<?php


namespace DCKAP\Retailers\Model;

use Magento\Framework\Model\AbstractModel;

class Retailers extends AbstractModel
{
    private $retailersResource;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ResourceModel\Retailers $retailersResource,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        $this->retailersResource = $retailersResource;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init("DCKAP\Retailers\Model\ResourceModel\Retailers");
    }

    public function getRegion()
    {
        return $this->retailersResource->getRegion($this->getRegionId());
    }

    public function getAssociateProduct()
    {
        return $this->retailersResource->getAssociateProduct($this->getId());
    }

}