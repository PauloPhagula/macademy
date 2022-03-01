<?php

namespace Macademy\JsFun\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Message implements ArgumentInterface
{
    public function getMessage()
    {
        // Any complex logic can come here
        return "Message from ViewModel";
    }
}
