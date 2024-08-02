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
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'user_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'user_id' => 2,
            'product_id' => 3,
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now()
          ]
        ];

        DB::table('cart_items')->insert($cartItems);
    }
}
