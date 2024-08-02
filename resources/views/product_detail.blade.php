<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
      height: 150px;
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
        <div class="col-md-6 product-image">
          <img src="product-image.jpg" alt="Product Image">
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

  <!-- Introduction Images -->
  <section class="introduction py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="introduction1.jpg" alt="Introduction Image 1">
        </div>
        <div class="col-md-6">
          <img src="introduction2.jpg" alt="Introduction Image 2">
        </div>
      </div>
    </div>
  </section>

  <!-- Related Products -->
  <section class="related-products py-5">
    <div class="container">
      <h3>Related Products</h3>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <img src="related1.jpg" class="card-img-top" alt="Related Product 1">
            <div class="card-body">
              <h5 class="card-title">Nyantuy Skincare</h5>
              <p class="card-text">$ 56</p>
              <button class="btn btn-outline-primary btn-block">Add to Cart</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="related2.jpg" class="card-img-top" alt="Related Product 2">
            <div class="card-body">
              <h5 class="card-title">Nyantuy Skincare</h5>
              <p class="card-text">$ 56</p>
              <button class="btn btn-outline-primary btn-block">Add to Cart</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="related3.jpg" class="card-img-top" alt="Related Product 3">
            <div class="card-body">
              <h5 class="card-title">Nyantuy Skincare</h5>
              <p class="card-text">$ 56</p>
              <button class="btn btn-outline-primary btn-block">Add to Cart</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="related4.jpg" class="card-img-top" alt="Related Product 4">
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
</body>
</html>