<?php

namespace App\Http\Controllers\well;

use App\Http\Requests\WishlistReq;
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
    public function store(WishlistReq $req)
    {
        $wishlist = $req->validated();

        Wishlist::create([
          'user_id'    => Auth::id(),
          'product_id' => $wishlist['product_id'],
        ]);

        return redirect()->route('WishlistIndex')->with(
          'success',
          'Add to wishlist successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Wishlist::where('user_id', Auth::id())
                           ->where('id', $id)
                           ->first();
        if ($product) {
            $product->delete();

            return redirect()->route('WishlistIndex')->with(
              'success',
              "Deleted {$product->name} successfully."
            );
        }

        return redirect()->route('WishlistIndex')->with(
          'error',
          'Product not found.'
        );
    }

}
