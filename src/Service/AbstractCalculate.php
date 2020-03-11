<?php


namespace App\Service;


class AbstractCalculate implements CalculateInterface
{
    protected $queue;
    function __construct()
    {
        $this->queue = new \SplQueue();
    }

    abstract function scanItem($item);
    abstract function getTotal();
    abstract function setPricing($pricing);


}
