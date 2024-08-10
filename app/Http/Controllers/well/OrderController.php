<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(Request $request)
    {
        try {
            // Gather shipping and billing details from the request
            $shippingDetails = $request->only([
                'shipping_name', 'shipping_email', 'shipping_phone', 'shipping_address',
                'shipping_city', 'shipping_province', 'shipping_country', 'shipping_postal_code'
            ]);

            $billingDetails = $request->only([
                'billing_name', 'billing_email', 'billing_phone', 'billing_address',
                'billing_city', 'billing_province', 'billing_country', 'billing_postal_code'
            ]);


            $order = $this->orderService->createOrder($shippingDetails, $billingDetails);
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
