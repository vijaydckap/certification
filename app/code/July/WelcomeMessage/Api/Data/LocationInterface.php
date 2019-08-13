<?php


namespace July\WelcomeMessage\Api\Data;


interface LocationInterface
{
    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return string
     */
    public function getRegion();
}