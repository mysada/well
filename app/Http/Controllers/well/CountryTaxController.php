<?php

namespace App\Http\Controllers\well;

use App\Helpers\ResponseTools;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Province;

class CountryTaxController extends Controller
{

    /**
     * Returns a JSON response with all countries.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function countries()
    {
        $countries = Country::all(); // Retrieve all countries from the database

        return ResponseTools::success(
          $countries,
          'Countries retrieved successfully.'
        );
    }

    /**
     * Returns a JSON response with all provinces.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function provinces()
    {
        $provinces = Province::all(
        ); // Retrieve all provinces from the database

        return ResponseTools::success(
          $provinces,
          'Provinces retrieved successfully.'
        );
    }

}
