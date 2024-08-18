<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class OrderService for creating orders
 *
 * @package App\Services
 */
class OrderService
{

    /**
     * Create a new order from the cart items
     *
     * @return \App\Models\Order
     * @throws \Exception
     */
    public function createOrder(): Order
    {
        $userId    = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->get();

        DB::beginTransaction();
        try {
            if (empty($cartItems)) {
                throw new Exception('No products found in cart.');
            }
            // Create a new order
            $order = Order::create([
              'user_id'        => $userId,
              'quantity'       => $cartItems->sum('quantity'),
              'pre_tax_amount' => $this->calculateTotalPrice($cartItems),
              'status'         => 'Pending',
            ]);

            // Create order details
            foreach ($cartItems as $item) {
                $this->createDetails($item, $order);
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

    private function calculateTotalPrice($cartItems)
    {
        return $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }

    /**
     * Create order details
     *
     * @param  mixed  $item
     * @param  \App\Models\Order  $order
     *
     * @return void
     * @throws \Exception
     */
    private function createDetails(mixed $item, Order $order): void
    {
        $productId = $item->product_id;
        $mProduct  = Product::find($productId);
        $quantity  = $item->quantity;
        $stock     = $mProduct->stock;

        if ($quantity > $stock) {
            throw new Exception(
              "You have added {$quantity} items of {$mProduct->name} to your cart, but only {$stock} items are available in stock."
            );
        }

        $mProduct->stock = $stock - $quantity;
        $mProduct->save();

        OrderDetail::create([
          'order_id'    => $order->id,
          'product_id'  => $productId,
          'price'       => $mProduct->price,
          'quantity'    => $quantity,
          'total_price' => $quantity * $mProduct->price,
        ]);
    }

}
