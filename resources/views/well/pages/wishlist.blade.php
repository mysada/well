@extends('layouts.app')
@section('content')
    @vite('resources/sass/wishlist.scss')
    <!-- Wishlist Section -->
    <section class="wishlist-section">
        <div class="container">
            <h1 style="font-size: 50px;">Wishlist</h1>
            @foreach($wishlists as $wishlist)
                <div class="product-item">
                    <div class="product-info">
                        <img src="{{asset($wishlist->product->image_url)}}" alt="Product 1">
                        <div>
                            <div class="product-title">{{$wishlist->product->name}}</div>
                            <div class="product-price">${{$wishlist->product->price}}</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn btn-primary">Add to Cart</button>
                        <!-- <button class="btn btn-danger">Remove</button> -->
                        <button class="btn btn-remove" style="color: #666; margin-left: 20px;">Remove</button>
                    </div>
                </div>

            @endforeach

        </div>
    </section>
@endsection
