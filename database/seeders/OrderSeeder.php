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
            $orderId = DB::table('orders')->insertGetId([
              'user_id' => 1,
              'quantity' => 2,
              'price' => 100.00,
              'recipient_name' => 'John Doe',
              'shipping_address' => '123 Main St',
              'shipping_city' => 'Winnipeg',
              'shipping_province' => 'MB',
              'shipping_postal_code' => 'R3C 1A1',
              'status' => 'Pending',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
              'deleted_at' => null
            ]);

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

            DB::table('payments')->insert([
              [
                'order_id' => $orderId,
                'method' => 'Credit Card',
                'amount' => 100.00,
                'gst' => 5.00,
                'pst' => 5.00,
                'discount' => 0.00,
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
              ]
            ]);

            DB::table('transactions')->insert([
              [
                'order_id' => $orderId,
                'user_id' => 1,
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
