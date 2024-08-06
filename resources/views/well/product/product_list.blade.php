@extends('layouts.app')
@vite('resources/sass/product_list.scss')
@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <img src="{{ asset('images/list_view/list_view_banner.jpg') }}" alt="Hero Image" class="img-fluid">
</section>

<!-- Categories and Products -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="category-list">
                    @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category_id' => $category->id]) }}"
                       class="{{ isset($category_id) && $category_id == $category->id ? 'active-category' : '' }}">
                        {!! htmlspecialchars($category->name, ENT_QUOTES) !!}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <!-- Search Bar -->
                <form method="GET" action="{{ route('products.index') }}" class="mb-4 search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-custom">Search</button>
                        </div>
                    </div>
                </form>

                @if(request('search'))
                <p>You searched for: <strong>{{ request('search') }}</strong></p>
                @endif

                <!-- Products -->
                <div class="row">
                    @forelse ($products as $product)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                            <div class="card product-card h-100">
                                <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ htmlspecialchars($product->name) }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ htmlspecialchars($product->name) }}</h5>
                                    <p class="card-text mt-auto">$ {{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-12">
                        <p>No products found matching your search criteria.</p>
                    </div>
                    @endforelse
                </div>
                <div class="text-center">
                    <div class="custom-pagination">
                        {{ $products->appends(['category_id' => $category_id, 'search' => $search])->links('pagination::custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
