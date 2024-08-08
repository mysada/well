<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CancellationRefundsController extends Controller
{
    public function index()
    {
        $title = 'Cancellation & Refunds';

        return view('well.pages.cancellation_refunds');
    }
}
