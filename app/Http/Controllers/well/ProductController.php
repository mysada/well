<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // Validate input
        $request->validate([
            'category_id' => 'nullable|integer|exists:categories,id',
            'search'      => 'nullable|string|max:255',
        ]);

        $category_id = $request->get('category_id');
        $search      = $request->get('search');
        $query       = Product::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($search) {
            // Escape special characters in the search term to prevent injection attacks
            $search = htmlspecialchars($search, ENT_QUOTES, 'UTF-8');
            $query->where('name', 'like', '%'.$search.'%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(9);
        $categories = Category::all();
        $title = 'Products';

        return view(
            'well.product.product_list',
            compact('products', 'categories', 'title', 'category_id', 'search')
        );
    }

    /**
     * Display the specified product.
     *
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        $title   = $product->name;

        // Fetch related products from the same category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        // Check if the product is in the wishlist when logged in
        $wishlist = false;
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
        }

        return view(
            'well.product.product_details',
            compact('product', 'title', 'relatedProducts', 'wishlist')
        );
    }

    /**
     * Display the reviews of the specified product.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function showReviews($id)
    {
        $product = Product::with(['reviews.user'])->findOrFail($id);

        // Fetch related products from the same category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        // Check if the product is in the wishlist when logged in
        $wishlist = false;
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
        }

        $hasPurchased = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.user_id', auth()->id())
            ->where('order_details.product_id', $id)
            ->where('orders.status', 'CONFIRMED')
            ->exists();

        return view(
            'well.product.product_reviews',
            compact('product', 'relatedProducts', 'hasPurchased', 'wishlist')
        );
    }
}
