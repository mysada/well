<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', 'Arial', 'Avenir Next Georgian', Arial;
    }

    h1, h2, h3 {
      font-family: 'Poppins', 'Avenir Next Georgian', Arial;
      font-weight: 700;
    }

    h2 {
      font-size: 60px;
      text-align: left;
    }

    .category-list a {
      display: block;
      padding: 10px 15px;
      margin-bottom: 10px;
      font-size: 18px;
      font-weight: 500;
      color: #000;
      text-decoration: none;
      border: 2px solid transparent;
      border-radius: 5px;
    }

    .category-list a:hover,
    .category-list .active-category {
      border-color: #00AB7A;
      background-color: #00AB7A;
      color: #fff;
    }

    .product-card {
      border: 1px solid #e1e1e1;
      border-radius: 8px;
      margin-bottom: 20px;
      position: relative;
    }

    .product-card img {
      height: 250px;
      object-fit: cover;
    }

    .btn-add {
      background-color: #00AB7A;
      width: 50px;
      height: 50px;
      color: #fff;
      border: none;
      border-radius: 50%;
      font-size: 24px;
      font-weight: 700;
      text-align: center;
      line-height: 50px;
      position: absolute;
      bottom: 20px;
      right: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-add:hover {
      background-color: #fff;
      color: #00AB7A;
      border: 1px solid #00AB7A;
    }

    .btn-add:active {
      background-color: #008E65;
      transform: scale(0.95);
      color: #fff;
    }

    .btn-add:focus,
    .btn-add:focus-visible,
    .btn-add:focus:active,
    .btn-add:focus:hover,
    .btn-add:focus:visited {
      outline: none;
      box-shadow: none;
      color: #fff;
      background-color: #00AB7A;
      border: none;
    }

    .footer {
      background-color: #191919;
      color: #fff;
      padding: 2rem 0;
    }

    .footer a {
      color: #fff;
      text-decoration: none;
    }

    .btn-load-more {
      background-color: #00AB7A;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: 700;
      transition: background-color 0.3s ease, transform 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-load-more:hover {
      background-color: #fff;
      color: #00AB7A;
      border: 1px solid #00AB7A;
    }

    .btn-load-more:active {
      background-color: #008E65;
      transform: scale(0.95);
      color: #fff;
    }

    .pagination {
      margin-top: 20px;
    }

    .page-item {
      border-radius: 5px;
      margin: 0 5px;
    }

    .page-link {
      background-color: #00AB7A;
      color: #fff;
      border: 1px solid #00AB7A;
      padding: 10px 15px;
      font-size: 16px;
      font-weight: 700;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .page-link:hover {
      background-color: #fff;
      color: #00AB7A;
      border: 1px solid #00AB7A;
    }

    .page-link:active {
      background-color: #008E65;
      transform: scale(0.95);
      color: #fff;
    }

    .page-item.active .page-link {
      background-color: #008E65;
      border: 1px solid #008E65;
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
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p2.jpg" class="card-img-top" alt="Product 2">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p3.jpg" class="card-img-top" alt="Product 3">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p4.jpg" class="card-img-top" alt="Product 4">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p6.jpg" class="card-img-top" alt="Product 5">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p7.jpg" class="card-img-top" alt="Product 6">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p8.jpg" class="card-img-top" alt="Product 7">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p8.jpg" class="card-img-top" alt="Product 8">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card product-card">
                <img src="/images/list_view/list_p9.jpg" class="card-img-top" alt="Product 9">
                <div class="card-body">
                  <h5 class="card-title">Nyantuy Skincare</h5>
                  <p class="card-text">$ 56</p>
                  <button class="btn-add">+</button>
                </div>
              </div>
            </div>
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
