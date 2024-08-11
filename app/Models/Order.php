<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * MANISH KUMAR
 * Class Order
 *
 * @package App\Models
 *
 * Represents an order placed by a user in the system.
 */
class Order extends Model
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
            'pre_tax_amount',
            'post_tax_amount',
            'gst',
            'pst',
            'quantity',
            'shipping_name',
            'shipping_email',
            'shipping_phone',
            'shipping_address',
            'shipping_city',
            'shipping_province',
            'shipping_country',
            'shipping_postal_code',
            'billing_name',
            'billing_email',
            'billing_phone',
            'billing_address',
            'billing_city',
            'billing_province',
            'billing_country',
            'billing_postal_code',
            'coupon_code',
            'status',
        ];

    /**
     * Get the order details associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * This method defines a one-to-many relationship between the Order and
     *   OrderDetail models. It retrieves all the order details associated with
     *   a particular order.
     */
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Get the payments associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * This method defines a one-to-many relationship between the Order and
     *   Payment models. It retrieves all the payments associated with a
     *   particular order.
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'shipping_country', 'code');
    }
}
