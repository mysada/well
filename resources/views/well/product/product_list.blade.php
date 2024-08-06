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
                        {{ htmlspecialchars($category->name) }}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card product-card h-100">
                            <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ htmlspecialchars($product->name) }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ htmlspecialchars($product->name) }}</h5>
                                <p class="card-text mt-auto">$ {{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn-add mt-3">+</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $products->appends(['category_id' => $category_id])->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
