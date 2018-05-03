<?php

namespace App\Shop\Visitor;


use App\Shop\PhysicalProduct;
use App\Shop\ProductPackage;

interface ProductVisitor
{
    public function visitPackage(ProductPackage $package);

    public function visitProduct(PhysicalProduct $product);
}