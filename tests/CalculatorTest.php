<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    function testCalculation($testProducts, $testTotal)
    {
        $fixtures = new \App\Service\ItemFixtures();
        $fixtures->init();

        $calculate = new \App\Service\Calculate();

        $calculate->setFixtureItems($fixtures->getData());
        $calculate->setProducts($testProducts);
        $calculate->process();


        $this->assertEquals($testTotal, $calculate->getTotal());
    }

    function provideData()
    {
        return [
           ["ZA,YB,FC,GD,ZA,YB,ZA,ZA", 32.40],
           ["FC,FC,FC,FC,FC,FC,FC", 7.25],
           ["ZA,YB,FC,GD", 15.40]
        ];
    }
}
