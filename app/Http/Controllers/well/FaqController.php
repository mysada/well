<?php

namespace App\Http\Controllers\well;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
    {
        $title = 'Faq';

        return view('well.pages.faq');
    }

}
