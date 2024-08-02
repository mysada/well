<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $product = Product::with('category')->find(1);
        $attributes = $product->getAttributes();

    }

}
