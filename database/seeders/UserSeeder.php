<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => password_hash('mypass', PASSWORD_DEFAULT),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'fullname' => 'admin',
                'address' => '123 Admin Street',
                'phonenumber' => '1234567890',
                'is_admin' => 1,
            ],
            [
                'name' => 'mydasa',
                'email' => 'mydasa@gmail.com',
                'email_verified_at' => now(),
                'password' => password_hash('mydasa', PASSWORD_DEFAULT),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'fullname' => 'mydasa',
                'address' => '456 John Street',
                'phonenumber' => '0987654321',
                'is_admin' => 0,
            ],
            // Add more user records as needed
        ]);
    }
}
