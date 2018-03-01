<?php
 
namespace Webmobi\Import\Setup;
 
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
 
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();  
        // Get tutorial_simplenews table
        $tableName = $installer->getTable('import_feed');
        $tableName2 = $installer->getTable('import_field');
        $tableName3 = $installer->getTable('import_price');
        // Istall table list XML
        if ($installer->getConnection()->isTableExists($tableName) != true) {
      
            $xml = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'feed_id',
                    Table::TYPE_INTEGER,
                    11,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Feed ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Name'
                )
				->addColumn(
                    'url',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Url'
                )
				->addColumn(
                    'parenttag',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Url'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_DATETIME,
                    255,
                    ['nullable' => false],
                    'Created At'
                )
                ->addColumn(
                    'status',
                    Table::TYPE_SMALLINT,
                    null,
                    ['nullable' => false, 'default' => '0'],
                    'Status'
                )
				->addColumn(
                    'price',
                    Table::TYPE_SMALLINT,
                    '10,2',
                    ['nullable' => false, 'default' => '0'],
                    'Price condition'
                )
                ->setComment('News Table list xml')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($xml);
        }
		
		
		// Install tableName2 fields tags
		if ($installer->getConnection()->isTableExists($tableName2) != true) {
      
            $fields = $installer->getConnection()
                ->newTable($tableName2)
                ->addColumn(
                    'field_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Field ID'
                )
                ->addColumn(
                    'field',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Field'
                )
				->addColumn(
                    'tag',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Tag'
                )
				->addColumn(
                    'type',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Type'
                )
				->addColumn(
                    'default',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Default'
                )
                 ->addColumn(
                    'idxml',
                    Table::TYPE_INTEGER,
                    11,
                    ['nullable' => false, 'default' => '0'],
                    'IDXml'
                )
                ->setComment('News Table Field Text')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($fields);
        }
		
		
		if ($installer->getConnection()->isTableExists($tableName3) != true) {
      
            $price = $installer->getConnection()
                ->newTable($tableName3)
                ->addColumn(
                    'price_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Price ID'
                )
               
				->addColumn(
                    'pricemin',
                    Table::TYPE_DECIMAL,
                    '10,2',
                    ['nullable' => false, 'default' => '0'],
                    'Price min'
                )
				->addColumn(
                    'pricemax',
                    Table::TYPE_DECIMAL,
                    '10,2',
                    ['nullable' => false, 'default' => '0'],
                    'Price max'
                )
				->addColumn(
                    'added',
                    Table::TYPE_INTEGER,
                    11,
                    ['nullable' => false, 'default' => '0'],
                    'Added'
                )
				->addColumn(
                    'idxml',
                    Table::TYPE_INTEGER,
                    11,
                    ['nullable' => false, 'default' => '0'],
                    'Id XML'
                )
                ->setComment('News Table Price calcul')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($price);
        }
        $installer->endSetup();
    }
}