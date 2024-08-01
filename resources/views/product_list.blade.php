<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List - Wellness Balance</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Well</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 13H4a.5.5 0 0 1-.491-.408L1.01 1.607 1.61 1H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 6.25h8.22l1.25-6.25H3.14zM5 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm10 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM2 13s-1 0-1-1 1-4 7-4 7 4 7 4 1 0 1 1-1 1-1 1H2zm12-1a1.993 1.993 0 0 0-1.304-.847C11.517 10.383 9.299 10 8 10s-3.517.383-4.696 1.153A1.993 1.993 0 0 0 2 12h12z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <img src="{{ asset('images/hero_image.jpg') }}" class="img-fluid" alt="Hero Image">
        </div>
    </div>

    <!-- Product List Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2>Category</h2>
                <ul class="list-group">
                    <li class="list-group-item active">Best Seller</li>
                    <li class="list-group-item">Skincare</li>
                    <li class="list-group-item">Fitness</li>
                    <li class="list-group-item">Supplements</li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_1.jpg') }}" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_2.jpg') }}" class="card-img-top" alt="Product 2">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_3.jpg') }}" class="card-img-top" alt="Product 3">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_4.jpg') }}" class="card-img-top" alt="Product 4">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_5.jpg') }}" class="card-img-top" alt="Product 5">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_6.jpg') }}" class="card-img-top" alt="Product 6">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_7.jpg') }}" class="card-img-top" alt="Product 7">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_8.jpg') }}" class="card-img-top" alt="Product 8">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_9.jpg') }}" class="card-img-top" alt="Product 9">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_10.jpg') }}" class="card-img-top" alt="Product 10">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/product_11.jpg') }}" class="card-img-top" alt="Product 11">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <a href="#" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 8V4a.5.5 0 0 1 1 0v4h4a.5.5 0 0 1 0 1H9v4a.5.5 0 0 1-1 0V9H4a.5.5 0 0 1 0-1h4z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">Load More</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Well</h5>
                    <p>Wellness Balance provides healthy supplements to maintain your health</p>
                </div>
                <div class="col-md-2">
                    <h5>NAVIGATION</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>SUPPORT</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Help Centre</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>SOCIALS</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">YouTube</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2024 Natural Balance Ltd. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
