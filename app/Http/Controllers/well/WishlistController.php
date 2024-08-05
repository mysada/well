<?php

namespace App\Http\Controllers\well;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::where("user_id", Auth::user()->id)->get();
        $title    = 'My Wishlist';

        return view('well.pages.wishlist', compact('wishlist', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $product_id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Wishlist::find($id);

        if ($product) {
            $product->delete();

            return redirect()->route('WishlistIndex')->with(
              'success',
              "Deleted {$product->name} successfully."
            );
        } else {
            return redirect()->route('WishlistIndex')->with(
              'error',
              'Item not found.'
            );
        }
    }

}
