<?php

namespace Macademy\BestSelling\Setup\Patch\Data;

use Macademy\BestSelling\Model\Sales\BestSellers as BestSellersModel;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Macademy\BestSelling\Model\ResourceModel\Sales\BestSellers as BestSellersResourceModel;
use Macademy\BestSelling\Model\Sales\BestSellersFactory;

class PopulateBestSellersRecords1 implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $dataSetup;

    /**
     * @var BestSellersResourceModel
     */
    private $bestSellersResourceModel;

    /**
     * @var BestSellersFactory
     */
    private $bestSellersFactory;

    public function __construct(
        ModuleDataSetupInterface $dataSetup,
        BestSellersResourceModel $bestSellersResourceModel,
        BestSellersFactory $bestSellersFactory
    ) {
        $this->dataSetup = $dataSetup;
        $this->bestSellersResourceModel = $bestSellersResourceModel;
        $this->bestSellersFactory = $bestSellersFactory;
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

        /** @var BestSellersModel $bestSeller */
        $bestSeller = $this->bestSellersFactory->create();
        $data = [
          "id" => 5,
          "is_featured" => false
        ];
        $bestSeller->setData($data);
        $this->bestSellersResourceModel->save($bestSeller) ;

        $setup->endSetup();
    }
}
