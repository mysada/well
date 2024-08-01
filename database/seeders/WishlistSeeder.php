<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wishlists = [
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
            ]
        ];

        DB::table('wishlist')->insert($wishlists);
    }
}
