<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Well - Wellness Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
        }
        .banner {
            background-color: #f8f9fa;
            padding: 2rem 0;
        }
        .category-sidebar {
            background-color: #f8f9fa;
            padding: 1rem;
        }
        .product-card {
            margin-bottom: 1.5rem;
        }
        .product-card img {
            height: 200px;
            object-fit: cover;
        }
        .add-to-cart {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 1.2rem;
            line-height: 1;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Well</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Policy</a></li>
                </ul>
                <div class="ms-2">
                    <button class="btn btn-outline-dark"><i class="bi bi-cart"></i></button>
                    <button class="btn btn-outline-dark"><i class="bi bi-person"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <div class="banner">
        <div class="container">
            <h1 class="text-center">Wellness Products</h1>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="category-sidebar">
                    <h4>Category</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-dark">Best Seller</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">Skincare</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">Fitness</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">Supplements</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                  
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p1.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                   
               
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p2.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p3.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p4.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p5.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p6.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p7.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p8.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="card product-card">
                            <img src="/images/list_view/list_p9.jpg" class="card-img-top" alt="Nyantuy Skincare">
                            <div class="card-body">
                                <h5 class="card-title">Nyantuy Skincare</h5>
                                <p class="card-text">$56</p>
                                <button class="add-to-cart float-end">+</button>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <button class="btn btn-outline-primary d-block mx-auto mt-4">Load More</button>
            </div>
        </div>
    </div>

    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Well</h5>
                    <p>Wellness Balance provides healthy supplements to maintain your health</p>
                </div>
                <div class="col-md-2">
                    <h5>NAVIGATION</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Shop</a></li>
                        <li><a href="#" class="text-white">About us</a></li>
                        <li><a href="#" class="text-white">Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>SUPPORT</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Help Centre</a></li>
                        <li><a href="#" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>SOCIALS</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Instagram</a></li>
                        <li><a href="#" class="text-white">Facebook</a></li>
                        <li><a href="#" class="text-white">YouTube</a></li>
                        <li><a href="#" class="text-white">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="text-center">&copy; 2024 Natural Balance Ltd. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>