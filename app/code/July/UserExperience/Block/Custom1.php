<?php


namespace July\UserExperience\Block;


class Custom1 extends \Magento\Framework\View\Element\Template
{
//    protected $_template = "July_UserExperience::hello.phtml";

    public function getMessage()
    {
        return __("Hi Am from block custom - 1 class");
    }
}