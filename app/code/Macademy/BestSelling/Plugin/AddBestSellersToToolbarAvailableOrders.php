<?php

namespace Macademy\BestSelling\Plugin;

class AddBestSellersToToolbarAvailableOrders
{
    public function afterGetAvailableOrders(\Magento\Catalog\Block\Product\ProductList\Toolbar $subject, $result)
    {
        $result["bestsellers"] = "Best Sellers";
        return $result;
    }
}
