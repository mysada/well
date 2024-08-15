<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display the "About Us" page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = 'About Us';

        return view('well.pages.about', compact('title'));
    }
}
