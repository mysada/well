<?php


namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|max:1000',
        ]);

        //$test = Review::create([
            Review::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        //dd($test);
        return redirect()->route('product.reviews', ['id' => $id])->with('success', 'Review submitted successfully.');
    }
}
