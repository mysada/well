@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <img src="/images/list_view/list_view_banner.jpg" alt="Hero Image" class="img-fluid">
</section>

<!-- Categories and Products -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="category-list">
                    <a href="#" class="active-category">Best Seller</a>
                    <a href="#">Skincare</a>
                    <a href="#">Fitness</a>
                    <a href="#">Supplements</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p1.jpg" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$ 56</p>
                                <button class="btn-add">+</button>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat the product card for other products -->
                </div>
                <div class="text-center">
                    <button class="btn btn-load-more">Load More</button>
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection
