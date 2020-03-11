<?php

namespace App\Data;

class ItemDTO
{
  private $name;
  private $price;
  private $promotionQty;
  private $promotionPrice;

  public function getName()
  {
      return $this->name;
  }

  public function setName($name)
  {
      $this->name = $name;
  }

  public function setPrice($price)
  {
      $this->price = $price;
  }

  public function getPrice()
  {
     return $this->price;
  }

  public function setPromotionQty($promotionQty)
  {
      $this->promotionQty = $promotionQty;
  }

  public function getPromotionQty()
  {
      return $this->promotionQty;
  }

  public function getPromotionPrice()
  {
      return $this->promotionPrice;
  }

  public function setPromotionPrice($promotionPrice)
  {
      $this->promotionPrice = $promotionPrice;
  }
}
