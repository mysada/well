<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable
      = [
        'order_id',
        'method',
        'amount',
        'gst',
        'pst',
        'discount',
        'status',
        'payer_name',
        'payer_card',
        'billing_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_city',
        'billing_province',
        'billing_country',
        'billing_postal_code',
      ];

    // Define the relationship to the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
