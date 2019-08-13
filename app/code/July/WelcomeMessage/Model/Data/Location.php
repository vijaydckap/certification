<?php


namespace July\WelcomeMessage\Model\Data;


use July\WelcomeMessage\Api\Data\LocationInterface;

class Location implements LocationInterface
{
    private $country;

    private $region;

    public function __construct($country, $region)
    {
        $this->country = $country;
        $this->region = $region;

    }

    public function getRegion()
    {
        return $this->country;
    }

    public function getCountry()
    {
        return $this->region;
    }
}