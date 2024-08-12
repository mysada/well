@extends('admin.admin')
@vite('resources/admin/js/admin.js')
@section('content')
<div class="container mx-auto p-4">
    <!-- Review Statistics -->
    <div class="stats shadow mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="stat bg-base-100 p-4 rounded-lg">
            <div class="stat-title text-lg font-semibold">Average Rating</div>
            <div class="stat-value text-3xl">{{ number_format($averageRating, 2) }}</div>
        </div>
        <div class="stat bg-base-100 p-4 rounded-lg">
            <div class="stat-title text-lg font-semibold">Total Reviews</div>
            <div class="stat-value text-3xl">{{ $totalReviews }}</div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="flex flex-wrap justify-between mb-6 gap-4">
        <div class="opacity-75 w-full">
            @if($search)
            <span class="badge badge-primary badge-outline">Search</span>
            <span>{{ $search }} found {{ count($items) }} result(s)</span>
            @endif
        </div>
        <form action="" method="GET" class="flex grid-cols-1 gap-4 w-full">
            <div class="flex flex-wrap gap-4 w-full md:w-1/2">
                <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search by product, user, review text..." class="input input-bordered w-full">
                <select name="category_id" id="category" class="select select-bordered w-full">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <select name="product_id" id="product" class="select select-bordered w-full">
                    <option value="">All Products</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == old('product_id', $product_id) ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-wrap gap-4 w-full md:w-1/2">
                <select name="rating" class="select select-bordered w-full">
                    <option value="">All Ratings</option>
                    @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $i == old('rating', $rating) ? 'selected' : '' }}>
                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                    </option>
                    @endfor
                </select>
                <select name="status" class="select select-bordered w-full" id="status-dropdown">
                    <option value="" class="bg-white">All Statuses</option>
                    <option value="active" {{ old('status', $status) == 'active' ? 'selected' : '' }} class="bg-green-500 text-white">Active</option>
                    <option value="flagged" {{ old('status', $status) == 'flagged' ? 'selected' : '' }} class="bg-red-500 text-white">Flagged</option>
                    <option value="pending" {{ old('status', $status) == 'pending' ? 'selected' : '' }} class="bg-yellow-500 text-white">Pending</option>
                </select>
                <input type="date" name="start_date" value="{{ old('start_date', $start_date) }}" class="input input-bordered w-full">
                <input type="date" name="end_date" value="{{ old('end_date', $end_date) }}" class="input input-bordered w-full">
                <button type="submit" class="btn btn-primary w-full md:w-auto">Filter</button>
            </div>
        </form>
        <a href="{{ route('AdminReviewList') }}" class="btn btn-secondary w-full md:w-auto">Reset Filters</a>
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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $review)
            <tr class="hover">
                <td>{{ $review->id }}</td>
                <td>{{ $review->product->category->name }}</td>
                <td>
                    <a href="{{ route('AdminProductShow', $review->product->id) }}" class="link link-hover text-primary">
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
                        <select name="status" class="select select-bordered" onchange="this.form.submit()">
                            <option value="active" {{ $review->status == 'active' ? 'selected' : '' }} class="bg-green-500 text-white">Active</option>
                            <option value="flagged" {{ $review->status == 'flagged' ? 'selected' : '' }} class="bg-red-500 text-white">Flagged</option>
                            <option value="pending" {{ $review->status == 'pending' ? 'selected' : '' }} class="bg-yellow-500 text-white">Pending</option>
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
