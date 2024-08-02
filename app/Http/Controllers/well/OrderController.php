<?php

namespace App\Http\Controllers\well;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public
    function create()
    {
        $title = 'Check Order';

        return view('well.order.order_check', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public
    function store(
      Request $request
    ) {
        //
    }

    /**
     * Display the specified resource.
     */
    public
    function show(
      string $id
    ) {
        //
    }

}
