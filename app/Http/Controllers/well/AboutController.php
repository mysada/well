<?php

namespace App\Http\Controllers\well;

class AboutController extends Controller
{
    public function index()
    {
        return view('about'); // Make sure this matches your Blade file
    }
}
