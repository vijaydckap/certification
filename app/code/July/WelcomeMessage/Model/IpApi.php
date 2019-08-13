<?php


namespace July\WelcomeMessage\Model;

use July\WelcomeMessage\Api\GeoInterface;

class IpApi implements GeoInterface
{
    const URL = "http://ip-api.com/json/";
    private $clientFactory;

    public function __construct(
        \Magento\Framework\HTTP\ClientFactory $clientFactory
    )
    {
        $this->clientFactory = $clientFactory;
    }

    public function lookup($ip)
    {
//        try {
            $httpClient = $this->clientFactory->create();
            $httpClient->get(self::URL . $ip);
            return $httpClient->getBody();
//        } catch (\Exception $e) {

//        }
    }
}