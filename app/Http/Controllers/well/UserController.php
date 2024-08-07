<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->with('orderDetails.product')->get();
        $title = 'Profile';

        // Split the full name into first and last names
        $nameParts = explode(' ', $user->full_name, 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        return view('well.pages.profile', compact('user', 'orders', 'title', 'firstName', 'lastName'));
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home'); // Redirect to home page after logout
    }

    /**
     * Update user profile.
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]+$/|max:15',
            'billing_address' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->full_name = $request->input('first_name') . ' ' . $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->billing_address = $request->input('billing_address');
        $user->shipping_address = $request->input('shipping_address');
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

}
