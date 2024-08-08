<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->with('orderDetails.product')->get();
        $title = 'Profile';

        $nameParts = explode(' ', $user->full_name, 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        return view('well.pages.profile', compact('user', 'orders', 'title', 'firstName', 'lastName'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'required|regex:/^(\+?[0-9\s\-\(\)]*)$/|max:25|min:9',
            'billing_address' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
        ]);

        try {
            $user = Auth::user();
            $user->full_name = $request->input('first_name') . ' ' . $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->billing_address = $request->input('billing_address');
            $user->shipping_address = $request->input('shipping_address');
            $user->save();

            return back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while updating your profile.');
        }
    }

    public function reorder($orderId)
    {
        $order = Order::with('orderDetails')->findOrFail($orderId);
        $userId = Auth::id();

        // Iterate through order details and add products to the cart
        foreach ($order->orderDetails as $detail) {
            $cartItem = CartItem::where('user_id', $userId)
                ->where('product_id', $detail->product_id)
                ->first();

            if ($cartItem) {
                // If the item already exists in the cart, update the quantity
                $cartItem->quantity += $detail->quantity;
                $cartItem->save();
            } else {
                // Otherwise, create a new cart item
                CartItem::create([
                    'user_id' => $userId,
                    'product_id' => $detail->product_id,
                    'quantity' => $detail->quantity
                ]);
            }
        }

        // Redirect to the cart page with a success message
        return redirect()->route('CartIndex')->with('success', 'Products added to cart successfully.');
    }
}
