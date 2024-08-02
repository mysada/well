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
            'product_id' => 1,
            'user_id' => 1,
            'rating' => 5,
            'review_text' => 'Amazing product! Highly recommend it.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 2,
            'user_id' => 1,
            'rating' => 4,
            'review_text' => 'Good value for money.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 3,
            'user_id' => 1,
            'rating' => 3,
            'review_text' => 'It\'s okay, but I expected more.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 4,
            'user_id' => 2,
            'rating' => 5,
            'review_text' => 'Excellent quality and fast shipping.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 5,
            'user_id' => 2,
            'rating' => 4,
            'review_text' => 'Works as advertised.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 6,
            'user_id' => 2,
            'rating' => 2,
            'review_text' => 'Not satisfied with the product.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 7,
            'user_id' => 1,
            'rating' => 5,
            'review_text' => 'Best purchase I\'ve made in a while!',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 8,
            'user_id' => 1,
            'rating' => 3,
            'review_text' => 'It\'s alright, but not great.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 9,
            'user_id' => 2,
            'rating' => 4,
            'review_text' => 'Pretty good product.',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'product_id' => 10,
            'user_id' => 2,
            'rating' => 5,
            'review_text' => 'I love this product!',
            'created_at' => now(),
            'updated_at' => now(),
          ]
        ];

        DB::table('reviews')->insert($reviews);
    }
}
