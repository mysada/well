<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventLog;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Dashboard';
        $logs  = $this->getLogs();

        $totalOrders = Order::count();
        $totalRevenue = Order::sum('pre_tax_amount');
        $averageRevenue = Order::average('pre_tax_amount');

        $totalOrdersDelivered = Order::where('status', 'Delivered')->count();
        $totalOrdersPending = Order::where('status', 'Pending')->count();

        $stats = [
          'totalOrders' => $totalOrders,
          'totalRevenue' => $totalRevenue,
          'averageRevenue' => $averageRevenue,
          'totalOrdersDelivered' => $totalOrdersDelivered,
          'totalOrdersPending' => $totalOrdersPending,
        ];
        return view('admin.pages.home', compact('title', 'logs', 'stats'));
    }

    private function getLogs()
    {
        return EventLog::orderBy('created_at', 'desc')->limit(7)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
