<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable
      = [
        'name',
        'email',
        'password',
        'full_name',
        'address',
        'phone',
        'billing_address',
        'shipping_address',
        'is_admin',
      ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden
      = [
        'password',
        'remember_token',
      ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts
      = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
      ];

    /**
     * Get the reviews for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the payments associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function payments()
    {
        return $this->hasManyThrough(
          Payment::class,
          Order::class,
          'user_id',
          'order_id',
          'id',
          'id'
        );
    }

    /**
     * Get the default address associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function defaultAddress()
    {
        return $this->hasOne(DefaultAddress::class);
    }

    /**
     * Get the orders associated with the user.
     * Defined by AMAN to get shipping address on admin side for user
     * management.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if the user is an admin.
     * Defined by AMAN.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin === 1; // Check if the is_admin field is set to 1
    }

}
