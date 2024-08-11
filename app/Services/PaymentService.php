<?php

namespace App\Services;

use App\Http\Requests\CheckoutReq;
use App\Models\Country;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
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
        $req              = $request->validated();
        $order            = Order::with('orderDetails')->find($req['order-id']);
        $countryCode      = $req['shipping-country'];
        $shippingProvince = $req['shipping-state'];
        $country          = Country::with('provinces')
                                   ->where('code', $countryCode)
                                   ->first();
        $deliveryDays     = $countryCode !== 'CA' ? 3 : 7;
        $gstAmount        = 0;
        $pstAmount        = 0;
        $shippingRate     = $country->shipping_rate;
        $amount           = $order->orderDetails->sum('total_price');

        if ($countryCode === 'CA') {
            foreach ($country->provinces as $province) {
                if ($province->short_name === $shippingProvince) {
                    $gstAmount = $amount * ($province->gst_rate / 100);
                    $pstAmount = $amount * ($province->pst_rate / 100);
                    break;
                }
            }
        }

        $order->delivery_date = Carbon::now()->addDays($deliveryDays);
        $totalAmount          = $amount + $gstAmount + $pstAmount
                                + $shippingRate;

        // Check if the "Same as Shipping Address" checkbox is checked
        $billingName       = $req['billing-name'] ?? $req['shipping-name'];
        $billingEmail      = $req['billing-email'] ?? $req['shipping-email'];
        $billingPhone      = $req['billing-phone'] ?? $req['shipping-phone'];
        $billingAddress    = $req['billing-address'] ??
                             $req['shipping-address'];
        $billingCity       = $req['billing-city'] ?? $req['shipping-city'];
        $billingProvince   = $req['billing-state'] ??
                             $shippingProvince ?? null;
        $billingCountry    = $req['billing-country'] ??
                             $countryCode;
        $billingPostalCode = $req['billing-zip'] ?? $req['shipping-zip'];

        $fiveBxResp = $this->fiveBx(
          $totalAmount,
          $req['card-number'],
          $req['card-expiry'],
          $req['card-cvc'],
          $req['order-id'],
          $req['card-type']
        );

        if ($fiveBxResp->result_code === 'ok') {
            DB::beginTransaction();
            try {
                // Update order with pricing and address information
                $order->update([
                  'pre_tax_amount'       => $amount,
                  'post_tax_amount'      => $totalAmount,
                  'gst'                  => $gstAmount,
                  'pst'                  => $pstAmount,
                  'status'               => 'CONFIRMED',
                  'shipping_rate'        => $shippingRate,
                  'shipping_name'        => $req['shipping-name'],
                  'shipping_email'       => $req['shipping-email'],
                  'shipping_phone'       => $req['shipping-phone'],
                  'shipping_address'     => $req['shipping-address'],
                  'shipping_city'        => $req['shipping-city'],
                  'shipping_province'    => $shippingProvince ?? null,
                  'shipping_country'     => $countryCode,
                  'shipping_postal_code' => $req['shipping-zip'],
                ]);
                // Create payment record
                Payment::create([
                  'order_id'            => $req['order-id'],
                  'method'              => 'Credit Card',
                  'amount'              => $totalAmount,
                  'discount'            => 0,
                  'status'              => 'Completed',
                  'payer_name'          => $req['card-name'],
                  'payer_card'          => $req['card-number'],
                  'billing_name'        => $billingName,
                  'billing_email'       => $billingEmail,
                  'billing_phone'       => $billingPhone,
                  'billing_address'     => $billingAddress,
                  'billing_city'        => $billingCity,
                  'billing_province'    => $billingProvince,
                  'billing_country'     => $billingCountry,
                  'billing_postal_code' => $billingPostalCode,
                ]);
                // Create transaction record
                Transaction::create([
                  'order_id'         => $req['order-id'],
                  'user_id'          => auth()->id(),
                  'amount'           => $totalAmount,
                  'transaction_type' => 'Payment',
                  'currency'         => 'CAD',
                  'status'           => 'Completed',
                  'response'         => null,
                ]);
                DB::commit();

                return $order;
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
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
