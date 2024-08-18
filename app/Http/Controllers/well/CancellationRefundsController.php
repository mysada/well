<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;

class CancellationRefundsController extends Controller
{

    /**
     * Display the "Cancellation & Refunds" page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = 'Cancellation & Refunds';

        return view('well.pages.cancellation_refunds');
    }

}
