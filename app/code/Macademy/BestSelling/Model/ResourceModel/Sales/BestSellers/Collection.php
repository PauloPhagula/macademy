<?php

namespace Macademy\BestSelling\Model\ResourceModel\Sales\BestSellers;

use Macademy\BestSelling\Model\Sales\BestSellers as BestSellersModel;
use \Macademy\BestSelling\Model\ResourceModel\Sales\BestSellers as BestSellersResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(BestSellersModel::class,BestSellersResourceModel::class);
    }
}
