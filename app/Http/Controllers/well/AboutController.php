<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    public function index()
    {
        $title = 'About Us';

        return view('well.pages.about');
    }

}
