<?php

namespace App\Http\Middleware;

use App\Models\EventLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{
    /**
     * Handle an incoming request.
     *
     * This middleware logs various details of the incoming request, such as the full URL,
     * the path, the method, the IP address, the user agent, and the user ID (if authenticated).
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
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
