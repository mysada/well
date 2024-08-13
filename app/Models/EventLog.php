<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event',
        'url',
        'method',
        'ip_address',
        'user_agent',
        'user_id',
    ];

    /**
     * Get the user that owns the event log.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
