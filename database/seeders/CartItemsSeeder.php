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
        $cartItems = [
            [
                'cartid' => 1,
                'productid' => 1,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'cartid' => 1,
                'productid' => 2,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'cartid' => 2,
                'productid' => 3,
                'quantity' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'cartid' => 3,
                'productid' => 4,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'cartid' => 4,
                'productid' => 5,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('cartitems')->insert($cartItems);
    }
}
