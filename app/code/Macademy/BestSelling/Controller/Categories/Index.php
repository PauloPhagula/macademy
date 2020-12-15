<?php

declare(strict_types=1);

namespace Macademy\BestSelling\Controller\Categories;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Sales\Model\ResourceModel\Report\BestSellers\CollectionFactory as BestsellersCollectionFactory;
use \Magento\Sales\Model\ResourceModel\Report\Bestsellers\Collection as BestsellersCollection;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var BestsellersCollectionFactory
     */
    private $bestsellerCollectionFactory;

    public function __construct(
        Context $context,
        BestsellersCollectionFactory $bestsellerCollectionFactory
    ) {
        parent::__construct($context);
        $this->bestsellerCollectionFactory = $bestsellerCollectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Raw $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        /** @var \Magento\Framework\HTTP\PhpEnvironment\Request $request */
        $request = $this->getRequest();
        $categoryId = $request->getParam("category_id");
        $limit = $request->getParam("limit");

        /** @var BestsellersCollection  $bestsellersCollection */
        $bestsellersCollection = $this->bestsellerCollectionFactory->create();

        $macademyBestSellersTable = \Macademy\BestSelling\Model\ResourceModel\Sales\BestSellers::MAIN_TABLE;
        $bestsellersCollection->getSelect()
            ->joinLeft(
            $macademyBestSellersTable,
            "sales_bestsellers_aggregated_yearly.id = $macademyBestSellersTable.id",
            ["is_featured" => "SUM($macademyBestSellersTable.is_featured)"]
            )->order("is_featured DESC");

        $allItems = $bestsellersCollection->getItems();
        echo '<pre>';
        foreach ($allItems as $item) {
            var_dump($item->getData());
        }
        die();

        $result->setContents("category: $categoryId, limit: $limit");
        return $result;
    }
}
