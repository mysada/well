<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            // Insert an order for user_id 3
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => 1,
                'quantity' => 2,
                'price' => 100.00,
                'recipient_name' => 'John Doe',
                'recipient_email' => 'john@gmail.com',
                'recipient_phone' => '+1-431-123-1234',
                'shipping_address' => '123 Main St',
                'shipping_city' => 'Winnipeg',
                'shipping_province' => 'MB',
                'shipping_postal_code' => 'R3C 1A1',
                'shipping_country' => 'Canada',
                'status' => 'Pending',
                'coupon_code' => 'hello-world',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ]);

            // Insert order details for the order
            DB::table('order_details')->insert([
                [
                    'order_id' => $orderId,
                    'product_id' => 1,
                    'price' => 50.00,
                    'quantity' => 2,
                    'total_price' => 100.00,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => null
                ]
            ]);

            // Insert payment details for the order
            DB::table('payments')->insert([
                [
                    'order_id' => $orderId,
                    'method' => 'Credit Card',
                    'amount' => 100.00,
                    'gst' => 5.00,
                    'pst' => 5.00,
                    'discount' => 0.00,
                    'status' => 'Pending',
                    'payer_name' => 'Tom',
                    'payer_card' => '****4312',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'deleted_at' => null
                ]
            ]);

            // Insert transaction details for the order
            DB::table('transactions')->insert([
                [
                    'order_id' => $orderId,
                    'user_id' => 1, // Assuming this is the user_id for John Doe
                    'amount' => 100.00,
                    'transaction_type' => 'Payment',
                    'currency' => 'USD',
                    'status' => 'Pending',
                    'response' => 'Transaction response details here.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]);

            DB::commit();
            Log::info('OrderSeeder completed successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('OrderSeeder failed: ' . $e->getMessage());
        }
    }
}
