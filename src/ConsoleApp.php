<?php

namespace App;

use App\Service\CalculateInterface;
use App\Service\ItemFixtures;

class ConsoleApp
{
    private $calculate;

    public function __construct(CalculateInterface $calculate, ItemFixtures $fixtures)
    {
        $fixtures->init();
        $this->calculate = $calculate;
        $this->calculate->setFixtureItems($fixtures->getData());
    }

    function run($argv = []) {

        if(!$argv) {
            return;
        }
        $this->calculate->setProducts($argv[1]);
        $this->calculate->process();
        $result = $this->calculate->getTotal();

        echo sprintf("The calculated result is: %s\r\n", $result);
    }

}
