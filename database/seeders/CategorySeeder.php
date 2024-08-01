<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['productid' => 1, 'categoryname' => 'Skincare', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 2, 'categoryname' => 'Haircare', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 3, 'categoryname' => 'Makeup', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 4, 'categoryname' => 'Health Supplements', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 5, 'categoryname' => 'Body Care', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 6, 'categoryname' => 'Natural Products', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 7, 'categoryname' => 'Essential Oils', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 8, 'categoryname' => 'Oral Care', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 9, 'categoryname' => 'Men\'s Grooming', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 10, 'categoryname' => 'Women\'s Care', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 11, 'categoryname' => 'Sun Protection', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 12, 'categoryname' => 'Baby Care', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 13, 'categoryname' => 'Anti-Aging', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 14, 'categoryname' => 'Detox', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 15, 'categoryname' => 'Fitness', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 16, 'categoryname' => 'Vitamins & Supplements', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 17, 'categoryname' => 'Aromatherapy', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 18, 'categoryname' => 'Personal Care', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 19, 'categoryname' => 'Spa Essentials', 'created_at' => now(), 'updated_at' => now()],
            ['productid' => 20, 'categoryname' => 'Organic Products', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
