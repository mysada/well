<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        // Fetch the logs from the log file
        $logs = $this->getLogs();

        // Return the view with the logs data
        return view('admin.home', ['logs' => $logs]);
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
