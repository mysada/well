<?php

namespace App\Http\Controllers\well;

class AboutController extends Controller
{

    public function index()
    {
        $title = 'About Us';

        return view('well.pages.about');
    }

}
