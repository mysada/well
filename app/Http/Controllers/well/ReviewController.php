<?php

namespace App\Http\Controllers\well;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class ReviewController extends Controller
{
    public function show($id)
    {
        $product = Product::with('reviews')->findOrFail($id);

        // Check if the user has purchased the product with status 'CONFIRMED'
        $hasPurchased = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.user_id', auth()->id())
            ->where('order_details.product_id', $id)
            ->where('orders.status', 'CONFIRMED')
            ->exists();

        // Check if the product is in the user's wishlist
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->exists();

        $reviews = $product->reviews()->where('status', '!=', 'flagged')->get();
        return view('well.product.product_reviews', compact('product', 'hasPurchased', 'wishlist', 'reviews'));
    }

    public function store(Request $request)
    {
        // Validate the review form data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ensure the user has purchased the product and the order status is 'CONFIRMED'
        $orderDetails = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.user_id', auth()->id())
            ->where('order_details.product_id', $request->product_id)
            ->where('orders.status', 'CONFIRMED')
            ->exists();

        if (!$orderDetails) {
            return back()->with('error', 'You can only review products that you have purchased and have an order status of CONFIRMED.');
        }

        // Handle the image upload
        $path = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;

        // Create the review in the database
        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'image' => $path,
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }
}
