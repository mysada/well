<?php

namespace App\Http\Controllers\well;

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
