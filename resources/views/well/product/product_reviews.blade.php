@extends('layouts.app')
@vite('resources/sass/reviews.scss')

@section('content')
<section class="product-review py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ url('/products') }}">Shop</a> / <span>{{ $product->name }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 product-image">
                <img src="{{ asset($product->image_url) }}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-9">
                <h3 class="product-title">{{ $product->name }}</h3>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price text-danger">$ {{ number_format($product->price, 2) }}</p>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h4>Reviews</h4>
                @foreach ($product->reviews as $review)
                <div class="review">
                    <div class="review-header">
                        <div class="review-user-info">
                            <div>
                                <h5 class="user-name">{{ $review->user->name }}</h5>
                                <p class="review-date">Posted on {{ $review->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <div class="review-rating">
                            @for ($i = 0; $i < 5; $i++)
                            @if ($review->rating > $i)
                            <!-- Filled Star SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#f8ce0b" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M12 17.27L18.18 21 16.54 14.19 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.95L5.82 21z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                            @else
                            <!-- Unfilled Star SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ccc" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M12 17.27L18.18 21 16.54 14.19 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.95L5.82 21z" fill="none" stroke="#ccc" stroke-width="2"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                            @endif
                            @endfor
                        </div>
                    </div>
                    <div class="review-body">
                        <p class="review-text">{{ $review->review_text }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @auth
        <div class="row mt-5">
            <div class="col-md-12">
                <h4>Write a Review</h4>
                <form action="{{ route('reviews.store1', ['id' => $product->id]) }}" method="POST">
                    @csrf
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
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
        @endauth

    </div>
</section>
@endsection
