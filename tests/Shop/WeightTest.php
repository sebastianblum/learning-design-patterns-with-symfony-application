<?php

namespace App\Tests\Shop;

use App\Shop\Weight;
use Money\Money;
use PHPUnit\Framework\TestCase;

class WeightTest extends TestCase
{

    public function testFromGrams()
    {
        $weight = Weight::fromGrams(500);
        $this->assertSame(500, $weight->getValue());
    }

    public function testFromKilogram()
    {
        $weight = Weight::fromKilogram(1.5);
        $this->assertSame(1500, $weight->getValue());
    }

    public function testLighten()
    {
        $this->assertEquals(Weight::fromGrams(200), (Weight::fromKilogram(1)->lighten(Weight::fromGrams(800))));
    }

    public function testAdd()
    {
        $this->assertEquals(Weight::fromGrams(1800), (Weight::fromKilogram(1)->add(Weight::fromGrams(800))));
    }

    public function testEquals()
    {
        $this->assertTrue((Weight::fromGrams(1000))->equals(Weight::fromKilogram(1)));
    }
}
