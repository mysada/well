<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * MANISH KUMAR
 * Class OrderDetail
 * @package App\Models
 *
 * Represents the details of a specific product within an order.
 */
class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity', 'total_price'
    ];

    /**
     * Get the product associated with the order detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * This method defines a many-to-one relationship between the OrderDetail and Product models.
     * It retrieves the product associated with a particular order detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the order associated with the order detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * This method defines a many-to-one relationship between the OrderDetail and Order models.
     * It retrieves the order associated with a particular order detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
