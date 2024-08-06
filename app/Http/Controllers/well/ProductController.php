<?php

namespace App\Http\Controllers\well;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $title    = 'Products';

        return view('well.product.product_list', compact('products', 'title'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product  = Product::with('category')->findOrFail($id);
        $title    = $product->name;

        // Fetch related products from the same category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        return view(
            'well.product.product_details',
            compact('product', 'title', 'relatedProducts')
        );
    }


}
