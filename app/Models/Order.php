<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'shipping_rate',
        'shipping_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_city',
        'shipping_province',
        'shipping_country',
        'shipping_postal_code',
        'coupon_code',
        'status',
        'delivery_date',
      ];

    protected $casts
      = [
        'delivery_date' => 'date',
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

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'shipping_country', 'code');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

}
