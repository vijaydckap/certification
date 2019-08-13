<?php


namespace DCKAP\Retailers\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->createRetailerProduct($setup);
        }
        $setup->endSetup();
    }

    public function createRetailerProduct($setup)
    {
        $tableName = $setup->getTable('dckap_retailer_product');
        if (!$setup->tableExists($tableName)) {
            $table = $setup->getConnection()->newTable($tableName)
                ->addColumn(
                    'id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                        'identity' => true
                    ],
                    'Retailer product Map id'
                )
                ->addColumn(
                    'retailer_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true
                    ]
                )
                ->addColumn(
                    'product_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    10,
                    [
                        'nullable' => false,
                        'unsigned' => true
                    ]
                )
                ->addForeignKey(
                    $setup->getFkName($tableName, 'retailer_id', 'dckap_retailers', 'id'),
                    'retailer_id',
                    $setup->getTable('dckap_retailers'),
                    'id',
                    \Magento\Framework\Db\Ddl\Table::ACTION_CASCADE
                )
                ->addForeignKey(
                    $setup->getFkName($tableName, 'product_id', 'catalog_product_entity', 'entity_id'),
                    'product_id',
                    $setup->getTable('catalog_product_entity'),
                    'entity_id',
                    \Magento\Framework\Db\Ddl\Table::ACTION_CASCADE
                )
                ->addIndex(
                    $setup->getIdxName($tableName, ['retailer_id']),
                    ['retailer_id']

        )
                ->setComment('Retailer Product');
            $setup->getConnection()->createTable($table);
        }
    }

}