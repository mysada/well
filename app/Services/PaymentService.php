<?php

namespace App\Services;

use App\Http\Requests\CheckoutReq;
use App\Models\Country;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\DB;
use Pacewdd\Bx\_5bx;

class PaymentService
{

    protected _5bx $transaction;

    public function __construct()
    {
        $this->transaction = new _5bx(
          config('payment.bx_login'),
          config('payment.bx_key')
        );
    }

    /**
     * @throws \Exception
     */
    public function checkout(CheckoutReq $request)
    {
        $req       = $request->validated();
        $order     = Order::with('orderDetails')->find($req['order-id']);
        $country   = Country::where('code', $req['shipping-country'])->first();
        $gstAmount = 0;
        $pstAmount = 0;
        $amount    = $order->orderDetails->sum(
          'total_price'
        ); // Calculate total amount from order details

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
                       + $country->shipping_rate;

        $paymentResponse = $this->fiveBx(
          $totalAmount,
          $req['card-number'],
          $req['card-expiry'],
          $req['card-cvc'],
          $req['order-id'],
          $req['card-type']
        );
        if ($paymentResponse->result_code==='ok') {
            DB::beginTransaction();
            try {
                // Update order with pricing information
                $order->update([
                  'pre_tax_amount'  => $amount,
                  'post_tax_amount' => $totalAmount - ($gstAmount + $pstAmount),
                  'gst'             => $gstAmount,
                  'pst'             => $pstAmount,
                  'status' =>'Shipped'
                ]);

                // Create payment record
                $payment = Payment::create([
                  'order_id'   => $req['order-id'],
                  'method'     => 'Credit Card',
                  'amount'     => $totalAmount,
                  'discount'   => 0,
                  'status'     => 'Completed',
                  'payer_name' => $req['card-name'],
                  'payer_card' => $req['card-number'],
                ]);

                // Create transaction record
                Transaction::create([
                  'order_id'         => $req['order-id'],
                  'user_id'          => auth()->id(),
                  'amount'           => $totalAmount,
                  'transaction_type' => 'Payment',
                  'currency'         => 'CAD', // Change as needed
                  'status'           => 'Completed',
                  'response'         => null,
                ]);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e; // Re-throw the exception
            }
        }
    }

    public function fiveBx(
      float $amount,
      string $cardNum,
      string $expDate,
      int $cvv,
      string $refNum,
      string $cardType
    ) {
        $this->transaction->amount($amount);
        $this->transaction->card_num($cardNum);
        $this->transaction->exp_date($expDate);
        $this->transaction->cvv($cvv);
        $this->transaction->ref_num($refNum);
        $this->transaction->card_type($cardType);

        return $this->transaction->authorize_and_capture();
    }

}
