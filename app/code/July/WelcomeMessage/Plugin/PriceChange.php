<?php


namespace July\WelcomeMessage\Plugin;


class PriceChange
{
    private $visitorLocation;

    public function __construct(
        \July\WelcomeMessage\Api\VisitorLocationInterface $visitorLocation
    )
    {
        $this->visitorLocation = $visitorLocation;
    }

    public function afterGetPrice(\Magento\Catalog\Model\Product $product, $result)
    {
        if ($result) {
            $result = $result / 2;
        }
        return $result;
    }
}