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
                'productid' => 1,
                'userid' => 1,
                'orderdate' => now(),
                'totalamount' => 31.98,
                'shippingaddress' => '123 Main St, Anytown, USA',
                'status' => 'Pending',
                'price' => 15.99,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 2,
                'userid' => 1,
                'orderdate' => now(),
                'totalamount' => 21.98,
                'shippingaddress' => '456 Oak St, Sometown, USA',
                'status' => 'Shipped',
                'price' => 10.99,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 3,
                'userid' => 2,
                'orderdate' => now(),
                'totalamount' => 25.00,
                'shippingaddress' => '789 Pine St, Anycity, USA',
                'status' => 'Delivered',
                'price' => 12.50,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 4,
                'userid' => 2,
                'orderdate' => now(),
                'totalamount' => 50.00,
                'shippingaddress' => '321 Elm St, Somecity, USA',
                'status' => 'Cancelled',
                'price' => 25.00,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'productid' => 5,
                'userid' => 1,
                'orderdate' => now(),
                'totalamount' => 60.00,
                'shippingaddress' => '654 Cedar St, Anyplace, USA',
                'status' => 'Pending',
                'price' => 30.00,
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('orders')->insert($orders);
    }
}
