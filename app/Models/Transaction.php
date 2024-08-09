<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'order_id',
      'user_id',
      'amount',
      'transaction_type',
      'currency',
      'status',
      'response',
    ];

    // Define the relationship to the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
