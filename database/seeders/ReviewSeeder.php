<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'productid' => 1,
                'userid' => 1,
                'rating' => 5,
                'reviewtext' => 'Amazing product! Highly recommend it.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 2,
                'userid' => 1,
                'rating' => 4,
                'reviewtext' => 'Good value for money.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 3,
                'userid' => 1,
                'rating' => 3,
                'reviewtext' => 'It\'s okay, but I expected more.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 4,
                'userid' => 2,
                'rating' => 5,
                'reviewtext' => 'Excellent quality and fast shipping.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 5,
                'userid' => 2,
                'rating' => 4,
                'reviewtext' => 'Works as advertised.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 6,
                'userid' => 2,
                'rating' => 2,
                'reviewtext' => 'Not satisfied with the product.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 7,
                'userid' => 1,
                'rating' => 5,
                'reviewtext' => 'Best purchase I\'ve made in a while!',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 8,
                'userid' => 1,
                'rating' => 3,
                'reviewtext' => 'It\'s alright, but not great.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 9,
                'userid' => 2,
                'rating' => 4,
                'reviewtext' => 'Pretty good product.',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 10,
                'userid' => 2,
                'rating' => 5,
                'reviewtext' => 'I love this product!',
                'reviewdate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('reviews')->insert($reviews);
    }
}
