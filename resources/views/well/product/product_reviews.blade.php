@extends('layouts.app')
@vite('resources/sass/reviews.scss')
@vite('resources/js/qty-input.js')
@section('content')
<section class="product-review py-5">
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
                        <input class="product-qty" type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1">
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

                    <form action="{{ route('WishlistStore') }}" method="POST" class="mr-3 w-50">
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
            </div>
        </div>
    </div>
</section>

<section id="review_section" class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="overall-rating d-flex align-items-center mb-4">
                <h2 class="overall-rating-value">{{ number_format($product->reviews->avg('rating'), 1) }}</h2>
                <div class="overall-rating-stars">
                    @for ($i = 0; $i < 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $i < $product->reviews->avg('rating') ? '#f8ce0b' : '#ccc' }}" viewBox="0 0 24 24" width="24" height="24">
                        <path d="M12 17.27L18.18 21 16.54 14.19 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.95L5.82 21z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                    @endfor
                </div>
                <p class="ml-3">{{ $product->reviews->count() }} Reviews</p>
                @if($hasPurchased)
                <a class="review_btn" href="#write-review">Write a Review</a>
                @endif
            </div>
            <div class="review-list">
                @foreach ($product->reviews as $review)
                <div class="review mb-4">
                    <div class="review-header">
                        <div class="review-user-info d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="50" height="50" class="avatar-svg">
                                <path fill-rule="evenodd" d="M12 2a5 5 0 100 10 5 5 0 000-10zM3.5 18a8.5 8.5 0 0117 0v2a1 1 0 01-1 1h-15a1 1 0 01-1-1v-2z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h5 class="user-name">{{ $review->user->name }}</h5>
                                <p class="review-date">Posted on {{ $review->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <div class="review-rating">
                            @for ($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $review->rating > $i ? '#f8ce0b' : '#ccc' }}" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M12 17.27L18.18 21 16.54 14.19 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.95L5.82 21z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                            @endfor
                        </div>
                    </div>
                    <div class="review-body">
                        <p class="review-text">{{ $review->review_text }}</p>
                        @if($review->image)
                        <div class="review-image">
                            <img src="{{ asset('storage/' . $review->image) }}" alt="Review Image" class="img-fluid">
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @auth
    @if($hasPurchased)
    <div id="write-review" class="row mt-5">
        <div class="col-md-12">
            <h4>Write a Review</h4>
            <form action="{{ route('reviews.store1', ['id' => $product->id]) }}" class="review-form" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="">Select Rating</option>
                        <option value="5">5 Star</option>
                        <option value="4">4 Star</option>
                        <option value="3">3 Star</option>
                        <option value="2">2 Star</option>
                        <option value="1">1 Star</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="review_text">Review</label>
                    <textarea name="review_text" id="review_text" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
            @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
    @endif
    @endauth
</section>
@endsection
