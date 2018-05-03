<?php

namespace App\Tests\Shop;

use App\Shop\PhysicalProduct;
use App\Shop\Weight;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;

class PhysicalProductTest extends TestCase
{
    public function testImplementation()
    {
        $product = new PhysicalProduct('p1', new Money(100, new Currency('EUR')), Weight::fromGrams(150));

        $this->assertSame('p1', $product->getSku());
        $price = $product->getPrice();
        $this->assertInstanceOf(Money::class, $price);
        $this->assertSame('100', $price->getAmount());
        $weight = $product->getWeight();
        $this->assertInstanceOf(Weight::class, $weight);
        $this->assertSame(150, $weight->getValue());
    }
}
