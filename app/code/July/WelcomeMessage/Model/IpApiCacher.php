<?php


namespace July\WelcomeMessage\Model;

use July\WelcomeMessage\Api\GeoInterface;
use Magento\TestFramework\Event\Magento;

class IpApiCacher implements GeoInterface
{
    private $cache;
    private $geoIp;
    private $eventManager;

    public function __construct(
        \Magento\Framework\Config\CacheInterface $cache,
        GeoInterface $geoIp,
        \Magento\Framework\Event\ManagerInterface $eventManager
    )
    {
        $this->cache = $cache;
        $this->geoIp = $geoIp;
        $this->eventManager = $eventManager;
    }

    public function lookup($ip)
    {
        $key = "july_ip" . $ip;
        $cachedData = $this->cache->load($key);
        if ($cachedData != NULL) {
            $response = $cachedData;
        } else {
            $response = $this->geoIp->lookup($ip);
            $this->cache->save($response, $key, ['july_geoip']);
        }

        $this->eventManager->dispatch('ip_response_load_after', ['response' => $response, 'key' => $key]);
        return $response;
    }
}