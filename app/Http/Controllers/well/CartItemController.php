<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemReq;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    /**
     * Add product to cart
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Find the existing cart item
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // If the item already exists, update the quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('CartIndex')->with('success', 'Product added to cart successfully.');
    }

    /**
     * Update the number of items in the cart
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::find($id);
        if ($cartItem) {
            if ($request->quantity == 0) {
                $cartItem->delete();
                $total = $this->calculateTotal();
                return response()->json(['message' => 'Removed item successfully', 'total' => number_format($total, 2)]);
            } else {
                $cartItem->update(['quantity' => $request->quantity]);
                $total = $this->calculateTotal();
                return response()->json(['message' => 'Updated successfully', 'total' => number_format($total, 2)]);
            }
        }

        return response()->json(['message' => 'Update failed'], 400);
    }



    /**
     * Delete the cart item.
     */
    public function destroy(string $id)
    {
        $cartItem = CartItem::where("user_id", Auth::id())->where('id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            $total = $this->calculateTotal();

            // Redirect to the cart_items page with a success flash message
            return redirect()->route('CartIndex')->with('success', 'Removed item successfully.');
        }

        // Redirect to the cart_items page with an error flash message if deletion fails
        return redirect()->route('CartIndex')->with('error', 'Remove failed.');
    }

    /**
     * Show a specific product and related products
     */
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

        return view('well.cart.product_show', compact('product', 'relatedProducts'));
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

    /**
     * Error message
     */
    private function error($msg): RedirectResponse
    {
        return redirect(url('/cart_items'))->with('error', $msg);
    }

    private function calculateTotal()
    {
        return CartItem::where('user_id', Auth::id())->with('product')->get()->sum(function ($cartItem) {
            return $cartItem->product ? $cartItem->product->price * $cartItem->quantity : 0;
        });
    }
}
