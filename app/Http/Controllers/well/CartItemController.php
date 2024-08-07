<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemReq;
use App\Models\CartItem;
use Auth;
use Illuminate\Http\RedirectResponse;

class CartItemController extends Controller
{
    /**
     * Display the cart of the user
     */
    public function index()
    {
        // Assuming CartItem has a relationship with Product model
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();
        $title = 'Shopping Cart';

        return view('well.cart.shopping_cart', compact('cartItems', 'title'));
    }

    /**
     * Add product to cart
     */
    public function store(CartItemReq $request)
    {
        $cart = $request->validated();
        CartItem::create([
            'user_id'    => Auth::id(),
            'product_id' => $cart['product_id'],
            'quantity'   => $cart['quantity'],
        ]);

        return $this->success('Add to cart successfully.');
    }

    /**
     * Update the number of items in the cart
     */
    public function update(CartItemReq $request, string $id)
    {
        $cart = $request->validated();
        $cartItem = CartItem::find($id);
        if ($cartItem) {
            $cartItem->update($cart);

            return $this->success("Update successfully", $cartItem->id);
        }

        return $this->error('Update failed');
    }
    /**
     * Delete the cart item
     */
    public function destroy(string $id)
    {
        $product = CartItem::where("user_id", Auth::id())
            ->where('id', $id)
            ->first();
        if ($product) {
            $product->delete();

            return $this->success("Remove $product->name successfully");
        }

        return $this->error("Remove failed");
    }

    /**
     * Success message
     */
    private function success($msg): RedirectResponse
    {
        return redirect()->route('CartItemIndex')->with('success', $msg);
    }

    /**
     * Error message
     */
    private function error($msg): RedirectResponse
    {
        return redirect()->route('CartItemIndex')->with('error', $msg);
    }
}
