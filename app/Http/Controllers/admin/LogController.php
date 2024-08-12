<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index()
    {
        // Fetch the logs
        $logs = $this->getLogs();

        dd($logs);

        // Pass the logs to the view
        return view('admin.pages.home', compact('logs'));
    }

    protected function getLogs()
    {
        $logFile = storage_path('logs/laravel.log');
        $logs = [];

        if (file_exists($logFile)) {
            $logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $logs = array_filter($logs, function ($log) {
                return strpos($log, 'User logged in') !== false ||
                    strpos($log, 'User logged out') !== false ||
                    strpos($log, 'Admin logged in') !== false ||
                    strpos($log, 'Admin logged out') !== false;
            });
        }

        return $logs;
    }
}
