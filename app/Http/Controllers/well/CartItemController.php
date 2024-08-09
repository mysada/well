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
     * Fetch cart items for the logged-in user (Creatd by Manish to Fetch Cart Summary in Checkput)
     */
    public function fetchCartItems()
    {
        return CartItem::with('product')->where('user_id', Auth::id())->get();
    }


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
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check if the product has enough stock
        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update the quantity and subtotal
            $cartItem->quantity += $request->quantity;
            $cartItem->subtotal = $product->price * $cartItem->quantity;
            $cartItem->save();
        } else {
            // Create a new cart item
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'subtotal' => $product->price * $request->quantity,
                'total' => $product->price * $request->quantity,
                'items' => $request->quantity  // Setting initial items count
            ]);
        }

        // Decrease the stock of the product
        $product->stock -= $request->quantity;
        $product->save();

        // Update the total and items for the entire cart
        $this->updateCartTotals(Auth::id());

        return redirect()->route('CartIndex')->with('success', 'Product added to cart successfully.');
    }





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


    public function updateQuantity(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $validated['product_id'])
            ->first();

        if ($cartItem) {
            // Check if there is enough stock to update the quantity
            $quantityDifference = $validated['quantity'] - $cartItem->quantity;
            if ($product->stock < $quantityDifference) {
                return response()->json(['message' => 'Not enough stock available'], 400);
            }

            // Update the quantity and subtotal
            $cartItem->quantity = $validated['quantity'];
            $cartItem->subtotal = $product->price * $validated['quantity'];
            $cartItem->save();

            // Update the stock
            $product->stock -= $quantityDifference;
            $product->save();
        }

        // Update the total and items for the entire cart
        $this->updateCartTotals(Auth::id());

        return response()->json([
            'message' => 'Updated successfully',
            'newStock' => $product->stock
        ]);
    }

    /**
     * Delete the cart item.
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


}
