@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Edit Product</h1>
                <a href="{{ route('AdminProductList') }}" class="btn btn-secondary mb-3">Back to Product List</a>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('AdminProductUpdate', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea class="form-control" id="long_description" name="long_description" rows="5">{{ old('long_description', $product->long_description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category ID</label>
                        <input type="number" class="form-control" id="category_id" name="category_id" value="{{ old('category_id', $product->category_id) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Product Image</label>
                        @if ($product->image_url)
                            <div class="mb-2">
                                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" style="max-width: 200px;">
                            </div>
                        @endif
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $product->color) }}">
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" step="0.01" class="form-control" id="rating" name="rating" value="{{ old('rating', $product->rating) }}" min="0" max="5">
                    </div>

                    <div class="form-group">
                        <label for="discount">Discount (%)</label>
                        <input type="number" step="0.01" class="form-control" id="discount" name="discount" value="{{ old('discount', $product->discount) }}" min="0" max="100">
                    </div>

                    <button type="submit" class="btn btn-success">Update Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
