<?php


namespace App\Service;


use App\Data\ItemDTO;

class ItemFixtures
{
    private $data = [];
    public function init() {
        // initialize
        $item = new ItemDTO();
        $item->setName('ZA');
        $item->setPrice(2);
        $item->setPromotionPrice(7);
        $item->setPromotionQty(4);

        $this->data[] = $item;

        $item = new ItemDTO();
        $item->setName('YB');
        $item->setPrice(12);

        $this->data[] = $item;

        $item = new ItemDTO();
        $item->setName('FC');
        $item->setPrice(1.25);
        $item->setPromotionPrice(6);
        $item->setPromotionQty(6);

        $this->data[] = $item;

        $item = new ItemDTO();
        $item->setName('GD');
        $item->setPrice(0.15);

        $this->data[] = $item;

    }

    public function getData()
    {
        return $this->data;
    }
}
