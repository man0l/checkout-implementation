<?php

namespace App\Service;

interface CalculateInterface
{
    function setProducts($products);
    function scanItem($item);
    function getTotal();
    function setFixtureItems(array $items);
    function process();
}
