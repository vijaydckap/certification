<?php


namespace July\WelcomeMessage\Api;


interface GeoInterface
{
    /**
     * @param string
     * @return mixed
     */
    public function lookup($ip);
}