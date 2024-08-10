<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ThankYouController extends Controller
{
    public function show($orderId)
    {
        $order = Order::with('orderDetails', 'payments')->findOrFail($orderId);
        return view('well.pages.thankyou', compact('order'));
    }
}
