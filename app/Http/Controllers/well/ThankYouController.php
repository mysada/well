<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Country;

class ThankYouController extends Controller
{
    public function show($orderId)
    {
        $order = Order::with('orderDetails', 'payments')->findOrFail($orderId);
        $country = Country::where('code', $order->shipping_country)->first();

        // Pass the shipping rate to the view
        return view('well.pages.thankyou', compact('order', 'country'));
    }
}
