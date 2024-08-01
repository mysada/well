<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shoppingCarts = [
            [
                'userid' => 1,
                'createddate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'userid' => 2,
                'createddate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'userid' => 1,
                'createddate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'userid' => 2,
                'createddate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'userid' => 1,
                'createddate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('shoppingcart')->insert($shoppingCarts);
    }
}
