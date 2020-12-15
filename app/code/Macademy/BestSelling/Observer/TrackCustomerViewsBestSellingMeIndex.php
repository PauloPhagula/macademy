<?php

namespace Macademy\BestSelling\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class TrackCustomerViewsBestSellingMeIndex implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $customerId = $observer->getData("customer_id");
        if ($customerId) {
            echo '<pre>';
            var_dump($customerId);
            die();
        }
    }
}
