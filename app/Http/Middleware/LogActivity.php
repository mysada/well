<?php

namespace App\Http\Middleware;

use App\Models\EventLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{

    public function handle(Request $request, Closure $next): Response
    {
        EventLog::create([
            'event' => $request->fullUrl(),
            'url' => $request->path(),
            'method' => $request->method(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'user_id' => \Auth::check() ? \Auth::id() : null, // Log the user ID if authenticated
            ]);

        return $next($request);
    }
}
