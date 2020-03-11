<?php

namespace App;

use App\Service\CalculateInterface;
use App\Service\ItemFixtures;

class App
{
    private $calculate;

    public function __construct(CalculateInterface $calculate, ItemFixtures $fixtures)
    {
        $fixtures->init();
        $this->calculate = $calculate;
        $this->calculate->setFixtureItems($fixtures->getData());
    }

    function run(string $params) {

        if(!$params) {
            return;
        }
        $this->calculate->setProducts($params);
        $this->calculate->process();
        $result = $this->calculate->getTotal();

        //sprintf("The calculated result is: %s\r\n", $result);
        echo json_encode(['total' => $result]);
    }

}
