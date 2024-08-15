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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $title = 'Product Management - Create';

        return view('admin.pages.product.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s\-_.]+$/'
            ],
            'description' => [
                'required',
                'string'
            ],
            'long_description' => [
                'nullable',
                'string'
            ],
            'price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
            'stock' => [
                'required',
                'integer',
                'min:0'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ],
            'color' => [
                'nullable',
                'string',
                'max:50'
            ],
            'rating' => [
                'nullable',
                'numeric',
                'min:0',
                'max:5'
            ],
            'discount' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100'
            ],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
        }

        Product::create([
            'name'             => $request->name,
            'description'      => $request->description,
            'long_description' => $request->long_description,
            'price'            => $request->price,
            'category_id'      => $request->category_id,
            'stock'            => $request->stock,
            'image_url'        => $imagePath ? Storage::url($imagePath) : null,
            'color'            => $request->color,
            'rating'           => $request->rating,
            'discount'         => $request->discount,
        ]);

        return redirect()->route('AdminProductList')->with(
            'success',
            'Product created successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        $title = "Product Management - $product->name";

        return view('admin.pages.product.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $title = "Product Management - Edit $product->name";

        return view('admin.pages.product.edit', compact('product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s\-_.]+$/'
            ],
            'description' => [
                'required',
                'string'
            ],
            'long_description' => [
                'nullable',
                'string'
            ],
            'price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
            'stock' => [
                'required',
                'integer',
                'min:0'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ],
            'color' => [
                'nullable',
                'string',
                'max:50'
            ],
            'rating' => [
                'nullable',
                'numeric',
                'min:0',
                'max:5'
            ],
            'discount' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100'
            ],
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($product->image_url && Storage::exists($product->image_url)) {
                Storage::delete($product->image_url);
            }

            $imagePath = $request->file('image')->store('images/products');
            $product->image_url = $imagePath;
        }

        // Update other product fields
        $product->update($request->except('image'));

        return redirect()->route('AdminProductList')->with(
            'success',
            'Product updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('AdminProductList')->with(
            'success',
            'Product deleted successfully.'
        );
    }
}
