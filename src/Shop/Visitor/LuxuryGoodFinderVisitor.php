<?php

namespace App\Shop\Visitor;


use App\Shop\PhysicalProduct;
use App\Shop\ProductPackage;
use Money\Money;

class LuxuryGoodFinderVisitor implements ProductVisitor
{
    private $luxuryGoodPriceThreshold;
    private $luxuryGoods = [];

    public function __construct(Money $luxuryGoodPriceThreshold)
    {
        $this->luxuryGoodPriceThreshold = $luxuryGoodPriceThreshold;
    }

    public function visitPackage(ProductPackage $package)
    {
        // do nothing
    }

    public function visitProduct(PhysicalProduct $product)
    {
        if ($product->getPrice()->greaterThanOrEqual($this->luxuryGoodPriceThreshold)) {
            $this->luxuryGoods[$product->getSku()] = $product->getPrice();
        }
    }

    public function getLuxuryGoods(): array
    {
        return $this->luxuryGoods;
    }

}