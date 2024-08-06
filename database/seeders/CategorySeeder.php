<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
          ['name' => 'Skincare', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Haircare', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Makeup', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Health Supplements', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Body Care', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Essential Oils', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
