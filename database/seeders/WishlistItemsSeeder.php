<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wishlistItems = [
            [
                'wishlistid' => 1,
                'productid' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 1,
                'productid' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 2,
                'productid' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 2,
                'productid' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 3,
                'productid' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 3,
                'productid' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 4,
                'productid' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 4,
                'productid' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 5,
                'productid' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'wishlistid' => 5,
                'productid' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('wishlistitems')->insert($wishlistItems);
    }
}
