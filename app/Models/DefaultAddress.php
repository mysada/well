<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultAddress extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
      = [
        'user_id',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_province',
        'billing_country',
        'billing_postal_code',
        'billing_email',
        'billing_phone',
        'shipping_name',
        'shipping_address',
        'shipping_city',
        'shipping_province',
        'shipping_country',
        'shipping_postal_code',
        'shipping_email',
        'shipping_phone',
      ];

    /**
     * Get the user that owns the default address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
