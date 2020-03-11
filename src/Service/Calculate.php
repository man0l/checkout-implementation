<?php

namespace App\Service;

class Calculate extends AbstractCalculate
{

    function scanItem($item)
    {
        $this->queue->enqueue($item);
    }

    function getTotal()
    {
        while ($item = $this->queue->dequeue()) {

        }
    }

    function setPricing($pricing)
    {

    }

}
