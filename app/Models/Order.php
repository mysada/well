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
        'price',
        'quantity',
        'recipient_name',
        'recipient_email',
        'recipient_phone',
        'recipient_address',
        'shipping_city',
        'shipping_province',
        'shipping_country',
        'shipping_postal_code',
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

}
