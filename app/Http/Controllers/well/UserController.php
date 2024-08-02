<?php

namespace App\Http\Controllers\well;

use App\Models\Order;

class UserController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $title  = 'Profile';

        return view('well.pages.profile', compact('orders', 'title'));
    }

}
