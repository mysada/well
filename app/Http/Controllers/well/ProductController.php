<?php

namespace App\Http\Controllers\well;

use App\Models\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('product_list', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        return view('product_detail', compact('product'));
    }

}
