<?php


namespace July\UserExperience\Block;


use Magento\Framework\View\Element\Template;

class Custom extends Template
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

    public function getMessage()
    {
        $areas = $this->visitorLocation->getAreas();
        $message = "Welcome to" . $areas->getRegion() . '===' . $areas->getCountry();
        return $message;
    }

    public function getHeaderContent()
    {
        return __('vijay');
    }
}