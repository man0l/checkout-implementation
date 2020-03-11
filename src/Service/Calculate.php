<?php

namespace App\Service;

class Calculate extends AbstractCalculate
{

    function scanItem($item)
    {
        if(!$this->isValidProduct($item))
        {
            return;
        }

        $this->scannedItems[$item] = $item;
    }

    function getTotal()
    {
        return $this->totalPrice;
    }
}
