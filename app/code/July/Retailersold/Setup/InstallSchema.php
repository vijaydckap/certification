<?php


namespace July\Retailers\Setup;


use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Psr\Log\NullLogger;
use Zend\Text\Table\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table_name = $setup->getTable('july_retailer');
        if (!$setup->tableExists($table_name)) {
            $table = $setup->getConnection()->newTable($table_name)->addColumn(
                'id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'primary' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'identity' => true,
                ], "Retailer ID"

            )->addColumn(
                'name', \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                "Retailer Name"
            )->addColumn(
                "country_id",
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                2,
                ['nullable' => false],
                "Country ID"

            )->addColumn(
                "region_id",
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'unsigned' => true
                ],
                "Region ID"

            )->addForeignKey(
                $setup->getFkName($table_name, "country_id", "directory_country", "country_id"),
                "country_id",
                $setup->getTable("directory_country"),
                "country_id",
                \Magento\Framework\Db\Ddl\Table::ACTION_CASCADE

            )->addForeignKey(
                $setup->getFkName($table_name, "region_id", "directory_country_region", "region_id"),
                "region_id",
                $setup->getTable("directory_country_region"),
                "region_id",
                \Magento\Framework\Db\Ddl\Table::ACTION_CASCADE

            )->addIndex(
                $setup->getIdxName($table_name, ['name']),
                ['name']
            )->setComment("Retailer Table for storing retailers information");

            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}