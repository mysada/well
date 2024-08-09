@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Product List</h1>
                <a href="{{ route('AdminProductCreate') }}" class="btn btn-primary mb-3">Add New Product</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>More Info</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" style="width: 50px;"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>{{ $product->rating }}</td>
                                <td><a href="{{ route('AdminProductShow', $product->id) }}" class="btn btn-info btn-sm">More Info</a></td>
                                <td class="text-center">
                                    <a href="{{ route('AdminProductEdit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('AdminProductDestroy', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
