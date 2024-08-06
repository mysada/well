@extends('layouts.app')
@section('content')
    @vite('resources/sass/home.scss')

    <!-- Hero Section -->
    <!-- <section class="hero-section">
        <img src="images/home/home_banner.jpg" alt="Hero Image">
        <div class="hero-content">
            <h1>SALE</h1>
            <p>Skincare, fitness products, nutritional supplements</p>
            <p class="bold">Up to 50% discount, check it out</p>
            <a href="#" class="btn btn-primary">Explore</a>
        </div>
    </section> -->



    <!-- Category Section -->
    <section class="category-section text-center">
        <div class="container">
            <h2>Category</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card category-card" style="background-image: url('images/home/category_1.jpg');">
                        <h1 class="category-card-title">Skincare</h1>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card" style="background-image: url('images/home/category_2.jpg');">
                        <h1 class="category-card-title">Fitness</h1>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card" style="background-image: url('images/home/category_3.jpg');">
                        <h1 class="category-card-title" style="color: #000;">Nutritional Supplements</h1>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Seller Section -->
    <section class="best-seller-section">
        <div class="container">
            <h2>Best Seller</h2>
            <div class="row-best-seller d-flex">
                <div class="col-md-6">
                    <div class="row-best-seller-left  text-center">
                        <div class="card best-seller-card" style="background-image: url('images/home/bs_1.jpg');">
                            <div class="card-body">
                                <h5 class="card-title">Nterdum et malesuada</h5>
                                <p class="card-text">Nterdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row-best-seller-right">
                        <div class="card-right">
                            <div class="best-seller-card-right" style="background-image: url('images/home/bs_2.jpg');">
                            </div>
                            <div class="bs-text">
                                <h5 class="bs-title">Nterdum et malesuada</h5>
                                <p>Nterdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>

                        <div class="card-right">
                            <div class="best-seller-card-right" style="background-image: url('images/home/bs_3.jpg');">
                            </div>
                            <div class="bs-text">
                                <h5 class="bs-title">Nterdum et malesuada</h5>
                                <p>Nterdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>

                    </div>
                </div>
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
