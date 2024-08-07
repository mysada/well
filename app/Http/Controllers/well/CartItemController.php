<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemReq;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1' // Corrected validation rule
        ]);

        // Create or update the cart item
        $cartItem = CartItem::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity]
        );

        return redirect()->route('CartIndex')->with('success', 'Product added to cart successfully.');
    }

    /**
     * Update the number of items in the cart
     */
    public function update(CartItemReq $request, string $id)
    {
        $cart = $request->validated();
        $cartItem = CartItem::find($id);
        if ($cartItem) {
            if ($cart['quantity'] == 0) {
                $cartItem->delete();
                return $this->success("Removed item successfully", $cartItem->id);
            } else {
                $cartItem->update($cart);
                return $this->success("Updated successfully", $cartItem->id);
            }
        }

        return $this->error('Update failed');
    }

    /**
     * Delete the cart item.
     */
    public function destroy(string $id)
    {
        $cartItem = CartItem::where("user_id", Auth::id())->where('id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            return $this->success("Removed item successfully");
        }

        return $this->error("Remove failed");
    }

    public function show($id)
    {
        // Fetch the product based on the provided ID
        $product = Product::findOrFail($id);

        // Fetch related products if necessary
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('well.cart.shopping_cart', compact('product', 'relatedProducts'));
    }

    /**
     * Success message
     */
    private function success($msg, $id = null): RedirectResponse
    {
        if ($id) {
            return redirect(url('/cart_items'))->with(['success' => $msg, 'id' => $id]);
        }
        return redirect(url('/cart_items'))->with('success', $msg);
    }

    private function error($msg): RedirectResponse
    {
        return redirect(url('/cart_items'))->with('error', $msg);
    }
}
