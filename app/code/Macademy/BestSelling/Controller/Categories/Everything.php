<?php


namespace Macademy\BestSelling\Controller\Categories;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;

class Everything extends Action
{

    public function execute()
    {
        return $this->_redirect("*/*", ["limit" => 1000]);
        // return $this->_redirect("best-selling/categories", ["limit" => 1000]);
    }
}
