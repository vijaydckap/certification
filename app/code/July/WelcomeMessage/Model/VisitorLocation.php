<?php


namespace July\WelcomeMessage\Model;


use July\WelcomeMessage\Api\VisitorLocationInterface;

class VisitorLocation implements VisitorLocationInterface
{
    private $geoIP;
    private $remoteAddress;
    private $locationFactory;

    public function __construct(
        \July\WelcomeMessage\Api\GeoInterface $geoIp,
        \July\WelcomeMessage\Api\Data\LocationInterfaceFactory $locationFactory,
        \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress
    )
    {
        $this->geoIP = $geoIp;
        $this->remoteAddress = $remoteAddress;
        $this->locationFactory = $locationFactory;
    }

    public function getAreas()
    {
        $jsonData = json_decode($this->geoIP->lookup($this->getAddress()), true);
        $location = $this->locationFactory->create([
            "country" => $jsonData['countryCode'],
            "region" => $jsonData['region']
        ]);
        return $location;
    }

    private function getAddress()
    {
        $address = $this->remoteAddress->getRemoteAddress();
        return $address == "127.0.0.1" ? "8.8.8.8" : $address;
    }
}