<?php

namespace App\Http\Controllers\well;

use App\Helpers\RouterTools;
use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistReq;
use App\Models\CartItem;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{

    /**
     * Display a listing of the wishlist items.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $wishlists = Wishlist::where("user_id", Auth::user()->id)
                             ->with('product')
                             ->get();
        $title     = 'Wishlist';

        return view('well.pages.wishlist', compact('wishlists', 'title'));
    }

    /**
     * Store a product into the wishlist or remove it if it already exists.
     *
     * @param  \App\Http\Requests\WishlistReq  $req
     *
     * @return \Illuminate\Http\RedirectResponse
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

            return RouterTools::successBack(
              'Removed from wishlist successfully'
            );
        } else {
            Wishlist::create([
              'user_id'    => $userId,
              'product_id' => $productId,
            ]);

            return RouterTools::successBack('Added to wishlist successfully');
        }
    }

    /**
     * Add a product from the wishlist to the cart.
     *
     * @param  \App\Http\Requests\WishlistReq  $req
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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
                               ->where('product_id', $productId)
                               ->first();

            if ($product) {
                $product->delete();
            }
        });

        return RouterTools::success(
          'Added to cart successfully',
          'WishlistIndex'
        );
    }

    /**
     * Remove the specified wishlist item from storage.
     *
     * @param  string  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $product = Wishlist::where('user_id', Auth::id())
                           ->where('id', $id)
                           ->first();
        if ($product) {
            $product->delete();

            return RouterTools::success(
              "Deleted {$product->name} successfully.",
              'WishlistIndex'
            );
        }

        return RouterTools::error(
          "Failed to delete {$product->name}.",
          'WishlistIndex'
        );
    }

}
