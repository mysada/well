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
          ['name' => 'Skincare', 'image' => 'images/home/category_1', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Haircare', 'image' => 'images/home/category_2', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Makeup', 'image' => 'images/home/category_3', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Health Supplements', 'image' => 'images/home/category_4', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Body Care', 'image' => 'images/home/category_5', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Essential Oils', 'image' => 'images/home/category_6', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
