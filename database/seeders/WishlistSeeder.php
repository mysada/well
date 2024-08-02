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
            'user_id' => 1,
            'product_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'user_id' => 2,
            'product_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'user_id' => 1,
            'product_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'user_id' => 2,
            'product_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
          ],
          [
            'user_id' => 1,
            'product_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
          ]
        ];

        DB::table('wishlists')->insert($wishlists);
    }
}
