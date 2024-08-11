<?php

namespace Tests\Feature;

use App\Models\Country;
use Tests\TestCase;

class CountryTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $country = Country::with('provinces')->where('code', 'CA')->first();
        printf($country->provinces);
    }

}
