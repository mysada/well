@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between">
            <div></div>
            <div class="flex gap-4">
                <label class="input input-bordered flex items-center gap-2">
                    <form action="">
                        <input type="text" class="grow" placeholder="Search"/>
                    </form>
                </label>
                <a href="{{ route('AdminProductCreate') }}" class="btn btn-outline btn-primary">Add New Product</a>
            </div>
        </div>

        <table class="table w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Stock</th>
                    <th>Color</th>
                    <th class="px-0">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr >

                        <td>{{ $product->id }}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle h-12 w-12">
                                        <a href="{{ route('AdminProductShow', $product->id) }}">
                                            <img
                                                    src="{{ asset($product->image_url) }}"
                                                    alt="img"/>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('AdminProductShow', $product->id) }}">{{ $product->name }}</a>
                                    <p class="opacity-75 text-sm">{{$product->category->name}}</p>
                                </div>
                            </div>
                        </td>

                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->rating }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->color }}</td>
                        <td class="flex gap-4 px-0">
                            <a href="{{ route('AdminProductEdit', $product->id) }}"
                               class="btn btn-outline btn-primary flex-1">Edit</a>
                            <form action="{{ route('AdminProductDestroy', $product->id) }}" method="POST"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
