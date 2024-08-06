<?php
//
//namespace App\Http\Controllers\well;
//
//use App\Models\Order;
//
//class UserController
//{
//
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        $orders = Order::all();
//        $title  = 'Profile';
//
//        return view('well.pages.profile', compact('orders', 'title'));
//    }
//
//}



// Code by AMAN DAWAR For PROFILE page below

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    {
        // Fetch orders for the currently authenticated user
        $orders = Order::where('user_id', Auth::id())->get();
        $title = 'Profile';

        return view('well.pages.profile', compact('orders', 'title'));
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
}

//CODE FOR PROFILE PAGE ENDS
