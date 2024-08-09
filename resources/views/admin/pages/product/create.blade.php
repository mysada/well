@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Add New Product</h1>
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

                <form action="{{ route('AdminProductStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea class="form-control" id="long_description" name="long_description" rows="5">{{ old('long_description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category ID</label>
                        <input type="number" class="form-control" id="category_id" name="category_id" value="{{ old('category_id') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" step="0.01" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" min="0" max="5">
                    </div>

                    <div class="form-group">
                        <label for="discount">Discount (%)</label>
                        <input type="number" step="0.01" class="form-control" id="discount" name="discount" value="{{ old('discount') }}" min="0" max="100">
                    </div>

                    <button type="submit" class="btn btn-success">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
