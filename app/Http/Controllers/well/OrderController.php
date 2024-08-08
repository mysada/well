<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function store()
    {
        try {
            $order = $this->orderService->createOrder();
        } catch (\Exception $e) {
            return RouterTools::errorBack('Create order Error');
        }

        return RouterTools::success(
          "Create order successfully",
          'checkout.show',
          $order->id
        );
    }

}
