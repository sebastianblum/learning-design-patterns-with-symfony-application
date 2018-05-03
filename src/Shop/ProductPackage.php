<?php

namespace App\Shop;

use App\Shop\Visitor\ProductVisitor;
use Money\Currency;
use Money\Money;


/** Composite Object */
class ProductPackage extends PhysicalProduct
{
    private $products = [];

    public function __construct(string $sku, array $products)
    {
        $this->products = $products;

        parent::__construct(
            $sku,
            $this->getTotalPrice(),
            $this->getTotalWeight()
        );
    }


    private function getTotalPrice(): Money
    {
        $price = new Money(0, new Currency('EUR'));

        foreach ($this->products as $product)
        {
            $price = $price->add($product->getPrice());
        }

        return $price;
    }

    private function getTotalWeight(): Weight
    {
        $weight = Weight::fromGrams(0);

        foreach ($this->products as $product)
        {
            $weight = $weight->add($product->getWeight());
        }

        return $weight;
    }

    public function getNumberOfProducts(): int
    {
        return count($this->products);
    }

    public function accept(ProductVisitor $visitor)
    {
        $visitor->visitPackage($this);

        foreach ($this->products as $product) {
            $product->accept($visitor);
        }
    }
}