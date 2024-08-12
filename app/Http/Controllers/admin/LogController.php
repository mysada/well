<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display the login/logout logs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $logs = $this->getLogs();
        return view('admin.logs.index', ['logs' => $logs]); // Assuming you want to put the view in the admin folder
    }

    /**
     * Fetch the logs from the Laravel log file.
     *
     * @return array
     */
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
