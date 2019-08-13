<?php


namespace July\WelcomeMessage\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $visitorLocation;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \July\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation)
    {
        $this->_pageFactory = $pageFactory;
        $this->visitorLocation = $visitorLocation;
        return parent::__construct($context);
    }

    public function execute()
    {
        var_dump($this->visitorLocation->getAreas());
        exit;
    }
}