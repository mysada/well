<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultAddressSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addr = [
          [
            'user_id'              => 1,
            'billing_name'         => 'Admin User',
            'billing_address'      => '123 Admin Street',
            'billing_city'         => 'Admin City',
            'billing_province'     => 'Admin Province',
            'billing_country'      => 'Admin Country',
            'billing_postal_code'  => '12345',
            'billing_email'        => 'admin@gmail.com',
            'billing_phone'        => '1234567890',
            'shipping_name'        => 'Admin User',
            'shipping_address'     => '123 Admin Street',
            'shipping_city'        => 'Admin City',
            'shipping_province'    => 'MB',
            'shipping_country'     => 'CA',
            'shipping_postal_code' => '12345',
            'shipping_email'       => 'admin@gmail.com',
            'shipping_phone'       => '1234567890',
            'created_at'           => Carbon::now(),
            'updated_at'           => Carbon::now(),
          ],
          [
            'user_id'              => 2,
            'billing_name'         => 'MyDasa User',
            'billing_address'      => '456 John Street',
            'billing_city'         => 'MyDasa City',
            'billing_province'     => 'MyDasa Province',
            'billing_country'      => 'MyDasa Country',
            'billing_postal_code'  => '67890',
            'billing_email'        => 'mydasa@gmail.com',
            'billing_phone'        => '0987654321',
            'shipping_name'        => 'MyDasa User',
            'shipping_address'     => '456 John Street',
            'shipping_city'        => 'MyDasa City',
            'shipping_province'    => 'MB',
            'shipping_country'     => 'CA',
            'shipping_postal_code' => '67890',
            'shipping_email'       => 'mydasa@gmail.com',
            'shipping_phone'       => '0987654321',
            'created_at'           => Carbon::now(),
            'updated_at'           => Carbon::now(),
          ],
        ];
        DB::table('default_addresses')->insert($addr);
    }

}
