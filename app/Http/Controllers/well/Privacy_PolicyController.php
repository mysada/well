<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Privacy_PolicyController extends Controller
{
    public function index()
    {
        $title = 'Privacy Policy';

        return view('well.pages.privacy_policy');
    }


}
