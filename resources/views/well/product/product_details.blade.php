<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .product-image img {
            width: 100%;
        }
        .introduction img {
            width: 100%;
            height: auto;
        }
        .related-products .card {
            margin-bottom: 1rem;
        }
        .related-products img {
            height: 200px;
            object-fit: cover;
        }
        .footer {
            background-color: #000;
            color: #fff;
            padding: 2rem 0;
        }
        .footer a {
            color: #fff;
        }

        .product-detail {
            border: 1px solid #e5e5e5;
            padding: 20px;
        }

        .product-image {
            position: relative;
        }

        .product-image img {
            max-width: 80%;
        }

        .left-arrow, .right-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            cursor: pointer;
        }

        .left-arrow {
            left: 10px;
        }

        .right-arrow {
            right: 10px;
        }

        .product-title h1{
            /*font-size: 1.5rem;*/
            font-weight: bold;
            margin-bottom: 10px;
        }
        .product-title h2{
            /*font-size: 1rem;*/
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .quantity-label {
            font-weight: bold;
            margin-right: 10px;
        }

        .quantity-input {
            width: 60px;
            margin-right: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            /*border-radius: 5px;*/
        }

        .btn-dark {
            background-color: #333;
            color: #fff;
        }

        .btn-outline-dark {
            border: 1px solid #333;
            color: #333;
            background-color: transparent;
        }

        .btn-outline-dark i {
            margin-right: 5px;
        }
        .custom-margin {
            margin-top: 80px; /* Adjust the value as needed */
        }
        .custom-margin-bottom {
            margin-bottom: 2rem; /* Adjust the value as needed */
        }

        .text-center {
            text-align: center;
        }

        .qty-input {
            color: #000;
            background: #fff;
            display: flex;
            align-items: center;
            overflow: hidden;
            border-radius: 4px;
            box-shadow: 0 1em 2em -0.9em rgba(0, 0, 0, 0.7);
        }

        .qty-input .product-qty,
        .qty-input .qty-count {
            background: transparent;
            color: inherit;
            font-weight: bold;
            font-size: inherit;
            border: none;
            display: inline-block;
            min-width: 0;
            height: 2.5rem;
            line-height: 1;
        }

        .qty-input .product-qty {
            width: 50px;
            min-width: 0;
            display: inline-block;
            text-align: center;
            appearance: textfield;
        }

        .qty-input .product-qty::-webkit-outer-spin-button,
        .qty-input .product-qty::-webkit-inner-spin-button {
            appearance: none;
            margin: 0;
        }

        .qty-input .qty-count {
            padding: 0;
            cursor: pointer;
            width: 2.5rem;
            font-size: 1.25em;
            text-indent: -100px;
            overflow: hidden;
            position: relative;
        }

        .qty-input .qty-count::before,
        .qty-input .qty-count::after {
            content: "";
            height: 2px;
            width: 10px;
            position: absolute;
            display: block;
            background: #000;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
        .qty-input .qty-count--minus {
            border-right: 1px solid #e2e2e2;
        }
        .qty-input .qty-count--add {
            border-left: 1px solid #e2e2e2;
        }
        .qty-input .qty-count--add::after {
            transform: rotate(90deg);
        }
        .qty-input .qty-count:disabled {
            color: #ccc;
            background: #f2f2f2;
            cursor: not-allowed;
            border-color: transparent;
        }
        .qty-input .qty-count:disabled::before,
        .qty-input .qty-count:disabled::after {
            background: #ccc;
        }

        .related-products {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .product-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .card {
            border: none;
            box-shadow: 4px 4px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            border-radius: 25px; /* Adjust radius as needed */
            overflow: hidden; /* Ensure children follow the border-radius */
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-top-left-radius: 25px; /* Match the card's border-radius */
            border-top-right-radius: 25px; /* Match the card's border-radius */
            height: 200px;
            object-fit: cover;
            width: 100%; /* Ensure the image covers the full width of the card */
        }

        .card-body {
            text-align: center;
            padding: 1.5rem;
        }

        .category {
            font-size: 0.875rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 1.2rem;
            color: #333;
            margin-top: 1rem;
        }

        .btn-add-cart {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }

        .btn-add-cart:hover {
            background-color: #218838;
        }

        .load-more {
            border: 1px solid #28A745; /* Same border color as plus button */
            color: #28A745; /* Same text color as plus button */
            background-color: transparent; /* Match the background with the outline button */
            width: 20%;
            font-weight: bold;
        }

        .load-more:hover {
            background-color: #28A745;
        }

    </style>
</head>
<body>

<!-- Header -->
<header class="py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">Well</h1>
        <nav>
            <a href="#" class="mx-3">Home</a>
            <a href="#" class="mx-3">Shop</a>
            <a href="#" class="mx-3">About us</a>
            <a href="#" class="mx-3">Policy</a>
        </nav>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</header>

<!-- Product Detail -->
<section class="product-detail py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="#">Shop</a> / <span>Cream Tube</span>
            </div>
            <div class="col-md-12 mb-3">
                <h2 class="product-title">Product Details</h2>
            </div>
            <div class="col-md-6 product-image position-relative">
                <img src="{{ asset('/images/detail_view/product_pic.jpg') }}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h3 class="product-title">Cream Tube</h3>
                <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                <p class="product-price text-danger">$ 9.99</p>
                   <label for="quantity" class="mr-2 custom-margin">Quantity</label>
                    <div class="d-flex align-items-center mb-4 ">
                        <div class="qty-input">
                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                            <input class="product-qty" type="number" name="product-qty" min="0" max="10" value="1">
                            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                        </div>
                        <span class="text-success "  style="margin-left: 30px;">210 in stock</span>
                    </div>
                <div class="d-flex">
                    <button class="btn btn-dark mr-3 w-50">Add to Cart</button>
                    <button class="btn btn-outline-dark w-50"> Wishlist  <i class="far fa-heart"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Introduction Images -->
<section class="introduction py-5">
    <div class="container">
        <div class="col-md-12 mb-3">
            <h2 class="product-title text-center">Introduction</h2>
        </div>
        <p class="product-description text-center">  Discover the ultimate in skin care with our premium range of products.
            Each product is formulated with natural ingredients to rejuvenate and hydrate your skin,
            leaving it feeling refreshed and radiant. Our skin care line addresses various skin concerns
            from anti-aging to deep hydration, ensuring that your skin receives the best care possible.
        </p>
        <p class="product-description text-center">  Discover the ultimate in skin care with our premium range of products.
            Each product is formulated with natural ingredients to rejuvenate and hydrate your skin,
            leaving it feeling refreshed and radiant. Our skin care line addresses various skin concerns
            from anti-aging to deep hydration, ensuring that your skin receives the best care possible.
        </p>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/detail_view/intro1.jpg') }}" alt="Introduction Image 1">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/detail_view/intro2.jpg') }}" alt="Introduction Image 2">
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="related-products py-5">
    <div class="container">
        <div class="col-md-12 custom-margin-bottom">
            <h2 class="product-title text-center">Related Products</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/list_view/list_p6.jpg') }}" class="card-img-top" alt="Related Product 1">
                    <div class="card-body">
                        <h6 class="category">Skincare</h6>
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">$ 56</p>
                            <button class="btn btn-add-cart"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/list_view/list_p7.jpg') }}" class="card-img-top" alt="Related Product 2">
                    <div class="card-body">
                        <h6 class="category">Skincare</h6>
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">$ 56</p>
                            <button class="btn btn-add-cart"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/list_view/list_p8.jpg') }}" class="card-img-top" alt="Related Product 3">
                    <div class="card-body">
                        <h6 class="category">Skincare</h6>
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">$ 56</p>
                            <button class="btn btn-add-cart"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/list_view/list_p1.jpg') }}" class="card-img-top" alt="Related Product 4">
                    <div class="card-body">
                        <h6 class="category">Skincare</h6>
                        <h5 class="card-title">Nyantuy Skincare</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">$ 56</p>
                            <button class="btn btn-add-cart"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-outline-dark load-more">Load More</button>
        </div>
    </div>
</section>





<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Well</h5>
                <p>Wellness Balance provides healthy supplements to maintain your health.</p>
            </div>
            <div class="col-md-2">
                <h5>Navigation</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Policy</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Support</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Help Centre</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Socials</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; 2024 Natural Balance Ltd. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    var QtyInput = (function () {
        let $qtyInputs = $(".qty-input");

        if (!$qtyInputs.length) {
            return;
        }

        var $inputs = $qtyInputs.find(".product-qty");
        var $countBtn = $qtyInputs.find(".qty-count");
        var qtyMin = parseInt($inputs.attr("min"));
        var qtyMax = parseInt($inputs.attr("max"));

        $inputs.change(function () {
            var $this = $(this);
            var $minusBtn = $this.siblings(".qty-count--minus");
            var $addBtn = $this.siblings(".qty-count--add");
            var qty = parseInt($this.val());

            if (isNaN(qty) || qty <= qtyMin) {
                $this.val(qtyMin);
                $minusBtn.attr("disabled", true);
            } else {
                $minusBtn.attr("disabled", false);

                if (qty >= qtyMax) {
                    $this.val(qtyMax);
                    $addBtn.attr("disabled", true);
                } else {
                    $this.val(qty);
                    $addBtn.attr("disabled", false);
                }
            }
        });

        $countBtn.click(function () {
            var operator = this.dataset.action;
            var $this = $(this);
            var $input = $this.siblings(".product-qty");
            var qty = parseInt($input.val());

            if (operator == "add") {
                qty += 1;
                if (qty >= qtyMin + 1) {
                    $this.siblings(".qty-count--minus").attr("disabled", false);
                }

                if (qty >= qtyMax) {
                    $this.attr("disabled", true);
                }
            } else {
                qty = qty <= qtyMin ? qtyMin : (qty -= 1);

                if (qty == qtyMin) {
                    $this.attr("disabled", true);
                }

                if (qty < qtyMax) {
                    $this.siblings(".qty-count--add").attr("disabled", false);
                }
            }

            $input.val(qty);
        });
    })();

</script>
</body>
</html>
