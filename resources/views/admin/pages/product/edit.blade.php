@extends('admin.admin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between">
            <h1 class="text-4xl font-bold mb-4">Edit Product</h1>
            <a href="{{ route('AdminProductList') }}" class="btn btn-primary mb-3">Back to Product List</a>
        </div>
        <form action="{{ route('AdminProductUpdate', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Column 1 -->
                <div>
                    <label class="input input-bordered flex items-center gap-2 ">
                        <span>Product Name</span>
                        <input type="text" class="grow" id="name" name="name" value="{{ old('name', $product->name) }}"
                               placeholder="Enter product name"/>
                    </label>
                    @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="input input-bordered flex items-center gap-2 ">
                        <span>Price</span>
                        <input type="number" step="0.01" class="grow" id="price" name="price" value="{{ old('price', $product->price) }}"
                               placeholder="Enter price"/>
                    </label>
                    @error('price')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="input input-bordered flex items-center gap-2 ">
                        <span>Category ID</span>
                        <input type="number" class="grow" id="category_id" name="category_id"
                               value="{{ old('category_id', $product->category_id) }}" placeholder="Enter category ID"/>
                    </label>
                    @error('category_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="input input-bordered flex items-center gap-2 ">
                        <span>Stock</span>
                        <input type="number" class="grow" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                               placeholder="Enter stock quantity"/>
                    </label>
                    @error('stock')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="input input-bordered flex items-center gap-2 ">
                        <span>Color</span>
                        <input type="text" class="grow" id="color" name="color" value="{{ old('color', $product->color) }}"
                               placeholder="Enter color"/>
                    </label>
                    @error('color')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="input input-bordered flex items-center gap-2 ">
                        <span>Rating</span>
                        <input type="number" step="0.01" class="grow" id="rating" name="rating"
                               value="{{ old('rating', $product->rating) }}" min="0" max="5" placeholder="Enter rating"/>
                    </label>
                    @error('rating')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="input input-bordered flex items-center gap-2 ">
                        <span>Discount (%)</span>
                        <input type="number" step="0.01" class="grow" id="discount" name="discount"
                               value="{{ old('discount', $product->discount) }}" min="0" max="100" placeholder="Enter discount"/>
                    </label>
                    @error('discount')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    @if ($product->image_url)
                        <div class="mb-2">
                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="max-w-xs">
                        </div>
                    @endif
                    <input type="file" class="file-input file-input-bordered grow w-full " id="image" name="image"/>
                    @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Column 2 -->
                <div>
                    <textarea class="textarea textarea-bordered w-full " id="description" name="description"
                              rows="3"
                              placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <textarea class="textarea textarea-bordered w-full " id="long_description"
                              name="long_description"
                              rows="5" placeholder="Enter long description">{{ old('long_description', $product->long_description) }}</textarea>
                    @error('long_description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success w-full ">Update Product</button>

            </div>

        </form>
    </div>
@endsection
