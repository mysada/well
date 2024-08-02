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
        $title    = 'Products';

        return view('well.product.product_list', compact('products', 'title'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Product Info';
        $product = Product::find($id);

        return view(
          'well.product.product_details',
          compact('product', 'title')
        );
    }

}
