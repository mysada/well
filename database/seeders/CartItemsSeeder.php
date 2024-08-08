<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have a way to get product prices, otherwise set these manually
        $productPrices = [
            1 => 100.00, // Price of product_id 1
            2 => 50.00,  // Price of product_id 2
            3 => 20.00   // Price of product_id 3
        ];

        $cartItems = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'subtotal' => $productPrices[1] * 2,
                'total' => $productPrices[1] * 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'subtotal' => $productPrices[2] * 1,
                'total' => $productPrices[2] * 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'product_id' => 3,
                'quantity' => 3,
                'subtotal' => $productPrices[3] * 3,
                'total' => $productPrices[3] * 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('cart_items')->insert($cartItems);
    }
}
