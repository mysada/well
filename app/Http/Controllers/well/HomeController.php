<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Config;
use App\Models\Product;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title        = 'Well';
        $heroSections = Config::where('key', 'home_banner')->first();
        $heroSections = $heroSections ? $heroSections->value : null;

        // Get a random hero section
        $randomHeroSection = !empty($heroSections) ? $heroSections[array_rand($heroSections)] : null;

        // Fetch 3 categories
        $categories = Category::take(3)->get();

        // Fetch 3 random products
        $bestSellers = Product::inRandomOrder()->take(3)->get();

        return view('well.pages.home', compact('title', 'randomHeroSection', 'categories', ));
    }

}
