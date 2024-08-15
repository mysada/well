<?php

namespace App\Http\Controllers\well;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in storage.
     *
     * @param \App\Http\Requests\ReviewRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReviewRequest $request)
    {
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
