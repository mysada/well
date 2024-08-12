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
        if ($order['status'] !== 'Pending') {
            return RouterTools::success(
              'This order has been confirmed',
              'thankyou',
              [
                'orderId' => $id,
              ]
            );
        }
        $user= Auth::user();
        return view(
          'well.order.checkout',
          compact('countries', 'order', 'id', 'provinces','user')
        );
    }

    private function fetchCartItems()
    {
        // Fetch the cart items for the authenticated user
        return CartItem::with('product')->where('user_id', Auth::id())->get();
    }

    /**
     * @throws \Exception
     */
    public function process(CheckoutReq $request)
    {
        $order = Order::find($request['order-id']);
        if ($order['status'] !== 'Pending') {
            return RouterTools::success(
              'This order has been confirmed',
              'thankyou',
              ['orderId' => $order['id']]
            );
        }
        // Process payment and retrieve order details
        $this->paymentService->checkout($request);

        // Redirect to the thank you page with order ID
        return RouterTools::success(
          "Payment processed successfully.",
          'thankyou',
          ['orderId' => $order->id]
        );
    }

}
