@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between ">
            <div class=" opacity-75">
                @if($search)
                    Search
                    <span class="badge badge-primary badge-outline">{{$search}}</span>
                    find {{count($items)}} result
                @endif
            </div>
            <div class="flex join">
                <label class="input input-bordered flex items-center gap-2 join-item">
                    <form action="">
                        <input type="text" name="search" value="{{ old('search', $search) }}"
                               placeholder="Search...">
                    </form>
                </label>
                @if($search)
                    <a href="{{ route('AdminProductList') }}" class="btn join-item">Get All</a>
                @endif
                <a href="{{ route('AdminProductCreate') }}" class="btn  btn-primary join-item">Add New Product</a>
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
                @foreach ($items as $product)
                    <tr class="hover">
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
                                    <a class="link-primary link" href="{{ route('AdminProductShow', $product->id) }}">{{ $product->name }}</a>
                                    <p class="opacity-75 text-sm">{{$product->category->name}}</p>
                                </div>
                            </div>
                        </td>

                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->rating }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->color }}</td>
                        <td class="px-0">
                            <div class="join flex w-full">
                                <a href="{{ route('AdminProductEdit', $product->id) }}"
                                   class="btn btn-primary join-item flex-1">Edit</a>
                                <form action="{{ route('AdminProductDestroy', $product->id) }}" method="POST"
                                      class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('delete-form-1')"
                                            class=" btn join-item">Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('admin.components.pagination')
    </div>
@endsection
