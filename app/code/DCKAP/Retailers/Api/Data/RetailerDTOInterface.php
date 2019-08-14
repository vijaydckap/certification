<?php


namespace DCKAP\Retailers\Api\Data;


interface RetailerDTOInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getCountryId();

    /**
     * @return int
     */
    public function getRegionId();

    /**
     * @param int $id
     * @return \DCKAP\Retailers\Api\Data\RetailerDTOInterface
     */
    public function setId($id);

    /**
     * @param string $name
     * @return \DCKAP\Retailers\Api\Data\RetailerDTOInterface
     */
    public function setName($name);

    /**
     * @param string $countryID
     * @return \DCKAP\Retailers\Api\Data\RetailerDTOInterface
     */
    public function setCountryId($countryID);

    /**
     * @param int $regionID
     * @return \DCKAP\Retailers\Api\Data\RetailerDTOInterface
     */
    public function setRegionId($regionID);

}