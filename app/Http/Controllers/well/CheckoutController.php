<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutReq;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{

    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function showCheckout(int $id)
    {
        $countries = Country::all();
        $user      = Auth::user();
        $order     = Order::find($id);

        return view(
          'well.order.checkout',
          compact('countries', 'order', 'user')
        );
    }

    private function fetchCartItems()
    {
        // Fetch the cart items for the authenticated user
        return CartItem::with('product')->where('user_id', Auth::id())->get();
    }

    public function process(CheckoutReq $request)
    {
        $req = $request->validated();
        // Retrieve cart items for the user
        $cartItems = CartItem::where('user_id', $req['user_id'])->get();

        if (empty($cartItems)) {
            return RouterTools::errorBack("Your cart is empty.");
        }
        DB::beginTransaction();
        try {
        } catch (\Exception $e) {
            DB::rollBack();

            return RouterTools::errorBack("Error");
        }
    }

}
