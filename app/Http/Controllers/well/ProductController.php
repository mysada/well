<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
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
        $query = Product::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(9);
        $categories = Category::all();
        $title = 'Products';

        return view('well.product.product_list', compact('products', 'categories', 'title', 'category_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with("category")->findOrFail($id);
        $title = $product->name;
        $wishlist = false;

        // Check if the product is in the wishlist when logged in
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
        }

        return view('well.product.product_details', compact('product', 'title', 'wishlist'));
    }
}
