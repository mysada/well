@extends('admin.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Product Details</h1>
                <a href="{{ route('AdminProductList') }}" class="btn btn-secondary mb-3">Back to Product List</a>
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="img-fluid">
                            </div>
                            <div class="col-md-8" style="text-align: left">
                                <p><strong>Name:</strong> {{ $product->name }}</p>
                                <p><strong>Description:</strong> {{ $product->description }}</p>
                                <p><strong>Long Description:</strong> {{ $product->long_description }}</p>
                                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                <p><strong>Category ID:</strong> {{ $product->category_id }}</p>
                                <p><strong>Stock:</strong> {{ $product->stock }}</p>
                                <p><strong>Color:</strong> {{ $product->color }}</p>
                                <p><strong>Rating:</strong> {{ $product->rating }}</p>
                                <p><strong>Discount:</strong> {{ $product->discount }}%</p>
                                <p><strong>Created At:</strong> {{ $product->created_at }}</p>
                                <p><strong>Updated At:</strong> {{ $product->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('AdminProductEdit', $product->id) }}" class="btn btn-warning">Edit Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
