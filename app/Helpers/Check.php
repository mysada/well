<?php

namespace App\Helpers;

use InvalidArgumentException;

class Check
{

    public static function checkStatus(bool $condition, string $message = '')
    {
        if ( ! $condition) {
            throw new InvalidArgumentException($message);
        }
    }

    public static function checkNotNull($value, string $message = '')
    {
        if ($value === null) {
            throw new InvalidArgumentException($message);
        }
    }

}
