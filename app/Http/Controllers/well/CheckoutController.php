<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutReq;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
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

        if ($country->code === 'CA') {
            foreach ($country->provinces() as $province) {
                if ($province->short_name === $req['shipping-state']) {
                    $gstRate = $province->gst_rate;
                    $pstRate = $province->pst_rate;
                    // Calculate GST and PST
                    $gstAmount = $amount * ($gstRate / 100);
                    $pstAmount = $amount * ($pstRate / 100);
                    break;
                }
            }
        }
        $totalAmount = $amount + $gstAmount + $pstAmount
                       + $country['shipping_rate'];

        DB::beginTransaction();
        try {
            // Create payment record
            $payment = Payment::create([
              'order_id'   => $req['order-id'],
              'method'     => 'Credit Card',
              'amount'     => $totalAmount,
              'gst'        => $gstAmount,
              'pst'        => $pstAmount,
              'discount'   => 0,
              'status'     => 'Pending',
              'payer_name' => $req['card-name'],
              'payer_card' => $req['card-number'],
            ]);

            // Create transaction record
            Transaction::create([
              'order_id'         => $req['order-id'],
              'user_id'          => auth()->id(),
              'amount'           => $totalAmount,
              'transaction_type' => 'Payment',
              'currency'         => 'USD', // Change as needed
              'status'           => 'Pending',
              'response'         => null,
            ]);

            DB::commit();

            // Redirect or return response
            return RouterTools::success(
              "Payment processed successfully.",
              'user.profile'
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return RouterTools::errorBack("Error processing payment.");
        }
    }

}
