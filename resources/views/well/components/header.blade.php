<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellness Balance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Header styles */
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

        /* Footer styles */
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
    </style>
</head>
<body>
<!-- Header Section -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="flex-direction: column;">
    <div id="header-content" class="d-flex justify-content-between my-2">
        <a class="navbar-brand" href="#">
            <img src="/images/logo/header_logo.png" alt="Brand Logo" style="height: 40px;">
        </a>
        <button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="hideButton()">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse col-md-8" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/products') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/policy') }}">Help&Contact</a>
                </li>


                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<script>
    function hideButton() {
        document.getElementById('navbar-toggler').style.display = 'none';
    }
</script>
</body>
</html>
