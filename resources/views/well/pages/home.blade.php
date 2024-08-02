<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellness Balance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../css/home.css">
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


        h2 {
            font-size: 60px;
            text-align: left;
        }

        .bold {
            font-weight: 700;
        }

        .medium {
            font-weight: 500;
        }

        .container {
            width: 100%;
            margin: auto;
        }

        /* -------------------- Header style  --------------------*/
        .navbar-nav li {
            padding-right: 30px;
        }


        #header-content {
            width: 100%;
            max-width: 1200px;
        }

        .navbar-toggler {
            padding: .25rem .75rem;
            font-size: 1.25rem;
            line-height: 1;
            background-color: transparent;
            border: none;
            border-radius: .25rem;
        }




        /* -------------------- Hero section  --------------------*/

        .hero-section {
            position: relative;
            max-width: 1200px;
            height: 500px;
            margin: 0 auto;
            overflow: hidden;
        }

        .hero-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 30%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: left;
        }

        .hero-content h1 {
            font-size: 90px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .hero-content p {
            font-size: 22px;
            line-height: 1.2em;
        }

        .hero-content .btn {
            margin-top: 80px;
        }


        /* -------------------- Category section style  --------------------*/
        .card {
            flex-direction: row;
        }


        .category-section,
        .best-seller-section,
        .products-section {
            padding: 60px 0;
        }

        .category-section h2,
        .best-seller-section h2 {
            margin-bottom: 30px;
        }

        .category-card {
            background-size: cover;
            background-position: center;
            position: relative;
            max-width: 384px;
            height: 480px;
            display: flex;
            align-items: flex-end;
            margin-bottom: 30px;
        }


        .category-card-title {
            font-family: Avenir;
            font-size: 40px;
            color: #fff;
            text-align: left;
            position: absolute;
            top: 10px;
            left: 10px;
            margin: 0;
            padding: 5px;
            text-shadow: 2px 2px 4px rgba(20, 23, 22, 0.2);

        }

        .category-card .card-body {
            width: 100%;
            padding: 20px;
        }


        /* -------------------- Best seller section style  --------------------*/

        .best-seller-card .card-body {
            background: rgba(255, 255, 255, 0.5);
            width: 100%;
            padding: 20px;
        }

        .best-seller-card {
            background-size: cover;
            background-position: center;
            position: relative;
            max-width: 590px;
            height: 590px;
            display: flex;
            align-items: flex-end;
            margin-bottom: 30px;
        }


        .best-seller-section h5 {
            color: #333;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 700;
        }

        .best-seller-section p {
            color: #666;
            margin-bottom: 20px;
            font-size: 15px;
        }


        .best-seller-card-right {
            width: 284px;
            height: 284px;
            background-size: cover;
            background-position: center;
        }

        .card-right {
            display: flex;
            margin-bottom: 20px;
        }

        .bs-text {
            width: 200px;
            margin-left: 20px;
            margin-top: 10px;
        }


        /* -------------------- Product section style  --------------------*/

        .products-section .img-fluid {
            height: 400px;
            object-fit: cover;
        }

        .products-section p {
            color: #666;
        }

        .products-section {
            margin-bottom: 100px;
        }



        /* -------------------- Footer style  --------------------*/

        .footer {
            padding: 40px 0 15px 0;
            background-color: #191919 !important;
        }

        .footer h5 {
            font-size: 16px;
            margin-bottom: 15px;
            font-weight: 500;
            color: #999;
        }

        .footer p {
            font-size: 15px;
        }

        .footer li {
            margin-bottom: 10px;
        }

        .footer a {
            font-size: 15px;
            font-weight: 400;
        }


        .copyright p {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
        }



        /* -------------------- Button style  --------------------*/

        .btn-primary {
            background-color: #00AB7A;
            width: 182px;
            height: 50px;
            color: #fff;
            border: none;
            border-radius: 0px;
            padding: 12px 20px;
            font-size: 17px;
            font-weight: 700;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #fff;
            color: #00AB7A;
            border: 1px solid #00AB7A;
        }

        .btn-primary:active {
            background-color: #008E65!important;
            box-shadow: none!important;
            transform: scale(0.95);
            color: #fff;
        }

        .btn-primary:focus,
        .btn-primary:focus-visible,
        .btn-primary:focus:active,
        .btn-primary:focus:hover,
        .btn-primary:focus:visited {
            outline: none;
            box-shadow: none;
            color: #fff;
            background-color: #00AB7A;
            border: none;
        }

        .btn-banner {
            background-color: #fff;
            width: 182px;
            height: 50px;
            color: #fff;
            border: none;
            border-radius: 0px;
            padding: 12px 20px;
            font-size: 17px;
            font-weight: 700;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }


        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .row-best-seller {
                flex-direction: column;
            }
        }



    </style>
</head>

<body>

    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="flex-direction: column;">
        <div id="header-content" style="display: flex; justify-content: space-between; margin-top: 8px; margin-bottom: 8px;">
            <a class="navbar-brand" href="#">
                <img src="../../../images/home/home_banner.jpg" alt="Brand Logo" style="height: 40px;">
            </a>
            <button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="hideButton()">
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
        </div> <!-- end of content -->
    </nav>
    <script>
        function hideButton() {
            document.getElementById('navbar-toggler').style.display = 'none';
        }
    </script>

    <!-- Hero Section -->
    <section class="hero-section">
        <img src="../../../images/home/home_banner.jpg" alt="Hero Image">
        <div class="hero-content">
            <h1>SALE</h1>
            <p>Skincare, fitness products, nutritional supplements</p>
            <p class="bold">Up to 50% discount, check it out</p>
            <a href="#" class="btn btn-primary">Explore</a>
        </div>
    </section>

    <!-- Category Section -->
    <section class="category-section text-center">
        <div class="container">
            <h2>Category</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card category-card" style="background-image: url('../../../docs/front-end-img/home/category_1.jpg');">
                        <h1 class="category-card-title">Skincare</h1>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card" style="background-image: url('../../../docs/front-end-img/home/category_2.jpg');">
                        <h1 class="category-card-title">Fitness</h1>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card" style="background-image: url('../../../docs/front-end-img/home/category_3.jpg');">
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
                        <div class="card best-seller-card" style="background-image: url('../../../docs/front-end-img/home/bs_1.jpg');">
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
                            <div class="best-seller-card-right" style="background-image: url('../../../docs/front-end-img/home/bs_2.jpg');">
                            </div>
                            <div class="bs-text">
                                <h5 class="bs-title">Nterdum et malesuada</h5>
                                <p>Nterdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>

                        <div class="card-right">
                            <div class="best-seller-card-right" style="background-image: url('../../../docs/front-end-img/home/bs_3.jpg');">
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
                    <img src="../../../docs/front-end-img/home/content_3.jpg" class="img-fluid" alt="Products Image">
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

    <!-- Footer -->
    <footer class="footer bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="footer-logo" style="margin-bottom: 20px;">
                        <img src="../../../docs/front-end-img/logo/footer_logo.png" alt="Well Logo" style="height: 50px;">
                    </div>
                    <p style="color: #aaa; width: 300px;">Wellness Balance provides healthy supplements to maintain your health</p>
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