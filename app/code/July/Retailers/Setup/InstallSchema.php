<?php

namespace DCKAP\Retailers\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable("dckap_retailers");

        if (!$setup->tableExists($tableName)) {


            $table = $setup->getConnection()->newTable($tableName)
                ->addColumn(
                    'id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'primary' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'identity' => true
                    ],
                    'retailer_id'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                    ],
                    'retailer_name'
                )
                ->addColumn(
                    'country_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    2,
                    [
                        'nullable' => false,
                    ],
                    'retailer_country_id'
                )
                ->addColumn(
                    'region_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    10,
                    [
                        'nullable' => false,
                        'unsigned' => true
                    ],
                    'retailer_Region_id'
                )
                ->addForeignKey(
                    $setup->getFkName($tableName, 'country_id', 'directory_country', 'country_id'),
                    "country_id",
                    $setup->getTable("directory_country"),
                    "country_id",
                    \Magento\Framework\Db\Ddl\Table::ACTION_CASCADE
                )
                ->addForeignKey(
                    $setup->getFkName($tableName, 'region_id', 'directory_country_region', 'region_id'),
                    "region_id",
                    $setup->getTable("directory_country_region"),
                    "region_id",
                    \Magento\Framework\Db\Ddl\Table::ACTION_CASCADE
                )
                ->addIndex(
                    $setup->getIdxName($tableName, ['name']),
                    ['name']
                )
                ->setComment('Retailer information');
            $setup->getConnection()->createTable($table);

        }
        $setup->endSetup();
    }
}