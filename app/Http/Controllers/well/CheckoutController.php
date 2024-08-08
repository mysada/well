<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutReq;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{

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
        $req       = $request->validated();
        $order     = Order::with('orderDetails')->find($req['order-id']);
        $country   = Country::find($req['shipping-country']);
        $gstAmount = 0;
        $pstAmount = 0;
        $amount    = $order['price'];
        if ($country['code'] === 'CA') {
            foreach ($country->provinces() as $province) {
                if ($province['short_name'] === $req['shipping-state']) {
                    $gstRate = $province->gst_rate;
                    $pstRate = $province->pst_rate;
                    // Calculate GST and PST
                    $gstAmount = $amount * ($gstRate / 100);
                    $pstAmount = $amount * ($pstRate / 100);
                }
            }
        }
        DB::beginTransaction();
        try {
        } catch (\Exception $e) {
            DB::rollBack();

            return RouterTools::errorBack("Error");
        }
    }

}
