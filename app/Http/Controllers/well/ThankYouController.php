<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Country;

class ThankYouController extends Controller
{
    /**
     * Display the Thank You page for the given order.
     *
     * @param int $orderId
     * @return \Illuminate\Contracts\View\View
     */
    public function show($orderId)
    {
        $order = Order::with('orderDetails', 'payments')->findOrFail($orderId);
        $country = Country::where('code', $order->shipping_country)->first();

        // Pass the shipping rate to the view
        return view('well.pages.thankyou', compact('order', 'country'));
    }
}
