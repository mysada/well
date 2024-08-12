<?php

namespace App\Http\Controllers\Admin;

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

        $items = Order::with('user')
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
          compact('items', 'title', 'search')
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(
          ['orderDetails.product', 'payments','transactions']
        )->findOrFail($id);

        $title = "Order Details #$order->id";

        return view('admin.pages.order.show', compact('order', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
