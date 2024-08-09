@extends('admin.admin')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div></div>
            <a href="{{ route('AdminProductList') }}" class="btn btn-primary">Back to Product List</a>
        </div>

        <div class="bg-base-100 shadow-xl rounded-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/3">
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                         class="w-full h-full object-cover"/>
                </div>
                <div class="md:w-2/3 p-6">
                    <h2 class="text-2xl font-bold mb-4">{{ $product->name }}</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <p><span class="font-semibold">Price:</span> ${{ number_format($product->price, 2) }}</p>
                            <p><span class="font-semibold">Category ID:</span> {{ $product->category_id }}</p>
                            <p><span class="font-semibold">Stock:</span> {{ $product->stock }}</p>
                        </div>
                        <div>
                            <p><span class="font-semibold">Color:</span> {{ $product->color }}</p>
                            <p><span class="font-semibold">Rating:</span> {{ $product->rating }}</p>
                            <p><span class="font-semibold">Discount:</span> {{ $product->discount }}%</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-2">Description</h3>
                        <p class="text-gray-700">{{ $product->description }}</p>
                    </div>


                    <div class="collapse">
                        <input type="checkbox"/>
                        <div class="collapse-title text-xl font-medium p-0">Click to show/hidden long description</div>
                        <div class="collapse-content">
                            <p class="text-gray-700">{{ $product->long_description }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <p>Created: {{ $product->created_at->format('Y-m-d H:i') }}</p>
                            <p>Updated: {{ $product->updated_at->format('Y-m-d H:i') }}</p>
                        </div>
                        <a href="{{ route('AdminProductEdit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
