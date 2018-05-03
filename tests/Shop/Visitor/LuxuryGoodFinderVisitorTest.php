<?php

namespace App\Tests\Shop\Visitor;

use App\Shop\PhysicalProduct;
use App\Shop\ProductPackage;
use App\Shop\Visitor\LuxuryGoodFinderVisitor;
use App\Shop\Weight;
use Money\Money;
use PHPUnit\Framework\TestCase;

class LuxuryGoodFinderVisitorTest extends TestCase
{
    public function testFindLuxuryGoodsInPackage()
    {
        $p1 = new PhysicalProduct('p1', Money::EUR(100), Weight::fromGrams(500));
        $p2 = new PhysicalProduct('p2', Money::EUR(50), Weight::fromKilogram(1));
        $p3 = new PhysicalProduct('p3', Money::EUR(150), Weight::fromKilogram(1));

        $package = new ProductPackage('package', [$p1, $p2, $p3]);

        $visitor = new LuxuryGoodFinderVisitor(Money::EUR(100));

        $package->accept($visitor);

        $this->assertCount(2, $visitor->getLuxuryGoods());
        $this->assertSame(['p1' => $p1->getPrice(), 'p3' => $p3->getPrice()], $visitor->getLuxuryGoods());
    }
}
