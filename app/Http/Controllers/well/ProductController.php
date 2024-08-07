<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category_id = $request->get('category_id');
        $search      = $request->get('search');
        $query       = Product::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($search) {
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
     * Display the specified resource.
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

        //check if the product in the wishlist when login
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

}
