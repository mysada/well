<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Services\OrderService;

class OrderController extends Controller
{

    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

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

}
