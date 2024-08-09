<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutReq;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Order;
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
        $user      = Auth::user();
        $order     = Order::find($id);

        return view(
          'well.order.checkout',
          compact('countries', 'order', 'user', 'id')
        );
    }

    private function fetchCartItems()
    {
        // Fetch the cart items for the authenticated user
        return CartItem::with('product')->where('user_id', Auth::id())->get();
    }

    public function process(CheckoutReq $request)
    {
        $this->paymentService->checkout($request);

        // Redirect or return response
        return RouterTools::success(
          "Payment processed successfully.",
          'user.profile'
        );
    }

}
