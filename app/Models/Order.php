<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'recipient_name', 'recipient_email', 'recipient_phone',
        'recipient_address', 'shipping_city', 'shipping_province',
        'shipping_country', 'shipping_postal_code', 'coupon_code', 'status'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
