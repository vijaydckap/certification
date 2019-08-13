<?php


namespace July\WelcomeMessage\Api;


interface VisitorLocationInterface
{
    /**
     * @return \July\WelcomeMessage\Api\Data\LocationInterface
     */
    public function getAreas();
}