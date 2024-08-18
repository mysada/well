<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactQueriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact_queries')->insert([
          [
            'name'       => 'John Doe',
            'email'      => 'john.doe@example.com',
            'phone'      => '1234567890',
            'subject'    => 'Product Inquiry',
            'message'    => 'I would like to know more about your product range.',
            'status'     => 'new',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],
          [
            'name'       => 'Jane Smith',
            'email'      => 'jane.smith@example.com',
            'phone'      => '0987654321',
            'subject'    => 'Order Issue',
            'message'    => 'I have an issue with my recent order.',
            'status'     => 'in_progress',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],
          [
            'name'       => 'Alice Johnson',
            'email'      => 'alice.johnson@example.com',
            'phone'      => '5555555555',
            'subject'    => 'Feedback',
            'message'    => 'I love your website! Keep up the great work.',
            'status'     => 'resolved',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],
        ]);
    }

}
