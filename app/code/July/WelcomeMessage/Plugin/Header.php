<?php


namespace July\WelcomeMessage\Plugin;


class Header
{
    private $visitorLocation;

    public function __construct(
        \July\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation
    )
    {
        $this->visitorLocation = $visitorLocation;
    }

    public function afterGetWelcome(\Magento\Theme\Block\Html\Header $header, $message)
    {
        $location = $this->visitorLocation->getAreas();
        if ($location->getCountry()) {
            $message = "From Plugin - Welcome To " . $location->getCountry() . '-' . $location->getRegion();
        }
        return $message;
    }
}