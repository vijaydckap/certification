<?php


namespace DCKAP\Retailers\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable("dckap_retailers");
        if ($setup->tableExists($tableName)) {
            $setup->getConnection()->insertArray(
                $tableName,
                ['name', 'country_id', 'region_id'],
                [
                    ['RET A', 'US', 3],
                    ['RET b', 'US', 5],
                    ['RET c', 'US', 3],
                    ['RET d', 'US', 5],
                    ['RET e', 'US', 12],
                ]
            );
        }
        $setup->endSetup();
    }
}