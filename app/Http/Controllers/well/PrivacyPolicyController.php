<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $title = 'Privacy Policy';

        return view('well.pages.privacy_policy');
    }


}
