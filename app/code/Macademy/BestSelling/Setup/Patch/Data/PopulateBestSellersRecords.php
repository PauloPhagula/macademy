<?php

namespace Macademy\BestSelling\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Macademy\BestSelling\Model\ResourceModel\Sales\BestSellers as BestSellersResourceModel;

class PopulateBestSellersRecords implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $dataSetup;

    public function __construct(ModuleDataSetupInterface $dataSetup)
    {
        $this->dataSetup = $dataSetup;
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
       return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        $setup = $this->dataSetup;
        $setup->startSetup();
        $table = $setup->getTable(BestSellersResourceModel::MAIN_TABLE);
        $setup->getConnection()->insert($table, [
            "id" => 1,
            "is_featured" => true,
        ]);
        $setup->getConnection()->insert($table, [
            "id" => 3,
            "is_featured" => true,
        ]);
        $setup->endSetup();
    }
}
