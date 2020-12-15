<?php

namespace Macademy\BestSelling\Model\ResourceModel\Sales;

class BestSellers extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    const MAIN_TABLE = "macademy_bestselling_sales_bestsellers";
    const ID_FIELD_NAME = "id";

    /**
     * IMPORTANT: It informs Magento out table does not have an auto-incrementing PK field
     * @var bool
     */
    protected $_isPkAutoIncrement = false;

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
