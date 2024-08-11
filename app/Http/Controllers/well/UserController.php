<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())
            ->with('orderDetails.product')
            ->get();

        // Get last two confirmed orders and include billing information from the payments table
        $lastOrders = Order::where('user_id', Auth::id())
            ->where('status', 'CONFIRMED')
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->with(['payments' => function($query) {
                $query->where('status', 'Completed');
            }])
            ->get();

        // Get reviews written by the user
        $reviews = Review::where('user_id', Auth::id())->with('product')->get();

        // Get pending reviews
        $pendingReviews = Order::where('user_id', Auth::id())
            ->where('status', 'CONFIRMED')
            ->whereDoesntHave('orderDetails.product.reviews', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with('orderDetails.product')
            ->get();

        $title = 'Profile';

        $nameParts = explode(' ', $user->full_name, 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        return view('well.pages.profile', compact('user', 'orders', 'lastOrders', 'reviews', 'pendingReviews', 'title', 'firstName', 'lastName'));
    }

    public function setDefaultAddress($orderId)
    {
        $user = Auth::user();
        $user->last_order_id = $orderId;
        $user->save();

        return back()->with('success', 'Default address set successfully.');
    }

    public function updateAddress(Request $request, $orderId)
    {
        $request->validate([
            'shipping_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_address' => 'required|regex:/^[a-zA-Z0-9\s,.-]+$/|max:255',
            'shipping_city' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_province' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_country' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_postal_code' => 'required|regex:/^[a-zA-Z0-9\s-]+$/|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_phone' => 'required|regex:/^(\+?[0-9\s\-\(\)]*)$/|max:25|min:9',
        ]);

        $order = Order::findOrFail($orderId);
        $order->update($request->all());

        return back()->with('success', 'Address updated successfully.');
    }

    public function updateShippingAddress(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_address' => 'required|regex:/^[a-zA-Z0-9\s,.-]+$/|max:255',
            'shipping_city' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_province' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_country' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'shipping_postal_code' => 'required|regex:/^[a-zA-Z0-9\s-]+$/|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_phone' => 'required|regex:/^(\+?[0-9\s\-\(\)]*)$/|max:25|min:9',
        ]);

        $user = Auth::user();
        $user->update($request->only([
            'shipping_name', 'shipping_address', 'shipping_city', 'shipping_province', 'shipping_country', 'shipping_postal_code', 'shipping_email', 'shipping_phone'
        ]));

        if ($request->has('set_default_shipping')) {
            $user->last_order_id = null;
            $user->save();
        }

        return back()->with('success', 'Shipping address updated successfully.');
    }

    public function updateBillingAddress(Request $request)
    {
        $request->validate([
            'billing_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_address' => 'required|regex:/^[a-zA-Z0-9\s,.-]+$/|max:255',
            'billing_city' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_province' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_country' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'billing_postal_code' => 'required|regex:/^[a-zA-Z0-9\s-]+$/|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_phone' => 'required|regex:/^(\+?[0-9\s\-\(\)]*)$/|max:25|min:9',
        ]);

        $user = Auth::user();
        $user->update($request->only([
            'billing_name', 'billing_address', 'billing_city', 'billing_province', 'billing_country', 'billing_postal_code', 'billing_email', 'billing_phone'
        ]));

        if ($request->has('set_default_billing')) {
            $user->previous_order_id = null;
            $user->save();
        }

        return back()->with('success', 'Billing address updated successfully.');
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
        ]);

        try {
            $user = Auth::user();
            $user->full_name = $request->input('first_name') . ' ' . $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
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
