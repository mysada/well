@extends('layouts.app')
@vite('resources/sass/product_details.scss')
@vite('resources/js/qty-input.js')

@section('content')

<!-- Product Detail -->
<section class="product-detail py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ url('/products') }}">Shop</a> / <span>{{ $product->name }}</span>
            </div>
            <div class="col-md-12 mb-3">
                <h2 class="product-title">Product Details</h2>
            </div>
            <div class="col-md-6 product-image position-relative">
                <img src="{{ asset($product->image_url) }}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price text-danger">$ {{ number_format($product->price, 2) }}</p>
                <label for="quantity" class="mr-2 custom-margin">Quantity</label>
                <div class="d-flex align-items-center mb-4">
                    <div class="qty-input">
                        <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                        <input class="product-qty" type="number" name="quantity" min="1"
                               max="{{ $product->stock }}" value="1">
                        <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                    </div>
                    <span class="text-success" style="margin-left: 30px;">{{ $product->stock }} in stock</span>
                </div>
                <div class="d-flex gap-4">
                    <form action="{{ route('CartItemStore') }}" method="POST" class="mr-3 w-50">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" class="product-qty-input" value="1">
                        <button type="submit" class="btn-product btn-dark w-100">Add to Cart</button>
                    </form>

                    <form action="{{route('WishlistStore')}}" method="POST" class="mr-3 w-50">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn-product btn-outline-dark w-100">
                            Wishlist
                            @if($wishlist)
                            <img src="/images/detail_view/wishlist-true.svg" width="25px" alt="wishlist"/>
                            @else
                            <img src="/images/detail_view/wishlist-false.svg" width="25px" alt="wishlist"/>
                            @endif
                        </button>
                    </form>

                </div>
                <a href="{{ route('product.reviews', $product->id) }}" class="btn btn-primary mt-3" id="see_reviews">See Reviews</a>

            </div>
        </div>
    </div>
</section>

<!-- Introduction -->
<section class="introduction py-5">
    <div class="container">
        <div class="col-md-12 mb-3">
            <h2 class="product-title text-center">Introduction</h2>
        </div>
        <p class="product-description text-center">{{ $product->long_description }}</p>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/detail_view/intro1.jpg') }}" alt="Introduction Image 1">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/detail_view/intro2.jpg') }}" alt="Introduction Image 2">
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="related-products py-5">
    <div class="container">
        <div class="col-md-12 custom-margin-bottom">
            <h2 class="product-title text-center">Related Products</h2>
        </div>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="{{ asset($relatedProduct->image_url) }}" class="card-img-top"
                         alt="{{ $relatedProduct->name }}">
                    <div class="card-body">
                        <h6 class="category">{{ $relatedProduct->category->name }}</h6>
                        <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">$ {{ number_format($relatedProduct->price, 2) }}</p>
                            <form action="{{ route('CartItemStore') }}" method="POST" style="display: inline; padding-top: 30px">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" style="background-color: #00AA79; border: none; border-radius: 50%; width: 40px; height: 40px;  display: flex; align-items: center; justify-content: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8v5a.5.5 0 0 0 1 0V8h5a.5.5 0 0 0 0-1H9V2a.5.5 0 0 0-1 0v5H2a.5.5 0 0 0 0 1h5z"/>
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn-product btn-outline-dark load-more">View More Products</a>
        </div>
    </div>
</section>
@endsection


