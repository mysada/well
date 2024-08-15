<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display the FAQ page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = 'Faq';

        return view('well.pages.faq', compact('title'));
    }
}
