<?php

namespace App\Http\Controllers\well;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with("category")
                           ->orderBy('created_at', 'desc')
                           ->get();
        $title    = 'Products';

        return view('well.product.product_list', compact('products', 'title'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with("category")->find($id);
        $title   = $product->name;

        return view(
          'well.product.product_details',
          compact('product', 'title')
        );
    }

}
