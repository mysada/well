<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;

class AdminReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        $product_id = $request->input('product_id');
        $rating = $request->input('rating');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $title = 'Review Management - List';
        $items = Review::with(['product.category', 'user'])
            ->when($search, function ($query, $search) {
                return $query->where('review_text', 'like', "%{$search}%")
                    ->orWhereHas('product', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            })
            ->when($category_id, function ($query, $category_id) {
                return $query->whereHas('product.category', function ($query) use ($category_id) {
                    $query->where('id', $category_id);
                });
            })
            ->when($product_id, function ($query, $product_id) {
                return $query->where('product_id', $product_id);
            })
            ->when($rating, function ($query, $rating) {
                return $query->where('rating', $rating);
            })
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                return $query->whereBetween('created_at', [$start_date, $end_date]);
            })
            ->orderByDesc('id')
            ->paginate(20);

        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();
        $categories = Category::all();
        $products = Product::when($category_id, function ($query, $category_id) {
            return $query->where('category_id', $category_id);
        })->get();

        return view('admin.pages.review.index', compact('items', 'title', 'search', 'category_id', 'product_id', 'rating', 'start_date', 'end_date', 'averageRating', 'totalReviews', 'categories', 'products'));
    }

    public function flag($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['flagged' => true]);

        return redirect()->route('AdminReviewList')->with('success', 'Review flagged successfully.');
    }

    public function export()
    {
        $reviews = Review::with(['product.category', 'user'])->get();

        // export reviews as CSV
        $csvFileName = 'reviews_export.csv';
        $handle = fopen($csvFileName, 'w+');
        fputcsv($handle, ['ID', 'Category', 'Product', 'User', 'Rating', 'Review Text', 'Image', 'Flagged', 'Created At']);

        foreach ($reviews as $review) {
            fputcsv($handle, [
                $review->id,
                $review->product->category->name,
                $review->product->name,
                $review->user->name,
                $review->rating,
                $review->review_text,
                $review->image,
                $review->flagged ? 'Yes' : 'No',
                $review->created_at,
            ]);
        }

        fclose($handle);

        return response()->download($csvFileName);
    }
}
