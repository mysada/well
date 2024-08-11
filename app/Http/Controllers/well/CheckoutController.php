<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutReq;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Order;
use App\Models\Province;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function showCheckout(int $id)
    {
        $countries = Country::all();
        $provinces = Province::where('country_code', 'CA')->get();
        $order     = Order::find($id);

        return view(
          'well.order.checkout',
          compact('countries', 'order', 'id', 'provinces')
        );
    }

    private function fetchCartItems()
    {
        // Fetch the cart items for the authenticated user
        return CartItem::with('product')->where('user_id', Auth::id())->get();
    }

    public function process(CheckoutReq $request)
    {
        // Process payment and retrieve order details
        $order = $this->paymentService->checkout($request);

        // Redirect to the thank you page with order ID
        return RouterTools::success(
          "Payment processed successfully.",
          'thankyou',
          ['orderId' => $order->id]
        );
    }

}
