<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
          [
            'user_id' => 1,
            'quantity' => 2,
            'price' => 15.99,
            'recipient_name' => 'John Doe',
            'shipping_address' => '123 Main St',
            'shipping_city' => 'Toronto',
            'shipping_province' => 'Ontario',
            'shipping_postal_code' => 'M5A 1A1',
            'status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'user_id' => 1,
            'quantity' => 2,
            'price' => 10.99,
            'recipient_name' => 'Jane Smith',
            'shipping_address' => '456 Oak St',
            'shipping_city' => 'Vancouver',
            'shipping_province' => 'British Columbia',
            'shipping_postal_code' => 'V5K 0A1',
            'status' => 'Shipped',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'user_id' => 2,
            'quantity' => 2,
            'price' => 12.50,
            'recipient_name' => 'Alice Johnson',
            'shipping_address' => '789 Pine St',
            'shipping_city' => 'Montreal',
            'shipping_province' => 'Quebec',
            'shipping_postal_code' => 'H2X 1Y4',
            'status' => 'Delivered',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'user_id' => 2,
            'quantity' => 2,
            'price' => 25.00,
            'recipient_name' => 'Bob Brown',
            'shipping_address' => '321 Elm St',
            'shipping_city' => 'Calgary',
            'shipping_province' => 'Alberta',
            'shipping_postal_code' => 'T2P 2V1',
            'status' => 'Cancelled',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'user_id' => 1,
            'quantity' => 2,
            'price' => 30.00,
            'recipient_name' => 'John Doe',
            'shipping_address' => '654 Cedar St',
            'shipping_city' => 'Ottawa',
            'shipping_province' => 'Ontario',
            'shipping_postal_code' => 'K1N 5A2',
            'status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
          ]
        ];

        DB::table('orders')->insert($orders);
    }
}
