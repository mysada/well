<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistReq;
use App\Models\CartItem;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::where("user_id", Auth::user()->id)->with(
          'product'
        )->get();
        $title     = 'Wishlist';

        return view('well.pages.wishlist', compact('wishlists', 'title'));
    }

    /**
     * Store a product into wishlist
     */
    public function store(WishlistReq $req)
    {
        $wishlist  = $req->validated();
        $userId    = Auth::id();
        $productId = $wishlist['product_id'];

        $existingWishlist = Wishlist::where('user_id', $userId)
                                    ->where('product_id', $productId)
                                    ->first();

        if ($existingWishlist) {
            $existingWishlist->delete();

            return back()->with(
              'success',
              'Removed from wishlist successfully'
            );
        } else {
            Wishlist::create([
              'user_id'    => $userId,
              'product_id' => $productId,
            ]);

            return back()->with('success', 'Add to wishlist successfully');
        }
    }

    public function addToCart(WishlistReq $req)
    {
        $validated = $req->validated();

        DB::transaction(function () use ($validated) {
            $userId    = Auth::id();
            $productId = $validated['product_id'];

            $cartItem = CartItem::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();

            if ($cartItem) {
                $cartItem->increment('quantity');
            } else {
                CartItem::create([
                  'user_id'    => $userId,
                  'product_id' => $productId,
                  'quantity'   => 1,
                ]);
            }

            $product = Wishlist::where('user_id', $userId)
                               ->where('id', $productId)
                               ->first();

            if ($product) {
                $product->delete();
            }
        });

        return $this->successPage(
          'Add to cart successfully',
          'WishlistIndex'
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

            return $this->successPage(
              "Deleted {$product->name} successfully.",
              'WishlistIndex'
            );
        }

        return $this->errorPage(
          "Deleted {$product->name} successfully.",
          'Product not found'
        );
    }

}
