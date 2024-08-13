<?php

namespace Database\Seeders;

use App\Models\DefaultAddress;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
          UserSeeder::class,
          CategorySeeder::class,
          ContactQueriesSeeder::class,
          ProductSeeder::class,
          OrderSeeder::class,
          CartItemsSeeder::class,
          ReviewSeeder::class,
          WishlistSeeder::class,
          CountriesSeeder::class,
          ProvincesSeeder::class,
          ConfigsSeeder::class,
          DefaultAddressSeeder::class,
        ]);
    }

}
