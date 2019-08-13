<?php


namespace July\Retailers\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable("july_retailers");
        if ($setup->tableExists($tableName)) {
            $setup->getConnection()->insertArray(
                $tableName,
                ["name", "country_id", "region_id"],
                [
                    ["Retailer A", "US", 3],
                    ["Retailer B", "US", 2],
                    ["Retailer C", "US", 15],
                    ["Retailer D", "US", 4],
                    ["Retailer E", "US", 4],
                    ["Retailer F", "US", 12],
                ]);
        }
        $setup->endSetup();
    }
}