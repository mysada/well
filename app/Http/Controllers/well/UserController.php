<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    /**
     * MANISH KUMAR
     * Display the user's profile along with their orders.
     *
     * @return \Illuminate\Contracts\View\View
     *
     * This method retrieves the authenticated user's profile information and their associated orders.
     * The full name of the user is split into first and last names for display purposes.
     */
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
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * This method logs out the authenticated user, invalidates the session, regenerates the session token,
     * and redirects the user to the home page.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home'); // Redirect to home page after logout
    }

    /**
     *  MANISH KUMAR
     * Update user profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * This method validates the incoming request data for updating the user's profile, including:
     * - first_name: required, alphabetic characters and spaces only, max length of 255
     * - last_name: required, alphabetic characters and spaces only, max length of 255
     * - email: required, valid email format, max length of 255
     * - phone: required, numeric characters only, max length of 15
     * - billing_address: required, string, max length of 255
     * - shipping_address: required, string, max length of 255
     *
     * The user's profile is then updated with the validated data and saved. Upon successful update,
     * the user is redirected back with a success message.
     */
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
        // Get the authenticated user
        $user = Auth::user();
        
        // Update the user attributes
        $user->full_name = $request->input('first_name') . ' ' . $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->billing_address = $request->input('billing_address');
        $user->shipping_address = $request->input('shipping_address');
        $user->save();
        
        // Redirect back with a success message
        return back()->with('success', 'Profile updated successfully.');
    } catch (\Exception $e) {
        // Handle exceptions, e.g., logging
        return back()->with('error', 'An error occurred while updating your profile.');
    }
    }
}
