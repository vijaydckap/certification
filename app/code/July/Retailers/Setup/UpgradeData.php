<?php


namespace DCKAP\Retailers\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if(version_compare($context->getVersion(),'1.0.2','<'))
        {
            $tableName = $setup->getTable("dckap_retailer_product");
            $setup->getConnection()->insertArray(
                $tableName,
                ['retailer_id','product_id'],
                [
                    [1,1],
                    [2,1],
                    [3,1],
                    [4,1],
                    [5,1]
                ]
            );
        }

        $setup->endSetup();
    }

}