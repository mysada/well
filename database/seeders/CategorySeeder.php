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
          ['name' => 'Skincare', 'image' => 'images/home/category_1.jpg', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Haircare', 'image' => 'images/home/category_2.jpg', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Makeup', 'image' => 'images/home/category_3.jpg', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Health Supplements', 'image' => 'images/home/category_4.jpg', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Body Care', 'image' => 'images/home/category_5.jpg', 'created_at' => now(), 'updated_at' => now()],
          ['name' => 'Essential Oils', 'image' => 'images/home/category_6.jpg', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
