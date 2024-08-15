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

/**
 * Class PaymentService
 *
 * Handles the payment processing and order management within the application.
 */
class PaymentService
{
    protected _5bx $transaction;

    /**
     * PaymentService constructor.
     *
     * Initializes the payment transaction object using the _5bx payment gateway.
     */
    public function __construct()
    {
        $this->transaction = new _5bx(
            config('payment.bx_login'),
            config('payment.bx_key')
        );
    }

    /**
     * Process the checkout request and handle payment.
     *
     * Validates the request data, calculates taxes and shipping rates,
     * and processes the payment through the _5bx gateway. If the payment
     * is successful, the order is updated with payment details and marked
     * as confirmed.
     *
     * @param CheckoutReq $request The validated checkout request data.
     *
     * @return Order|null The updated order object.
     *
     * @throws \Exception If any error occurs during the payment process.
     */
    public function checkout(CheckoutReq $request)
    {
        $req = $request->validated();
        $order = Order::with('orderDetails')->find($req['order-id']);
        $countryCode = $req['shipping-country'];
        $shippingProvince = $req['shipping-state'];
        $country = Country::with('provinces')
            ->where('code', $countryCode)
            ->first();
        $deliveryDays = $countryCode !== 'CA' ? 3 : 7;
        $gstAmount = 0;
        $pstAmount = 0;
        $shippingRate = $country->shipping_rate;
        $amount = $order->orderDetails->sum('total_price');

        if ($countryCode === 'CA') {
            $caProvince = null;
            foreach ($country->provinces as $province) {
                if ($province->short_name === $shippingProvince) {
                    $gstAmount = $amount * ($province->gst_rate / 100);
                    $pstAmount = $amount * ($province->pst_rate / 100);
                    $caProvince = $province;
                    break;
                }
            }
            if (empty($caProvince)) {
                throw new \Exception('Error Canada Province');
            }
        }

        $order->delivery_date = Carbon::now()->addDays($deliveryDays);
        $totalAmount = $amount + $gstAmount + $pstAmount + $shippingRate;

        // Check if the "Same as Shipping Address" checkbox is checked
        $billingName = $req['billing-name'] ?? $req['shipping-name'];
        $billingEmail = $req['billing-email'] ?? $req['shipping-email'];
        $billingPhone = $req['billing-phone'] ?? $req['shipping-phone'];
        $billingAddress = $req['billing-address'] ?? $req['shipping-address'];
        $billingCity = $req['billing-city'] ?? $req['shipping-city'];
        $billingProvince = $req['billing-state'] ?? $shippingProvince ?? null;
        $billingCountry = $req['billing-country'] ?? $countryCode;
        $billingPostalCode = $req['billing-zip'] ?? $req['shipping-zip'];
        $fiveBxResp = $this->fiveBx(
            $totalAmount,
            $req['card-number'],
            $req['card-expiry'],
            $req['card-cvc'],
            $req['order-id'],
            $this->getCardType($req['card-number'])
        );

        if ($fiveBxResp->result_code === 'ok') {
            DB::beginTransaction();
            try {
                // Update order with pricing and address information
                $order->update([
                    'pre_tax_amount' => $amount,
                    'post_tax_amount' => $totalAmount,
                    'gst' => $gstAmount,
                    'pst' => $pstAmount,
                    'status' => 'Confirmed',
                    'shipping_rate' => $shippingRate,
                    'shipping_name' => $req['shipping-name'],
                    'shipping_email' => $req['shipping-email'],
                    'shipping_phone' => $req['shipping-phone'],
                    'shipping_address' => $req['shipping-address'],
                    'shipping_city' => $req['shipping-city'],
                    'shipping_province' => $shippingProvince ?? null,
                    'shipping_country' => $countryCode,
                    'shipping_postal_code' => $req['shipping-zip'],
                ]);
                // Create payment record
                Payment::create([
                    'order_id' => $req['order-id'],
                    'method' => 'Credit Card',
                    'amount' => $totalAmount,
                    'discount' => 0,
                    'status' => 'Completed',
                    'payer_name' => $req['card-name'],
                    'payer_card' => substr($req['card-number'], -4),
                    'billing_name' => $billingName,
                    'billing_email' => $billingEmail,
                    'billing_phone' => $billingPhone,
                    'billing_address' => $billingAddress,
                    'billing_city' => $billingCity,
                    'billing_province' => $billingProvince,
                    'billing_country' => $billingCountry,
                    'billing_postal_code' => $billingPostalCode,
                ]);
                // Create transaction record
                Transaction::create([
                    'order_id' => $req['order-id'],
                    'user_id' => auth()->id(),
                    'amount' => $totalAmount,
                    'transaction_type' => 'Payment',
                    'currency' => 'CAD',
                    'status' => 'Completed',
                    'response' => null,
                ]);
                DB::commit();

                return $order;
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }
    }

    /**
     * Process the payment through the _5bx payment gateway.
     *
     * @param float  $amount   The amount to be charged.
     * @param string $cardNum  The credit card number.
     * @param string $expDate  The card's expiration date in MMYY format.
     * @param int    $cvv      The card's CVV code.
     * @param string $refNum   The reference number for the transaction.
     * @param string $cardType The type of card (visa, mastercard, amex).
     *
     * @return mixed The response from the _5bx payment gateway.
     */
    private function fiveBx(
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

    /**
     * Determine the type of credit card based on the card number.
     *
     * @param string $cardNumber The credit card number.
     *
     * @return string The type of the credit card (visa, mastercard, amex).
     *
     * @throws \Exception If the card type is unsupported.
     */
    private function getCardType($cardNumber): string
    {
        $len = strlen($cardNumber);
        if (str_starts_with($cardNumber, '4') && ($len === 13 || $len === 16)) {
            return 'visa';
        }
        if (preg_match('/^5[1-5]/', $cardNumber) && $len === 16) {
            return 'mastercard';
        }
        if (preg_match('/^3[4,7]/', $cardNumber) && $len === 15) {
            return 'amex';
        }
        throw new \Exception('Unsupported credit card');
    }
}
