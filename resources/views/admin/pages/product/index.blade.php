@extends('admin.admin')

@section('content')
    <div class="overflow-x-auto w-full">
        <div class="flex justify-between py-4">
            <h2 class="text-4xl font-bold mb-4">Product List</h2>
            <div class="flex gap-4">
                <label class="input input-bordered flex items-center gap-2">
                    <form action="">
                        <input type="text" class="grow" placeholder="Search"/>
                    </form>
                </label>
                <a href="{{ route('AdminProductCreate') }}" class="btn btn-primary">Add New Product</a>
            </div>
        </div>

        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="avatar">
                                <div class="mask mask-squircle h-12 w-12">
                                    <a href="{{ route('AdminProductShow', $product->id) }}">
                                        <img
                                                src="{{ asset($product->image_url) }}"
                                                alt="img"/>
                                    </a>
                                </div>
                            </div>
                        <td>
                            <a href="{{ route('AdminProductShow', $product->id) }}">{{ $product->name }}</a>
                        </td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->rating }}</td>
                        <td class="flex gap-4 px-0">
                            <a href="{{ route('AdminProductEdit', $product->id) }}"
                               class="btn btn-primary flex-1">Edit</a>
                            <form action="{{ route('AdminProductDestroy', $product->id) }}" method="POST"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
