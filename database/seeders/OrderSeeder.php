<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            // Insert an order for user_id 1
            $orderId = DB::table('orders')->insertGetId([
              'user_id'              => 1,
              'quantity'             => 2,
              'pre_tax_amount'       => 100.00,
              'post_tax_amount'      => 110.00,
              'gst'                  => 5.00,
              'pst'                  => 5.00,
              'shipping_rate'        => 5.00,
              'shipping_name'        => 'John Doe',
              'shipping_email'       => 'john@gmail.com',
              'shipping_phone'       => '+1-431-123-1234',
              'shipping_address'     => '123 Main St',
              'shipping_city'        => 'Winnipeg',
              'shipping_province'    => 'MB',
              'shipping_country'     => 'Canada',
              'shipping_postal_code' => 'R3C 1A1',

              'coupon_code' => 'hello-world',
              'status'      => 'Delivered',
              'created_at'  => Carbon::now(),
              'updated_at'  => Carbon::now(),
              'deleted_at'  => null,
            ]);

            // Insert order details for the order
            DB::table('order_details')->insert([
              [
                'order_id'    => $orderId,
                'product_id'  => 1,
                'price'       => 50.00,
                'quantity'    => 2,
                'total_price' => 100.00,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                'deleted_at'  => null,
              ],
            ]);

            // Insert payment details for the order
            DB::table('payments')->insert([
              [
                'order_id'            => $orderId,
                'method'              => 'Credit Card',
                'amount'              => 100.00,
                'discount'            => 0.00,
                'status'              => 'Completed',
                'payer_name'          => 'Tom',
                'payer_card'          => '****4312',
                'billing_name'        => 'John Doe',
                // Assuming billing info is the same as shipping info
                'billing_email'       => 'john@gmail.com',
                'billing_phone'       => '+1-431-123-1234',
                'billing_address'     => '123 Main St',
                'billing_city'        => 'Winnipeg',
                'billing_province'    => 'MB',
                'billing_country'     => 'Canada',
                'billing_postal_code' => 'R3C 1A1',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
                'deleted_at'          => null,
              ],
            ]);

            // Insert transaction details for the order
            DB::table('transactions')->insert([
              [
                'order_id'         => $orderId,
                'user_id'          => 1,
                // Assuming this is the user_id for John Doe
                'amount'           => 100.00,
                'transaction_type' => 'Payment',
                'currency'         => 'USD',
                'status'           => 'Pending',
                'response'         => 'Transaction response details here.',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
              ],
            ]);

            DB::commit();
            Log::info('OrderSeeder completed successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('OrderSeeder failed: '.$e->getMessage());
        }
    }

}
