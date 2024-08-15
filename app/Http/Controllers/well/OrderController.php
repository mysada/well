<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    protected OrderService $orderService;

    /**
     * OrderController constructor.
     *
     * @param \App\Services\OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Store a newly created order in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        try {
            $order = $this->orderService->createOrder();
        } catch (\Exception $e) {
            return RouterTools::errorBack($e->getMessage());
        }
        $orderId = $order->id;

        return RouterTools::success(
            "Create order successfully",
            'checkout.show', [$orderId]
        );
    }

    /**
     * Display the details of a specific order.
     *
     * @param int $orderId
     * @return \Illuminate\Contracts\View\View
     */
    public function details($orderId)
    {
        $order = Order::with('orderDetails.product')->findOrFail($orderId);

        return view('well.order.order_detail', compact('order'));
    }
}
