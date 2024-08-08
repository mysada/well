<!-- profile.blade.php -->
@extends('layouts.app')

@section('title', 'Profile')

@vite('resources/sass/profile.scss')

@section('content')
<div class="container profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.953 11.953 0 0112 15c2.347 0 4.548.676 6.443 1.837M16 11a4 4 0 11-8 0 4 4 0 018 0zM12 21c-4.418 0-8-3.582-8-8a8 8 0 1116 0c0 4.418-3.582 8-8 8z" />
            </svg>
        </div>
        <div class="profile-info">
            <h2>Welcome, {{ $firstName }} {{ $lastName }}!</h2>
            <p>Thank you for being a valued customer. Here you can view your order history, update your addresses, and manage your profile settings.</p>
        </div>
        <form action="{{ route('user.logout') }}" method="POST" class="logout-btn-form">
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
                    @foreach ($order->orderDetails as $detail)
                    <img src="{{ asset($detail->product->image_url) }}" alt="Product {{ $detail->product_id }}">
                    @endforeach
                    <div class="order-details">
                        <p>Order ID: #{{ $order->id }}</p>
                        <p>Product: {{ $detail->product->name }}</p>
                        <p>Quantity: {{ $detail->quantity }}</p>
                        <p>Price: ${{ number_format($detail->price, 2) }}</p>
                        <p>Total Price: ${{ number_format($detail->total_price, 2) }}</p>
                        <p>Status: {{ ucfirst($order->status) }}</p>
                        <p>Ordered on: {{ $order->created_at->format('Y-m-d') }}</p>
                    </div>
                    <button class="btn btn-secondary" onclick="location.href='{{ route('order.reorder', $order->id) }}'">Reorder</button>
                </div>
                @endforeach
            </div>

            <div id="saved-addresses" class="profile-section">
                <h4>Saved Addresses</h4>
                <h5>Billing Address</h5>
                <div class="address-box">
                    <p>{{ $user->full_name }}<br>{{ $user->billing_address }}<br>{{ $user->email }}<br>{{ $user->phone }}</p>
                </div>
                <h5>Shipping Address</h5>
                <div class="address-box">
                    <p>{{ $user->full_name }}<br>{{ $user->shipping_address }}<br>{{ $user->email }}<br>{{ $user->phone }}</p>
                </div>
            </div>

            <div id="settings" class="profile-section">
                <h4>Profile Settings</h4>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form id="profile-settings-form" method="POST" action="{{ route('user.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Personal Information -->
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" required value="{{ old('first_name', $firstName) }}">
                        @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" required value="{{ old('last_name', $lastName) }}">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email', $user->email) }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Address Information -->
                    <div class="form-group">
                        <label for="billing_address">Billing Address</label>
                        <input type="text" name="billing_address" id="billing_address" class="form-control @error('billing_address') is-invalid @enderror" required value="{{ old('billing_address', $user->billing_address) }}">
                        @error('billing_address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="billing_city">Billing City</label>
                        <input type="text" name="billing_city" id="billing_city" class="form-control @error('billing_city') is-invalid @enderror" required value="{{ old('billing_city', $user->billing_city) }}">
                        @error('billing_city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="billing_state">Billing State</label>
                        <input type="text" name="billing_state" id="billing_state" class="form-control @error('billing_state') is-invalid @enderror" required value="{{ old('billing_state', $user->billing_state) }}">
                        @error('billing_state')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="billing_zip">Billing ZIP/Postal Code</label>
                        <input type="text" name="billing_zip" id="billing_zip" class="form-control @error('billing_zip') is-invalid @enderror" required value="{{ old('billing_zip', $user->billing_zip) }}">
                        @error('billing_zip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="shipping_address">Shipping Address</label>
                        <input type="text" name="shipping_address" id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" required value="{{ old('shipping_address', $user->shipping_address) }}">
                        @error('shipping_address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="shipping_city">Shipping City</label>
                        <input type="text" name="shipping_city" id="shipping_city" class="form-control @error('shipping_city') is-invalid @enderror" required value="{{ old('shipping_city', $user->shipping_city) }}">
                        @error('shipping_city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="shipping_state">Shipping State</label>
                        <input type="text" name="shipping_state" id="shipping_state" class="form-control @error('shipping_state') is-invalid @enderror" required value="{{ old('shipping_state', $user->shipping_state) }}">
                        @error('shipping_state')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="shipping_zip">Shipping ZIP/Postal Code</label>
                        <input type="text" name="shipping_zip" id="shipping_zip" class="form-control @error('shipping_zip') is-invalid @enderror" required value="{{ old('shipping_zip', $user->shipping_zip) }}">
                        @error('shipping_zip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
