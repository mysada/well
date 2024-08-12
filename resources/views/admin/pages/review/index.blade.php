@extends('admin.admin')

@section('content')
<div class="container mx-auto">
    <!-- Review Statistics -->
    <div class="stats shadow mb-4">
        <div class="stat">
            <div class="stat-title">Average Rating</div>
            <div class="stat-value">{{ number_format($averageRating, 2) }}</div>
        </div>
        <div class="stat">
            <div class="stat-title">Total Reviews</div>
            <div class="stat-value">{{ $totalReviews }}</div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="flex justify-between mb-4">
        <div class="opacity-75">
            @if($search)
            Search
            <span class="badge badge-primary badge-outline">{{ $search }}</span>
            found {{ count($items) }} result(s)
            @endif
        </div>
        <div class="flex join">
            <form action="" method="GET" class="flex items-center gap-2 join-item">
                <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search..." class="input input-bordered">

                <!-- Category Filter -->
                <select name="category_id" class="select select-bordered">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>

                <!-- Product Filter -->
                <select name="product_id" class="select select-bordered">
                    <option value="">All Products</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == old('product_id', $product_id) ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                    @endforeach
                </select>

                <!-- Rating Filter -->
                <select name="rating" class="select select-bordered">
                    <option value="">All Ratings</option>
                    @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $i == old('rating', $rating) ? 'selected' : '' }}>
                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                    </option>
                    @endfor
                </select>

                <!-- Date Filter -->
                <input type="date" name="start_date" value="{{ old('start_date', $start_date) }}" class="input input-bordered">
                <input type="date" name="end_date" value="{{ old('end_date', $end_date) }}" class="input input-bordered">
                <button type="submit" class="btn">Filter</button>
            </form>
            @if($search || $category_id || $product_id || $rating || $start_date || $end_date)
            <a href="{{ route('AdminReviewList') }}" class="btn join-item">Reset Filters</a>
            @endif
            <a href="{{ route('AdminReviewExport') }}" class="btn btn-outline ml-4">Export Reviews</a>
        </div>
    </div>

    <!-- Review List -->
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
            <th>Create Time</th>
            <th>Flagged</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $review)
        <tr class="hover">
            <td>{{ $review->id }}</td>
            <td>{{ $review->product->category->name }}</td> <!-- Display category name -->
            <td>
                <a href="{{ route('AdminProductShow', $review->product->id) }}">
                    {{ $review->product->name }}
                </a>
            </td>
            <td>{{ $review->user->name }}</td>
            <td>{{ $review->rating }}</td>
            <td>{{ Str::limit($review->review_text, 50) }}</td>
            <td>
                @if($review->image)
                <div class="avatar">
                    <div class="mask mask-squircle h-12 w-12">
                        <img src="{{ asset($review->image) }}" alt="Review Image"/>
                    </div>
                </div>
                @else
                No image
                @endif
            </td>
            <td>{{ $review->created_at }}</td>
            <td>
                @if($review->flagged)
                <span class="badge badge-error">Flagged</span>
                @else
                <form action="{{ route('AdminReviewFlag', $review->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">Flag</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @include('admin.components.pagination')
</div>
@endsection
