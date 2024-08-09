@extends('admin.admin')

@section('content')
    <div class="overflow-x-auto w-full p-4">
        <h2 class="text-4xl font-bold mb-4">Product List</h2>
        <a href="{{ route('AdminProductCreate') }}" class="btn btn-primary mb-3">Add New Product</a>
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ asset($product->image_url) }}" alt="" class="w-12"></td>
                        <td>
                            <a href="{{ route('AdminProductShow', $product->id) }}">{{ $product->name }}</a>
                        </td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ $product->rating }}</td>
                        <td class="text-center">
                            <a href="{{ route('AdminProductEdit', $product->id) }}"
                               class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('AdminProductDestroy', $product->id) }}" method="POST"
                                  class="inline-block">
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
@endsection
