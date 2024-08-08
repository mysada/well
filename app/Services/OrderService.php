<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{

    /**
     * @throws \Exception
     */
    public function createOrder()
    {
        DB::beginTransaction();
        $userId        = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->get();

        try {
            if (empty($cartItems)) {
                throw new Exception('No items found in cart.');
            }
            // Create a new order
            $order = Order::create([
              'user_id' => $userId,
              'quantity' => $cartItems->sum('quantity'),
              'pre_tax_amount' => $this->calculateTotalPrice($cartItems),
              'status' => 'Pending',
            ]);

            // Create order details
            foreach ($cartItems as $item) {
                OrderDetail::create([
                  'order_id' => $order->id,
                  'product_id' => $item->product_id,
                  'price' => $item->product->price, // Assuming `price` is an attribute on the `Product` model
                  'quantity' => $item->quantity,
                  'total_price' => $item->quantity * $item->product->price,
                ]);
            }

            // Clear the cart
            CartItem::where('user_id', $userId)->delete();

            // Commit the transaction
            DB::commit();

            return $order;

        } catch (Exception $e) {
            // Rollback the transaction
            DB::rollback();
            throw $e;
        }
    }

    protected function calculateTotalPrice($cartItems)
    {
        return $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }
}
