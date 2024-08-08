<?php

namespace App\Services;

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

    public function processTransaction(
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
