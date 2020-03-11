<?php

namespace App;

use App\Service\CalculateInterface;

class ConsoleApp
{
    private $calculate;
    public function __construct(CalculateInterface $calculate)
    {
        $this->calculate = $calculate;
    }

    function run($argv = []) {

        if(!$argv) {
            return;
        }

        $result = $this->calculate->calc($argv);

        echo sprintf("The calculated result is: %s\r\n", $result);
    }

}
