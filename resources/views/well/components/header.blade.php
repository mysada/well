<!-- Header Section -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="flex-direction: column;">
    <div id="header-content" class="d-flex justify-content-between my-2">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/images/logo/header_logo.png" alt="Brand Logo" style="height: 40px;">
        </a>

        <div class="navbar-collapse collapse col-md-8" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ route('products.index') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact.page') }}">Contact Us</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('WishlistIndex') }}">Wishlist</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    <!-- Cart Icon with Badge -->
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="{{ route('CartIndex') }}">
                            <i class="fas fa-shopping-cart custom-cart-icon"></i>
                            <span class="badge bg-danger" id="cart-item-count">
                                {{ \App\Models\CartItem::where('user_id', Auth::id())->sum('quantity') }}
                            </span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
        <button id="navbar-toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
