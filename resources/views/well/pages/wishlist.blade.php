<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellness Balance - Wishlist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', 'Arial', 'Avenir Next Georgian', Arial;
        }

        h1,
        h2,
        h3 {
            font-family: 'Poppins', 'Avenir Next Georgian', Arial;
            font-weight: 700;
        }

        .bold {
            font-weight: 700;
        }

        .container {
            width: 100%;
            margin: auto;
        }

        .wishlist-section {
            padding: 60px 0;
        }

        .wishlist-section h2 {
            margin-bottom: 30px;
            text-align: left;
        }

        .product-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }

        .product-info {
            display: flex;
            align-items: center;
        }

        .product-info img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }

        .product-info .product-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .product-info .product-price {
            font-size: 18px;
            color: #666;
        }

        .product-actions {
            display: flex;
            align-items: center;
        }

        .product-actions .btn-remove {
            color: #666;
            margin-left: 20px;
        }



    </style>
</head>

<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="flex-direction: column;">
        <div id="header-content"
            style="display: flex; justify-content: space-between; margin-top: 8px; margin-bottom: 8px;">
            <a class="navbar-brand" href="#">
                <img src="../../../docs/front-end-img/logo/header_logo.png" alt="Brand Logo" style="height: 40px;">
            </a>
            <button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                onclick="hideButton()">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse col-md-8" id="navbarNav">
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
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="margin-right: -40px;"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        function hideButton() {
            document.getElementById('navbar-toggler').style.display = 'none';
        }
    </script>

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

    <!-- Footer Section -->
    <footer class="footer bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="footer-logo" style="margin-bottom: 20px;">
                        <img src="../../../docs/front-end-img/logo/footer_logo.png" alt="Well Logo"
                            style="height: 50px;">
                    </div>
                    <p style="color: #aaa; width: 300px;">Wellness Balance provides healthy supplements to maintain your
                        health</p>
                </div>
                <div class="col-md-3">
                    <h5 class="footer-nav">NAVIGATION</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Shop</a></li>
                        <li><a href="#" class="text-white">About us</a></li>
                        <li><a href="#" class="text-white">Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="footer-nav">SUPPORT</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Help Centre</a></li>
                        <li><a href="#" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="footer-nav">SOCIALS</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Instagram</a></li>
                        <li><a href="#" class="text-white">Facebook</a></li>
                        <li><a href="#" class="text-white">YouTube</a></li>
                        <li><a href="#" class="text-white">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright text-center mt-4">
                <p>&copy; 2024 Natural Balance Ltd. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
