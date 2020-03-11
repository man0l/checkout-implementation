<?php


namespace App\Service;

abstract class AbstractCalculate implements CalculateInterface
{
    protected $queue;
    protected $products;
    function __construct()
    {
        $this->queue = new \SplQueue();
    }

    function setProducts($products)
    {
        $this->products = $products;
    }

    abstract function getTotal();
    abstract function scanItem($item);

}
