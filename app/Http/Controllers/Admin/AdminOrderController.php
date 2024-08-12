<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = ['Pending', 'Confirmed', 'Shipped', 'Delivered', 'Cancelled'];
        $items  = Order::with('user')
                       ->when($search, function ($query, $search) {
                           return $query->whereHas(
                             'user',
                             function ($query) use ($search) {
                                 $query->where('name', 'like', "%{$search}%");
                             }
                           );
                       })
                       ->orderByDesc('id')
                       ->paginate(20);

        $title = 'Order Management - List';

        return view(
          'admin.pages.order.index',
          compact('items', 'title', 'search', 'status')
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(
          ['orderDetails.product', 'payments', 'transactions']
        )->findOrFail($id);

        $title = "Order Details #$order->id";

        return view('admin.pages.order.show', compact('order', 'title'));
    }

    public function update(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $validatedData = $request->validate([
          'status' => 'required|string|in:Pending,Confirmed,Shipped,Delivered,Cancelled',
        ]);

        $order->status = $validatedData['status'];
        $order->save();
        return RouterTools::successBack('Order status updated successfully');
    }
}
