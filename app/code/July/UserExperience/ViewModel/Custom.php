<?php


namespace July\UserExperience\ViewModel;


class Custom implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    private $visitorLocation;

    public function __construct(
        \July\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation
    )
    {
        $this->visitorLocation = $visitorLocation;
    }

    public function getMessage()
    {
        $areas = $this->visitorLocation->getAreas();
        $message = "View Model : Welcome to" . $areas->getCountry() . '-' . $areas->getRegion();
        return $message;
    }
}