@extends('layouts.app')
@section('content')
@vite('resources/sass/home.scss')


    <!-- Category Section -->
    @if ($randomHeroSection)
        <section class="hero-section">
            <img src="{{ asset($randomHeroSection['image']) }}" alt="Hero Image">
            
            <div class="hero-content">
                <h1>{{ $randomHeroSection['title'] }}</h1>
                <p>{{ $randomHeroSection['description'] }}</p>
                <p class="bold">{{ $randomHeroSection['bold_text'] }}</p>
                <a href="{{ $randomHeroSection['button_link'] }}" class="btn btn-primary">{{ $randomHeroSection['button_text'] }}</a>
            </div>
        </section>
    @endif


    <!-- Category Section -->
    <section class="category-section text-center">
        <div class="container">
            <h2>Category</h2>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="card category-card" style="background-image: url('{{ asset($category->image) }}.jpg');">
                            <h1 class="category-card-title">{{ $category->name }}</h1>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Best Seller Section -->
    <section class="best-seller-section">
        <div class="container">
            <h2>Best Seller</h2>
            <div class="row-best-seller d-flex">
                @foreach($bestSellers as $product)
                    <div class="col-md-6">
                        <div class="row-best-seller-left text-center">
                            <div class="card best-seller-card" style="background-image: url('{{ asset($product->image_url) }}');">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/home/content_3.jpg" class="img-fluid" alt="Products Image">
                </div>
                <div class="col-md-6 text-left d-flex align-items-center">
                    <div>
                        <p style="color: #00AB7A; font-size: 18px;">PRODUCTS</p>
                        <h3 style="font-size: 42px;">We Provide You The Best Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel orci efficitur diam.
                            Nulla facilisi. Duis libero odio, fermentum id nulla quis, hendrerit feugiat leo. In
                            imperdiet metus ac diam consequat, eu blandit sapien lobortis.</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
