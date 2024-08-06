<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends Model
{

    use SoftDeletes;

    public function getValueAttribute($value)
    {
        return match ($this->type) {
            'json' => json_decode($value, true),
            'integer' => (int)$value,
            'boolean' => (bool)$value,
            default => $value,
        };
    }

    public function setValueAttribute($value): void
    {
        $this->attributes['value'] = match ($this->type) {
            'json' => json_encode($value),
            'integer' => (int)$value,
            'boolean' => (bool)$value,
            default => $value,
        };
    }

}
