<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProvincesSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
          [
            'country_code' => 'CA',
            'name' => 'Alberta',
            'short_name' => 'AB',
            'gst_rate' => 5.00,
            'pst_rate' => 0.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'British Columbia',
            'short_name' => 'BC',
            'gst_rate' => 5.00,
            'pst_rate' => 7.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Manitoba',
            'short_name' => 'MB',
            'gst_rate' => 5.00,
            'pst_rate' => 7.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'New Brunswick',
            'short_name' => 'NB',
            'gst_rate' => 5.00,
            'pst_rate' => 10.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Newfoundland and Labrador',
            'short_name' => 'NL',
            'gst_rate' => 5.00,
            'pst_rate' => 10.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Northwest Territories',
            'short_name' => 'NT',
            'gst_rate' => 5.00,
            'pst_rate' => 0.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Nova Scotia',
            'short_name' => 'NS',
            'gst_rate' => 5.00,
            'pst_rate' => 10.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Nunavut',
            'short_name' => 'NU',
            'gst_rate' => 5.00,
            'pst_rate' => 0.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Ontario',
            'short_name' => 'ON',
            'gst_rate' => 5.00,
            'pst_rate' => 8.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Prince Edward Island',
            'short_name' => 'PE',
            'gst_rate' => 5.00,
            'pst_rate' => 10.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Quebec',
            'short_name' => 'QC',
            'gst_rate' => 5.00,
            'pst_rate' => 9.975,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Saskatchewan',
            'short_name' => 'SK',
            'gst_rate' => 5.00,
            'pst_rate' => 6.00,
          ],
          [
            'country_code' => 'CA',
            'name' => 'Yukon',
            'short_name' => 'YT',
            'gst_rate' => 5.00,
            'pst_rate' => 0.00,
          ],
        ];

        foreach ($provinces as $province) {
            DB::table('provinces')->insert($province);
        }
    }
}
