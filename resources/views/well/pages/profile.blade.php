<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/sass/profile.scss')
    <title>{{ $title }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add unique styles here if needed */
    </style>
</head>
<body>

<div class="container profile-container">

    <div class="profile-header">
        <div class="profile-avatar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.953 11.953 0 0112 15c2.347 0 4.548.676 6.443 1.837M16 11a4 4 0 11-8 0 4 4 0 018 0zM12 21c-4.418 0-8-3.582-8-8a8 8 0 1116 0c0 4.418-3.582 8-8 8z" />
            </svg>
        </div>
        <div class="profile-info">
            @php
                $nameParts = explode(' ', Auth::user()->full_name, 2);
                $firstName = $nameParts[0] ?? '';
                $lastName = $nameParts[1] ?? '';
            @endphp
            <h2>Welcome, {{ $firstName }} {{ $lastName }}!</h2>
            <p>Thank you for being a valued customer. Here you can view your order history, update your addresses, and manage your profile settings.</p>
        </div>
        <form action="{{ route('profile.logout') }}" method="POST" class="logout-btn-form">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>

    <div class="d-flex profile-content">
        <div class="profile-sidebar">
            <h4>Profile Options</h4>
            <a href="#order-history">Order History</a>
            <a href="#saved-addresses">Saved Addresses</a>
            <a href="#settings">Settings</a>
        </div>

        <div class="profile-main-content">
            <div id="order-history" class="profile-section">
                <h4>Order History</h4>
                @foreach ($orders as $order)
                    <div class="order-item">
                        <img src="/public/images/cart/list_p{{ $order->id }}.jpg" alt="Product {{ $order->id }}">
                        <div class="order-details">
                            <p>Order ID: #{{ $order->id }}</p>
                            <p>Quantity: {{ $order->quantity }}</p>
                            <p>Price: ${{ number_format($order->price, 2) }}</p>
                            <p>Ordered on: {{ $order->created_at->format('Y-m-d') }}</p>
                            <p>Status: <b>{{ ucfirst($order->status) }}</b></p>
                        </div>
                        <button class="btn btn-secondary">Reorder</button>
                    </div>
                @endforeach
            </div>

            <div id="saved-addresses" class="profile-section">
                <h4>Saved Addresses</h4>
                <h5>Billing Address</h5>
                <div class="address-box">
                    <p>{{ Auth::user()->full_name }}<br>{{ Auth::user()->address }}<br>Toronto, ON<br>Canada<br>{{ Auth::user()->email }}<br>{{ Auth::user()->phone }}</p>
                </div>
                <h5>Shipping Address</h5>
                <div class="address-box">
                    <p>{{ Auth::user()->full_name }}<br>{{ Auth::user()->address }}<br>Toronto, ON<br>Canada<br>{{ Auth::user()->email }}<br>{{ Auth::user()->phone }}</p>
                </div>
            </div>

            <div id="settings" class="profile-section">
                <h4>Profile Settings</h4>
                <form id="profile-settings-form">
                    <input type="text" name="first-name" placeholder="First Name" required value="{{ $firstName }}">
                    <input type="text" name="last-name" placeholder="Last Name" required value="{{ $lastName }}">
                    <input type="email" name="email" placeholder="Email" required value="{{ Auth::user()->email }}">
                    <input type="tel" name="phone" placeholder="Phone Number" required value="{{ Auth::user()->phone }}">
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        // Add your logout functionality here
        alert('Logout button clicked');
    }
</script>

</body>
</html>
