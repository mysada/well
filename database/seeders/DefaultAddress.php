<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DefaultAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = DB::table('users')->where('email', 'admin@gmail.com')->value('id');
        $mydasaId = DB::table('users')->where('email', 'mydasa@gmail.com')->value('id');

        DB::table('default_addresses')->insert([
            [
                'user_id' => $adminId,
                'billing_name' => 'Admin User',
                'billing_address' => '123 Admin Street',
                'billing_city' => 'Admin City',
                'billing_province' => 'Admin Province',
                'billing_country' => 'Admin Country',
                'billing_postal_code' => '12345',
                'billing_email' => 'admin@gmail.com',
                'billing_phone' => '1234567890',
                'shipping_name' => 'Admin User',
                'shipping_address' => '123 Admin Street',
                'shipping_city' => 'Admin City',
                'shipping_province' => 'Admin Province',
                'shipping_country' => 'Admin Country',
                'shipping_postal_code' => '12345',
                'shipping_email' => 'admin@gmail.com',
                'shipping_phone' => '1234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $mydasaId,
                'billing_name' => 'MyDasa User',
                'billing_address' => '456 John Street',
                'billing_city' => 'MyDasa City',
                'billing_province' => 'MyDasa Province',
                'billing_country' => 'MyDasa Country',
                'billing_postal_code' => '67890',
                'billing_email' => 'mydasa@gmail.com',
                'billing_phone' => '0987654321',
                'shipping_name' => 'MyDasa User',
                'shipping_address' => '456 John Street',
                'shipping_city' => 'MyDasa City',
                'shipping_province' => 'MyDasa Province',
                'shipping_country' => 'MyDasa Country',
                'shipping_postal_code' => '67890',
                'shipping_email' => 'mydasa@gmail.com',
                'shipping_phone' => '0987654321',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
