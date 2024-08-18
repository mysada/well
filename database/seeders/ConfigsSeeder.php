<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigsSeeder extends Seeder
{

    public function run(): void
    {
        $heroSections = [
          [
            'image'       => 'images/home/home_banner1.jpg',
            'title'       => 'SALE',
            'description' => 'Skincare, fitness products, nutritional supplements',
            'bold_text'   => 'Up to 50% discount, check it out',
            'button_text' => 'Explore',
            'button_link' => '#',
          ],
          [
            'image'       => 'images/home/home_banner2.jpg',
            'title'       => 'NEW ARRIVALS',
            'description' => 'Check out our latest products',
            'bold_text'   => 'Special prices available now',
            'button_text' => 'Shop Now',
            'button_link' => '#',
          ],
          [
            'image'       => 'images/home/home_banner3.jpg',
            'title'       => 'LIMITED TIME OFFER',
            'description' => 'Exclusive deals on select items',
            'bold_text'   => 'Hurry, while stocks last',
            'button_text' => 'Discover',
            'button_link' => '#',
          ],
        ];
        // Get a random key
        $randomKey = array_rand($heroSections);

        // Get the random element
        $randomHeroSection = $heroSections[$randomKey];

        DB::table('configs')->insert([
          'key'         => 'home_banner',
          'value'       => json_encode($heroSections),
          'type'        => 'json',
          'description' => 'Configuration for homepage banners',
        ]);
    }

}
