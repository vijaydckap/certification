<?php


namespace July\WelcomeMessage\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Zend\Log\Writer\Psr;

class Logger implements ObserverInterface
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
        $customer = $observer->getEvent()->getCustomer();
        $this->logger->info("Log From Observer");
        $this->logger->info($customer->getName());
        $this->logger->info($customer->getId());
    }
}