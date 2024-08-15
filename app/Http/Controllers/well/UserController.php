<?php

namespace App\Http\Controllers\well;

use App\Http\Requests\SetDefaultAddressRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\DefaultAddress;

class UserController extends Controller
{
    /**
     * Display the user's profile, orders, reviews, and other related data.
     *
     * @return \Illuminate\Contracts\View\View
     */
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

        // Get default address
        $defaultAddress = DefaultAddress::where('user_id', Auth::id())->first();

        $title = 'Profile';

        $nameParts = explode(' ', $user->full_name, 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        return view('well.pages.profile', compact('user', 'orders', 'lastOrders', 'reviews', 'pendingReviews', 'defaultAddress', 'title', 'firstName', 'lastName'));
    }

    /**
     * Set the default shipping and billing address for the user.
     *
     * @param \App\Http\Requests\SetDefaultAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setDefaultAddress(SetDefaultAddressRequest $request)
    {
        $defaultAddress = DefaultAddress::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'shipping_name' => $request->shipping_name,
                'shipping_address' => $request->shipping_address,
                'shipping_city' => $request->shipping_city,
                'shipping_province' => $request->shipping_province,
                'shipping_country' => $request->shipping_country,
                'shipping_postal_code' => $request->shipping_postal_code,
                'shipping_email' => $request->shipping_email,
                'shipping_phone' => $request->shipping_phone,
                'billing_name' => $request->billing_name,
                'billing_address' => $request->billing_address,
                'billing_city' => $request->billing_city,
                'billing_province' => $request->billing_province,
                'billing_country' => $request->billing_country,
                'billing_postal_code' => $request->billing_postal_code,
                'billing_email' => $request->billing_email,
                'billing_phone' => $request->billing_phone,
            ]
        );

        return back()->with('success', 'Default address set successfully.');
    }

    /**
     * Update the user's profile information.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Reorder items from a previous order.
     *
     * @param int $orderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reorder($orderId)
    {
        // Find the order by ID and ensure it belongs to the authenticated user
        $order = Order::where('id', $orderId)
            ->where('user_id', Auth::id())
            ->with('orderDetails.product')
            ->first();

        if (!$order) {
            return back()->with('error', 'Order not found or you do not have permission to reorder this.');
        }

        // Loop through the order details and add each product to the cart
        foreach ($order->orderDetails as $detail) {
            // Check if the product already exists in the cart
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $detail->product_id)
                ->first();

            if ($cartItem) {
                // Update the quantity if the product is already in the cart
                $cartItem->quantity += $detail->quantity;
                $cartItem->save();
            } else {
                // Add the product to the cart
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $detail->product_id,
                    'quantity' => $detail->quantity,
                ]);
            }
        }

        return redirect()->route('CartIndex')->with('success', 'Items from the previous order have been added to your cart.');
    }
}
