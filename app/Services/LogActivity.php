<?php

namespace App\Services;

use App\Models\EventLog;
use Illuminate\Support\Facades\Auth;

class LogActivity
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function addToLog($event)
    {
        $log = new EventLog();
        $log->event = $event;
        $log->url = request()->fullUrl();
        $log->method = request()->method();
        $log->ip_address = request()->ip();
        $log->user_agent = request()->header('User-Agent');
        $log->user_id = Auth::check() ? Auth::id() : null;
        $log->save();
    }
}
