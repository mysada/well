<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

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
        // Get the authenticated user
        $user = Auth::user();

        // Fetch the order and check if it belongs to the authenticated user
        $order = Order::with('orderDetails', 'payments')
            ->where('id', $orderId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        // Fetch the country based on the shipping country code
        $country = Country::where('code', $order->shipping_country)->first();

        // Pass the order and country details to the view
        return view('well.pages.thankyou', compact('order', 'country'));
    }

}
