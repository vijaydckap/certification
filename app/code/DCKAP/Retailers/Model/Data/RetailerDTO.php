<?php


namespace DCKAP\Retailers\Model\Data;


use DCKAP\Retailers\Api\Data\RetailerDTOInterface;
use Magento\Framework\Api\AbstractExtensibleObject;

class RetailerDTO extends AbstractExtensibleObject implements RetailerDTOInterface
{
    public function getId()
    {
     return $this->_get('id');
    }

    public function getName()
    {
        return $this->_get('name');
    }

    public function getCountryId()
    {
        return $this->_get('country_id');
    }

    public function getRegionId()
    {
        return $this->_get('region_id');
    }

    public function setId($id)
    {
        return $this->setData('id',$id);
    }

    public function setName($name)
    {
        return $this->setData('name',$name);
    }

    public function setCountryId($countryID)
    {
        return $this->setData('country_id',$countryID);
    }

    public function setRegionId($regionID)
    {
        return $this->setData('region_id',$regionID);
    }

}