<?php


namespace July\WelcomeMessage\Block;


use Magento\Framework\View\Element\Template;

class Header extends \Magento\Theme\Block\Html\Header
{
    private $visitorLocation;

    public function __construct(
        Template\Context $context,
        \July\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation,
        array $data = []
    )
    {
        $this->visitorLocation = $visitorLocation;
        parent::__construct($context, $data);
    }

    public function getWelcome()
    {
        $message = parent::getWelcome();
        $location = $this->visitorLocation->getAreas();
        if ($location->getCountry()) {
            $message = "Welcome To " . $location->getCountry() . '-' . $location->getRegion();
        }
        return $message;
    }
}