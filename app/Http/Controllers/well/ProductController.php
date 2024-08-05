<?php

namespace App\Http\Controllers\well;

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
        $product  = Product::with("category")->find($id);
        $title    = $product->name;
        $wishlist = false;
        //check if the product in the wishlist when login
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())
                                ->where('product_id', $product->id)
                                ->exists();
        }

        return view(
          'well.product.product_details',
          compact('product', 'title')
        );
    }

}
