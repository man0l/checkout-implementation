<?php

namespace App\Service;

interface CalculateInterface
{
    function setPricing($pricing);
    function scanItem($item);
    function getTotal();
}
