<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\FlaggedReview;
use App\Models\Product;
use App\Models\Category;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        $product_id = $request->input('product_id');
        $rating = $request->input('rating');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $title = 'Review Management - List';

        // Determine whether to query from reviews or flagged_reviews table
        if ($status == 'flagged') {
            $items = FlaggedReview::with(['product.category', 'user']);
        } else {
            $items = Review::with(['product.category', 'user']);
        }

        $items = $items->when($search, function ($query, $search) {
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
            ->when($status && $status != 'flagged', function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $start_date)->startOfDay();
                $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $end_date)->endOfDay();
                return $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->orderByDesc('id')
            ->paginate(20);

        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();
        $categories = Category::all();
        $products = Product::when($category_id, function ($query, $category_id) {
            return $query->where('category_id', $category_id);
        })->get();

        return view('admin.pages.review.index', compact(
            'items',
            'title',
            'search',
            'category_id',
            'product_id',
            'rating',
            'status',
            'start_date',
            'end_date',
            'averageRating',
            'totalReviews',
            'categories',
            'products'
        ));
    }

    /**
     * Update the status of the specified review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        if ($request->status == 'flagged') {
            $review = Review::findOrFail($id);

            // Move the review to the flagged_reviews table with status set to "flagged"
            FlaggedReview::create([
                'product_id' => $review->product_id,
                'user_id' => $review->user_id,
                'rating' => $review->rating,
                'review_text' => $review->review_text,
                'image' => $review->image,
                'created_at' => $review->created_at,
                'updated_at' => $review->updated_at,
                'status' => 'flagged',  // Ensure the status is set to flagged
            ]);

            // Delete the review from the reviews table (soft delete)
            $review->delete();

            return redirect()->route('AdminReviewList')->with('success', 'Review flagged and moved to flagged reviews.');
        } elseif ($request->status == 'active') {
            $flaggedReview = FlaggedReview::findOrFail($id);

            // Restore the review back to the reviews table
            Review::create([
                'product_id' => $flaggedReview->product_id,
                'user_id' => $flaggedReview->user_id,
                'rating' => $flaggedReview->rating,
                'review_text' => $flaggedReview->review_text,
                'image' => $flaggedReview->image,
                'created_at' => $flaggedReview->created_at,
                'updated_at' => $flaggedReview->updated_at,
                'status' => 'active',  // Set the status to active
            ]);

            // Delete the review from the flagged_reviews table
            $flaggedReview->delete();

            return redirect()->route('AdminReviewList')->with('success', 'Review restored to active status.');
        } else {
            // For other status changes
            $review = Review::findOrFail($id);
            $review->update(['status' => $request->status]);

            return redirect()->route('AdminReviewList')->with('success', 'Review status updated successfully.');
        }
    }
}
