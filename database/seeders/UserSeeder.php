<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
          [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => password_hash('mypass', PASSWORD_DEFAULT),
            'remember_token' => Str::random(10),
            'full_name' => 'Admin User',
            'address' => '123 Admin Street',
            'phone' => '1234567890',
            'is_admin' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],
          [
            'name' => 'mydasa',
            'email' => 'mydasa@gmail.com',
            'email_verified_at' => now(),
            'password' => password_hash('mypass', PASSWORD_DEFAULT),
            'remember_token' => Str::random(10),
            'full_name' => 'MyDasa User',
            'address' => '456 John Street',
            'phone' => '0987654321',
            'is_admin' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],
        ]);
    }
}
