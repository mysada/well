<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{

    /**
     * Accessor to get the value attribute based on its type.
     *
     * @param  mixed  $value
     *
     * @return mixed
     */
    public function getValueAttribute($value)
    {
        return match ($this->type) {
            'json' => json_decode($value, true),
            'integer' => (int)$value,
            'boolean' => (bool)$value,
            default => $value,
        };
    }

    /**
     * Mutator to set the value attribute based on its type.
     *
     * @param  mixed  $value
     *
     * @return void
     */
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
