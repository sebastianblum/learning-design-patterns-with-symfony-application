<?php

namespace App\Tests\Shop;

use App\Shop\PhysicalProduct;
use App\Shop\ProductPackage;
use App\Shop\Weight;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;

class ProductPackageTest extends TestCase
{
    public function testImplementation()
    {
        $p1 = new PhysicalProduct('p1', Money::EUR(100), Weight::fromGrams(500));
        $p2 = new PhysicalProduct('p2', Money::EUR(150), Weight::fromKilogram(1));

        $package = new ProductPackage('package', [$p1, $p2]);

        $this->assertSame('package', $package->getSku());
        $this->assertSame('250', $package->getPrice()->getAmount());
        $this->assertSame(1500, $package->getWeight()->getValue());
    }
}
