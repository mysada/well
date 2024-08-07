@extends('layouts.app')
@section('content')
    @vite('resources/sass/wishlist.scss')
    <!-- Wishlist Section -->
    <section class="wishlist-section">
        <div class="container">
            <h1 style="font-size: 50px;">Wishlist</h1>
            <div class="product-item">
                <div class="product-info">
                    <img src="../../../public/images/product.jpg" alt="Product 1">
                    <div>
                        <div class="product-title">Skincare</div>
                        <div class="product-price">$106.00</div>
                    </div>
                </div>
                <div class="product-actions">
                    <button class="btn btn-primary">Add to Cart</button>
                    <!-- <button class="btn btn-danger">Remove</button> -->
                    <button class="btn btn-remove" style="color: #666; margin-left: 20px;">Remove</button>
                </div>
            </div>
            <div class="product-item">
                <div class="product-info">
                    <img src="../../../public/images/product1.jpg" alt="Product 2">
                    <div>
                        <div class="product-title">Skincare</div>
                        <div class="product-price">$106.00</div>
                    </div>
                </div>
                <div class="product-actions">
                    <button class="btn btn-primary">Add to Cart</button>
                    <button class="btn btn-remove">Remove</button>
                </div>
            </div>
        </div>
    </section>
@endsection
