@extends('admin.admin')
@vite('resources/admin/js/admin.js')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Review Statistics -->
        <div class="stats shadow mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="stat p-4 rounded-lg flex items-center">
                <div class="stat-icon text-blue-600 text-3xl mr-4">
                    <i class="fas fa-star"></i>
                </div>
                <div>
                    <div class="stat-title text-lg font-semibold">Average Rating</div>
                    <div class="stat-value text-3xl">{{ number_format($averageRating, 2) }}</div>
                </div>
            </div>
            <div class="stat p-4 rounded-lg flex items-center">
                <div class="stat-icon text-green-600 text-3xl mr-4">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <div>
                    <div class="stat-title text-lg font-semibold">Total Reviews</div>
                    <div class="stat-value text-3xl">{{ $totalReviews }}</div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div>
            <form action="" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="w-full">
                    <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                    <input type="text" name="search" value="{{ old('search', $search) }}"
                           placeholder="Search by product, user, review text..." class="input input-bordered w-full">
                </div>
                <div class="w-full">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category" class="select select-bordered w-full">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $category_id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="product" class="block text-sm font-medium text-gray-700">Product</label>
                    <select name="product_id" id="product" class="select select-bordered w-full">
                        <option value="">All Products</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == old('product_id', $product_id) ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                    <select name="rating" class="select select-bordered w-full">
                        <option value="">All Ratings</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $i == old('rating', $rating) ? 'selected' : '' }}>
                                {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="w-full">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $start_date) }}"
                           class="input input-bordered w-full">
                </div>
                <div class="w-full">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $end_date) }}"
                           class="input input-bordered w-full">
                </div>
                <div></div>
                <div class="w-full flex join items-end">
                    <a href="{{ route('AdminReviewList') }}" class="w-full flex-1 btn btn-neutral join-item">Reset
                        Filters</a>
                    <button type="submit" class="w-full flex-1 btn btn-primary join-item">Filter</button>
                </div>
            </form>
        </div>

        <!-- Review List -->
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Review Text</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Create Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $review)
                        <tr class="hover:bg-gray-100">
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->product->category->name }}</td>
                            <td>
                                <a href="{{ route('AdminProductShow', $review->product->id) }}"
                                   class="link link-hover text-primary">
                                    {{ $review->product->name }}
                                </a>
                            </td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>{{ Str::limit($review->review_text, 50) }}</td>
                            <td>
                                @if($review->image)
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ asset('storage/' . $review->image) }}" alt="Review Image"/>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-gray-500">No image</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('AdminReviewUpdateStatus', $review->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class=" h-8 badge"
                                            onchange="if(confirm('Do you really want to change the status of this review?')) { this.form.submit(); } else { this.value = '{{ $review->status }}'; }">
                                        <option value="active" {{ $review->status == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="flagged" {{ $review->status == 'flagged' ? 'selected' : '' }}>
                                            Flagged
                                        </option>
                                        <option value="pending" {{ $review->status == 'pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <td>{{ $review->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('admin.components.pagination')
    </div>

@endsection
