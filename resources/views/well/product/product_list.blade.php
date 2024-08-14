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
                <div class="category-heading">Category</div>
                <div class="category-list">
                    @foreach ($categories as $category)
                    <a href="{{ route('products.index', ['category_id' => $category->id]) }}"
                       class="{{ isset($category_id) && $category_id == $category->id ? 'active-category' : '' }}">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                            <path d="M1 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l6.414 6.414a1 1 0 0 1 0 1.414l-6.414 6.414a1 1 0 0 1-1.414 0L1.293 9.707A1 1 0 0 1 1 9V2z"/>
                            <path d="M6.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg> -->
                        {!! htmlspecialchars($category->name, ENT_QUOTES) !!}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <!-- Search Bar -->
                <form method="GET" action="{{ route('products.index') }}" class="mb-4 search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control search-bar" placeholder="Search products..." value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" id="search_button" class="btn btn-custom">Search</button>
                        </div>
                    </div>
                </form>

                @if(request('search'))
                <p style="font-size:18px">You searched for: <strong>{{ request('search') }}</strong></p>
                @endif

                <!-- Products -->
                <div class="row">
                    @forelse ($products as $product)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                            <div class="card product-card h-100">
                                <img src="{{ asset($product->image_url) }}"  alt="{{ htmlspecialchars($product->name) }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ htmlspecialchars($product->name) }}</h5>
                                    <p class="card-text mt-auto">$ {{ number_format($product->price, 2) }}</p>
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <form action="{{ route('CartItemStore') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" style="background-color: #00AA79; border: none; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path d="M8 8v5a.5.5 0 0 0 1 0V8h5a.5.5 0 0 0 0-1H9V2a.5.5 0 0 0-1 0v5H2a.5.5 0 0 0 0 1h5z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-12">
                        <p style="color: #666">No products found matching your search criteria.</p>
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
