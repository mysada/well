<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Well';

        return view('well.pages.home', compact('title'));
    }

}
