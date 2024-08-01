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
            ['categoryname' => 'Skincare', 'created_at' => now(), 'updated_at' => now()],
            ['categoryname' => 'Haircare', 'created_at' => now(), 'updated_at' => now()],
            ['categoryname' => 'Makeup', 'created_at' => now(), 'updated_at' => now()],
            ['categoryname' => 'Health Supplements', 'created_at' => now(), 'updated_at' => now()],
            ['categoryname' => 'Body Care', 'created_at' => now(), 'updated_at' => now()],
            ['categoryname' => 'Essential Oils', 'created_at' => now(), 'updated_at' => now()],
            ['categoryname' => 'Oral Care', 'created_at' => now(), 'updated_at' => now()],
            ['categoryname' => 'Men\'s Grooming', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
