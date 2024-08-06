<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{

    public function run(): void
    {
        $bannerConfig = [
          [
            'image'       => 'banner1.jpg',
            'link'        => 'https://example.com/page1',
            'description' => 'Description for banner 1',
          ],
          [
            'image'       => 'banner2.jpg',
            'link'        => 'https://example.com/page2',
            'description' => 'Description for banner 2',
          ],
        ];

        Config::create([
          'key' => 'home_banner',
          'value' => json_encode($bannerConfig),
          'type' => 'json',
          'description' => 'Configuration for homepage banners',
        ]);
    }

}
