<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Config;

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
        $bannerConfig = Config::where('key', 'home_banner')->first();
        $bannerConfig = $bannerConfig ? $bannerConfig->value : null;

        // Fetch 3 categories
        $categories = Category::take(3)->get();

        return view('well.pages.home', compact('title', 'bannerConfig', 'categories'));
    }

}
