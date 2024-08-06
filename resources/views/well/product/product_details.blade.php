
@extends('layouts.app')
@vite('resources/sass/product_details.scss')
@section('content')
<section class="product-detail py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 product-image">
                <img src="/images/detail_view/product_pic.jpg" alt="Product Image">
            </div>
            <div class="col-md-6">
                <h2>Cream Tube</h2>
                <p>$ 9.99</p>
                <div class="d-flex align-items-center">
                    <input type="number" class="form-control w-25 mr-3" value="1" min="1">
                    <button class="btn btn-dark mr-3">Add to Cart</button>
                    <button class="btn btn-outline-dark"><i class="far fa-heart"></i></button>
                </div>
                <div class="mt-4">
                    <h4>Introduction</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="introduction py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/images/detail_view/intro1.jpg" alt="Introduction Image 1">
            </div>
            <div class="col-md-6">
                <img src="/images/detail_view/intro2.jpg" alt="Introduction Image 2">
            </div>
        </div>
    </div>
</section>

<section class="related-products py-5">
    <div class="container">
        <h3>Related Products</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="/images/detail_view/product_pic.jpg" class="card-img-top" alt="Related Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <p class="card-text">$ 56</p>
                        <button class="btn btn-outline-primary btn-block">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="/images/detail_view/product_pic.jpg" class="card-img-top" alt="Related Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <p class="card-text">$ 56</p>
                        <button class="btn btn-outline-primary btn-block">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="/images/detail_view/product_pic.jpg" class="card-img-top" alt="Related Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <p class="card-text">$ 56</p>
                        <button class="btn btn-outline-primary btn-block">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="/images/detail_view/product_pic.jpg" class="card-img-top" alt="Related Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <p class="card-text">$ 56</p>
                        <button class="btn btn-outline-primary btn-block">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Load More</button>
        </div>
    </div>
</section>
@endsection
