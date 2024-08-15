<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemReq;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class CartItemController extends Controller
{
    /**
     * Fetch cart items for the logged-in user (Created by Manish to Fetch Cart Summary in Checkout).
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchCartItems()
    {
        return CartItem::with('product')->where('user_id', Auth::id())->get();
    }

    /**
     * Display the cart of the user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Assuming CartItem has a relationship with Product model
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();
        $title = 'Shopping Cart';

        return view('well.cart.shopping_cart', compact('cartItems', 'title'));
    }

    /**
     * Store a newly created cart item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update the existing cart item
            $cartItem->quantity = $request->quantity; // Update with the submitted quantity
            $cartItem->subtotal = $product->price * $cartItem->quantity;
            $cartItem->total = $cartItem->subtotal; // Assuming total is the same as subtotal
            $cartItem->items = $cartItem->quantity; // Set items equal to quantity
            $cartItem->save();
        } else {
            // Create a new cart item
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity, // Use the submitted quantity
                'items' => $request->quantity, // Set initial items count to the submitted quantity
                'subtotal' => $product->price * $request->quantity,
                'total' => $product->price * $request->quantity,
            ]);
        }

        return redirect()->route('CartIndex')->with('success', 'Product added to cart successfully.');
    }

    /**
     * Update the totals for the cart.
     *
     * @param  int  $userId
     * @return void
     */
    private function updateCartTotals($userId)
    {
        $cartItems = CartItem::where('user_id', $userId)->get();
        $total = $cartItems->sum('subtotal');
        $itemCount = $cartItems->sum('quantity');
        $cartItems->each(function($item) use ($total, $itemCount) {
            $item->total = $total;
            $item->items = $itemCount;
            $item->save();
        });
    }

    /**
     * Update the number of items in the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
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
            } else {
                $cartItem->quantity = $request->quantity;
                $cartItem->subtotal = $cartItem->product->price * $request->quantity;
                $cartItem->save();
            }

            // Update the total and items for the entire cart
            $this->updateCartTotals(Auth::id());

            $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
            $total = $cartItems->sum('subtotal');
            $itemCount = $cartItems->sum('quantity');
            $totalFormatted = number_format($total, 2);

            return response()->json([
                'message' => $request->quantity == 0 ? 'Removed item successfully' : 'Updated successfully',
                'itemCount' => $itemCount,
                'subtotal' => number_format($total, 2),
                'total' => $totalFormatted
            ]);
        }

        return response()->json(['message' => 'Update failed'], 400);
    }

    /**
     * Delete the cart item.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $cartItem = CartItem::where("user_id", Auth::id())->where('id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();

            // Redirect to the cart_items page with a success flash message
            return redirect()->route('CartIndex')->with('success', 'Removed item successfully.');
        }

        // Redirect to the cart_items page with an error flash message if deletion fails
        return redirect()->route('CartIndex')->with('error', 'Remove failed.');
    }

    /**
     * Show a specific product and related products.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
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
     * Success message.
     *
     * @param  string  $msg
     * @param  int|null  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    private function success($msg, $id = null): RedirectResponse
    {
        if ($id) {
            return redirect(url('/cart_items'))->with(['success' => $msg, 'id' => $id]);
        }
        return redirect(url('/cart_items'))->with('success', $msg);
    }

    /**
     * Error message.
     *
     * @param  string  $msg
     * @return \Illuminate\Http\RedirectResponse
     */
    private function error($msg): RedirectResponse
    {
        return redirect(url('/cart_items'))->with('error', $msg);
    }
}
