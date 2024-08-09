<?php


namespace App\Http\Controllers\well;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        // Check if the user has purchased the product
        $orderDetails = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.user_id', auth()->id())
            ->where('order_details.product_id', $request->product_id)
            ->whereIn('orders.status', ['Pending', 'Shipped', 'Delivered'])
            ->exists();

        if (!$orderDetails) {
            return back()->with('error', 'You can only review products that you have purchased and are not cancelled.');
        }

        // Check if an image file is present
        $path = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;

        // Create the review in the database
        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'image' => $path, // Store the image path in the database
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }
}
