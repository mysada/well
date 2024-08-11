<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;


class AdminReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $title='Review Management - List';
        $items = Review::with(['product', 'user'])
                       ->when($search, function ($query, $search) {
                           return $query->where('review_text', 'like', "%{$search}%")
                                        ->orWhereHas('product', function ($query) use ($search) {
                                            $query->where('name', 'like', "%{$search}%");
                                        })
                                        ->orWhereHas('user', function ($query) use ($search) {
                                            $query->where('name', 'like', "%{$search}%");
                                        });
                       })
                       ->orderByDesc('id')
                       ->paginate(20);
        return view('admin.pages.review.index', compact('items','title','search'));
    }

    public function edit($id)
    {
        $title='Review Management - Edit';
        $review = Review::findOrFail($id);
        return view('admin.pages.review.edit', compact('review','title'));
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
