<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $items = Product::with('category')
                        ->when($search, function ($query, $search) {
                            return $query->where(
                              'name',
                              'like',
                              "%{$search}%"
                            );
                        })
                        ->orderByDesc('id')
                        ->paginate(20);

        $title = 'Product Management - List';
        Log::info('Manual log test');

        return view(
          'admin.pages.product.index',
          compact('items', 'title', 'search')
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $title = "Product Management - $product->name";

        return view('admin.pages.product.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $title = "Product Management - Edit $product->name";

        return view('admin.pages.product.edit', compact('product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $request->validate([
          'name'             => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-_.]+$/',
          'description'      => 'required|string',
          'long_description' => 'nullable|string',
          'price'            => 'required|numeric|min:0',
          'category_id'      => 'required|integer|exists:categories,id',
          'stock'            => 'required|integer|min:0',
          'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
          'color'            => 'nullable|string|max:50',
          'rating'           => 'nullable|numeric|min:0|max:5',
          'discount'         => 'nullable|numeric|min:0|max:100',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image_url) {
                Storage::delete('public/'.$product->image_url);
            }

            // Save the new image and update the image path
            $product->image_url = $request->file('image')->store('images/home');
        }
        // Update the other fields
        $product->name             = $request->name;
        $product->description      = $request->description;
        $product->long_description = $request->long_description;
        $product->price            = $request->price;
        $product->category_id      = $request->category_id;
        $product->stock            = $request->stock;
        $product->color            = $request->color;
        $product->rating           = $request->rating;
        $product->discount         = $request->discount;
        // Save the updated product
        $product->save();

        // Redirect to the product list with a success message
        return redirect()->route('AdminProductList')->with(
          'success',
          'Product updated successfully.'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'name'             => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-_.]+$/',
          'description'      => 'required|string',
          'long_description' => 'required|string',
          'price'            => 'required|numeric|min:0',
          'category_id'      => 'required|integer|exists:categories,id',
          'stock'            => 'required|integer|min:0',
          'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
          'color'            => 'nullable|string|max:50',
          'rating'           => 'nullable|numeric|min:0|max:5',
          'discount'         => 'nullable|numeric|min:0|max:100',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/home');

            if ( ! $imagePath) {
                return redirect()->back()->withErrors(
                  ['image' => 'Image upload failed.']
                );
            }
        } else {
            $imagePath = null;
        }

        //        dd($request->all());
        // Create the new product
        Product::create([
          'name'             => $request->name,
          'description'      => $request->description,
          'long_description' => $request->long_description,
          'price'            => $request->price,
          'category_id'      => $request->category_id,
          'stock'            => $request->stock,
          'image_url'        => $imagePath,
          'color'            => $request->color,
          'rating'           => $request->rating,
          'discount'         => $request->discount,
        ]);

        // Redirect to the product list with a success message
        return redirect()->route('AdminProductList')->with(
          'success',
          'Product created successfully.'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Product Management - Create';

        return view('admin.pages.product.create', compact('title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID and delete it
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('AdminProductList')->with(
          'success',
          'Product deleted successfully.'
        );
    }

}
