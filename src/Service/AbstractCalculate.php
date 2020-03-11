<?php


namespace App\Service;

use App\Data\ItemDTO;

abstract class AbstractCalculate implements CalculateInterface
{
    protected $productNames = [];

    /**
     * @var ItemDTO[] $fixtureItems
     */
    protected $fixtureItems = [];
    /**
     * @var string $products
     * @desc this is the incoming string ZA,YB,FC,GD,ZA,YB,ZA,ZA divided by commas
     */
    protected string $products;

    /**
     * @var array $scannedItems
     * @desc items after they were scanned on the terminal line
     */
    protected $scannedItems = [];

    protected $totalPrice;

    function __construct()
    {
    }

    function setProducts($products)
    {
        $this->products = $products;
        if(strpos($this->products, ',') !== false) {
            $this->productNames = explode(",",$this->products);
        } else {
            $this->productNames[] = $products;
        }
    }

    protected function isValidProduct($scannedItem)
    {
        /** @var ItemDTO $item */
        foreach($this->fixtureItems as $item) {
            if($item->getName() == $scannedItem && isset($this->fixtureItems[$scannedItem])) {
                return true;
            }
        }

        return false;
    }

    public function setFixtureItems(array $fixtureItems)
    {
        $this->fixtureItems = $fixtureItems;
    }

    function process()
    {
        foreach($this->productNames as $productName) {
            $this->scanItem($productName);
        }

        if(count($this->scannedItems) == 0) {
            return;
        }

        $occurence = $this->findOccurrence($this->products);
        $totalPrice = 0;

        foreach($this->scannedItems as $scannedItem) {
            /** @var ItemDTO $item */
            $item = $this->fixtureItems[$scannedItem];
            if(!$item->getPromotionPrice() && !$item->getPromotionQty()) {
                // the item does not have a promotion
                $price = $occurence[$scannedItem] * $item->getPrice();
                $totalPrice += $price;
                continue;
            }

            $price = 0;
            // calc the number of the promotions
            $promotionsNum = floor($occurence[$scannedItem]/$item->getPromotionQty());
            if($promotionsNum > 0) {
                for($i = 0; $i < $promotionsNum; $i++) {
                    $price += $item->getPromotionPrice();
                    $occurence[$scannedItem] -= $item->getPromotionQty();
                }
            }

            if($occurence[$scannedItem] > 0) {
                $price += $occurence[$scannedItem] * $item->getPrice();
            }

            $totalPrice += $price;
        }

        $this->totalPrice = $totalPrice;
    }

    public function findOccurrence() {
        $occurence = [];

        foreach($this->productNames as $productName) {

            if(isset($occurence[$productName])) {
                $occurence[$productName] = 0;
            } else {
                $occurence[$productName] += 1;
            }
        }

        return $occurence;
    }


    abstract function getTotal();
    abstract function scanItem($item);

}
