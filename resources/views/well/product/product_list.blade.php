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
                    <a href="#" class="active-category">Best Seller</a>
                    <a href="#">Skincare</a>
                    <a href="#">Fitness</a>
                    <a href="#">Supplements</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @for ($i = 1; $i <= 9; $i++)
                        <div class="col-md-4 mb-4">
                            <div class="card product-card h-100">
                                <img src="{{ asset("images/list_view/list_p$i.jpg") }}" class="card-img-top" alt="Product {{ $i }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Nyantuy Skincare</h5>
                                    <p class="card-text mt-auto">$ 56</p>
                                    <button class="btn-add mt-3">+</button>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="text-center">
                    <button class="btn btn-load-more">Load More</button>
                </div>
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
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
