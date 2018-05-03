<?php

namespace App\Shop;


use Money\Money;

class PhysicalProduct
{
    private $sku;
    private $price;
    private $weight;

    public function __construct(string $sku, Money $price, Weight $weight)
    {
        $this->sku = $sku;
        $this->price = $price;
        $this->weight = $weight;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }
}