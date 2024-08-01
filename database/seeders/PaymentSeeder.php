<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'orderid' => 1,
                'paymentmethod' => 'Credit Card',
                'paymentdate' => now(),
                'amount' => 31.98,
                'tax' => 2.00,
                'gst' => 1.50,
                'discount' => 3.00,
                'paymentstatus' => 'Completed',
                'transactionid' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 2,
                'paymentmethod' => 'PayPal',
                'paymentdate' => now(),
                'amount' => 21.98,
                'tax' => 1.50,
                'gst' => 1.00,
                'discount' => 2.00,
                'paymentstatus' => 'Pending',
                'transactionid' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 3,
                'paymentmethod' => 'Other',
                'paymentdate' => now(),
                'amount' => 25.00,
                'tax' => 1.75,
                'gst' => 1.25,
                'discount' => 2.50,
                'paymentstatus' => 'Failed',
                'transactionid' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 4,
                'paymentmethod' => 'Credit Card',
                'paymentdate' => now(),
                'amount' => 50.00,
                'tax' => 3.00,
                'gst' => 2.00,
                'discount' => 5.00,
                'paymentstatus' => 'Completed',
                'transactionid' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 5,
                'paymentmethod' => 'PayPal',
                'paymentdate' => now(),
                'amount' => 60.00,
                'tax' => 3.50,
                'gst' => 2.50,
                'discount' => 6.00,
                'paymentstatus' => 'Failed', // Changed to 'Failed'
                'transactionid' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('payments')->insert($payments);
    }
}
