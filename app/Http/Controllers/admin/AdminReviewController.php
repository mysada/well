<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product', 'user')->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000'
        ]);

        $review = Review::findOrFail($id);
        $review->update([
            'rating' => $request->rating,
            'content' => $request->content
        ]);

        return redirect()->route('AdminReviewList')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('AdminReviewList')->with('success', 'Review deleted successfully.');
    }
}
