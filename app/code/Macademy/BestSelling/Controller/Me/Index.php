<?php

declare(strict_types=1);

namespace Macademy\BestSelling\Controller\Me;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var Session
     */
    protected $customerSession;

    public function __construct(Context $context, Session $customerSession)
    {
        parent::__construct($context);
        $this->customerSession = $customerSession;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Raw $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $customerId = $this->customerSession->getCustomerId();

        $this->_eventManager->dispatch("customer_views_bestselling_me_index", [
            "customer_id" => $customerId
        ]);

        $result->setContents("customer: $customerId");
        return $result;
    }
}
