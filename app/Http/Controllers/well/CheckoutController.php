<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('well.order.checkout');
    }
}
