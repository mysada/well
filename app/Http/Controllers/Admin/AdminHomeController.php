<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EventLog;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $logs  = $this->getLogs();

        $totalOrders    = Order::count();
        $totalRevenue   = Order::sum('pre_tax_amount');
        $averageRevenue = number_format(Order::average('pre_tax_amount'), 2);

        $totalOrdersDelivered = Order::where('status', 'Delivered')->count();
        $totalOrdersPending   = Order::where('status', 'Pending')->count();
        $totalUser            = User::count();
        $latestUser           = User::orderByDesc('id')->first();

        $totalProduct = Product::count();
        $totalCat     = Category::count();

        $topSeller = OrderDetail::join('orders as o', 'o.id', '=', 'order_details.order_id')
            ->join('products as p', 'p.id', '=', 'order_details.product_id')
            ->select('p.name', DB::raw('SUM(order_details.quantity) as quantity'))
            ->whereIn('o.status', ['Confirmed', 'Delivered'])
            ->groupBy('p.name')
            ->orderByDesc('quantity')
            ->limit(4)
            ->get();

        $stats = [
            'totalOrders'          => $totalOrders,
            'totalRevenue'         => $totalRevenue,
            'averageRevenue'       => $averageRevenue,
            'totalOrdersDelivered' => $totalOrdersDelivered,
            'totalOrdersPending'   => $totalOrdersPending,
            'totalUser'            => $totalUser,
            'latestUser'           => $latestUser->name,
            'totalProduct'         => $totalProduct,
            'totalCat'             => $totalCat,
            'topSeller'            => $topSeller,
        ];

        return view('admin.pages.home', compact('title', 'logs', 'stats'));
    }

    /**
     * Get the latest event logs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getLogs()
    {
        return EventLog::orderBy('created_at', 'desc')->limit(7)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return void
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return void
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return void
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return void
     */
    public function destroy(string $id)
    {
        //
    }
}
