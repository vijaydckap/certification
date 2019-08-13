<?php


namespace July\WelcomeMessage\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Zend\Log\Writer\Psr;

class CustomObserver implements ObserverInterface
{
    private $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $custom = $observer->getEvent();
//        print_r($custom->getResponse());die;
        $this->logger->info("Log From Custom Observer");
        $this->logger->info($custom->getResponse());
        $this->logger->info($custom->getKey());
    }
}