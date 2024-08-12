@extends('layouts.app')
@section('title', 'Profile')
@vite('resources/js/profile.js')
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
            <a href="#" class="profile-link" data-section="order-history">Order History</a>
            <a href="#" class="profile-link" data-section="saved-addresses">Saved Addresses</a>
            <a href="#" class="profile-link" data-section="settings">Settings</a>
            <a href="#" class="profile-link" data-section="reviews">Reviews</a>
        </div>

        <div class="profile-main-content">
            <!-- Order History -->
            <div id="order-history" class="profile-section">
                <h4>Order History</h4>
                @if($orders->isEmpty())
                <p>You haven't placed any orders yet.</p>
                @else
                @foreach ($orders as $order)
                <div class="order-item">
                    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                    <p><strong>Total Price:</strong> ${{ number_format($order->orderDetails->sum('price'), 2) }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                    <p><strong>Items Ordered:</strong></p>
                    <ul>
                        @foreach ($order->orderDetails as $detail)
                        <li>{{ $detail->product->name }}</li>
                        @endforeach
                    </ul>
                    <div class="buttons-section mt-4">
                        <button onclick="location.href='{{ route('order.reorder', $order->id) }}'">Reorder</button>
                        <button id="order_detail" onclick="location.href='{{ route('order.details', $order->id) }}'">Order Deatils</button>
                    </div>


                </div>
                @endforeach
                @endif
            </div>

            <!-- Saved Addresses -->
            <div id="saved-addresses" class="profile-section" style="display:none;">
                <h4>Saved Addresses</h4>

                <!-- Last Two Orders' Addresses -->
                @foreach ($lastOrders as $index => $order)
                @if ($order->payments->isNotEmpty())
                @php $payment = $order->payments->first(); @endphp
                <div class="address-box">
                    <h5>Address {{ $index + 1 }}</h5>
                    <h6>Billing Address</h6>
                    <p>{{ $payment->billing_name }}<br>{{ $payment->billing_address }}, {{ $payment->billing_city }}, {{ $payment->billing_province }}, {{ $payment->billing_country }} - {{ $payment->billing_postal_code }}<br>{{ $payment->billing_email }}<br>{{ $payment->billing_phone }}</p>
                    <h6>Shipping Address</h6>
                    <p>{{ $order->shipping_name }}<br>{{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_province }}, {{ $order->shipping_country }} - {{ $order->shipping_postal_code }}<br>{{ $order->shipping_email }}<br>{{ $order->shipping_phone }}</p>
                </div>
                @endif
                @endforeach

                <!-- Default Addresses -->
                @if ($defaultAddress)
                <div class="address-box">
                    <h4>Default Address</h4>
                    <h6>Default Shipping Address</h6>
                    <p>{{ $defaultAddress->shipping_name }}<br>{{ $defaultAddress->shipping_address }}, {{ $defaultAddress->shipping_city }}, {{ $defaultAddress->shipping_province }}, {{ $defaultAddress->shipping_country }} - {{ $defaultAddress->shipping_postal_code }}<br>{{ $defaultAddress->shipping_email }}<br>{{ $defaultAddress->shipping_phone }}</p>
                    <h6>Default Billing Address</h6>
                    <p>{{ $defaultAddress->billing_name }}<br>{{ $defaultAddress->billing_address }}, {{ $defaultAddress->billing_city }}, {{ $defaultAddress->billing_province }}, {{ $defaultAddress->billing_country }} - {{ $defaultAddress->billing_postal_code }}<br>{{ $defaultAddress->billing_email }}<br>{{ $defaultAddress->billing_phone }}</p>

                </div>
                @else
                <p>No default address set.</p>
                @endif
            </div>

            <!-- Profile Settings -->
            <div id="settings" class="profile-section" style="display:none;">
                <h4>Profile Settings</h4>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Basic Info Update Form -->
                <h5 id="update_head">Update Basic Info</h5>
                <form method="POST" action="{{ route('user.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $firstName) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $lastName) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                    </div>
                    <div id="update_buttons">
                        <button type="submit" id="update_button" class="btn btn-primary">Update Info</button>
                    </div>
                </form>

                <!-- Update Default Address Form -->
                <h5 id="update_head">Update Default Address</h5>
                <form method="POST" action="{{ route('user.setDefaultAddress') }}">

                    @csrf
                    <div class="form-group">
                        <label for="shipping_name">Shipping Name</label>
                        <input type="text" name="shipping_name" id="shipping_name" class="form-control" value="{{ old('shipping_name', $defaultAddress->shipping_name ?? $user->shipping_name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_address">Shipping Address</label>
                        <input type="text" name="shipping_address" id="shipping_address" class="form-control" value="{{ old('shipping_address', $defaultAddress->shipping_address ?? $user->shipping_address) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_city">Shipping City</label>
                        <input type="text" name="shipping_city" id="shipping_city" class="form-control" value="{{ old('shipping_city', $defaultAddress->shipping_city ?? $user->shipping_city) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_province">Shipping Province</label>
                        <input type="text" name="shipping_province" id="shipping_province" class="form-control" value="{{ old('shipping_province', $defaultAddress->shipping_province ?? $user->shipping_province) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_country">Shipping Country</label>
                        <input type="text" name="shipping_country" id="shipping_country" class="form-control" value="{{ old('shipping_country', $defaultAddress->shipping_country ?? $user->shipping_country) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_postal_code">Shipping Postal Code</label>
                        <input type="text" name="shipping_postal_code" id="shipping_postal_code" class="form-control" value="{{ old('shipping_postal_code', $defaultAddress->shipping_postal_code ?? $user->shipping_postal_code) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_email">Shipping Email</label>
                        <input type="email" name="shipping_email" id="shipping_email" class="form-control" value="{{ old('shipping_email', $defaultAddress->shipping_email ?? $user->shipping_email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_phone">Shipping Phone</label>
                        <input type="tel" name="shipping_phone" id="shipping_phone" class="form-control" value="{{ old('shipping_phone', $defaultAddress->shipping_phone ?? $user->shipping_phone) }}" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="billing_name">Billing Name</label>
                        <input type="text" name="billing_name" id="billing_name" class="form-control" value="{{ old('billing_name', $defaultAddress->billing_name ?? $user->billing_name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="billing_address">Billing Address</label>
                        <input type="text" name="billing_address" id="billing_address" class="form-control" value="{{ old('billing_address', $defaultAddress->billing_address ?? $user->billing_address) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="billing_city">Billing City</label>
                        <input type="text" name="billing_city" id="billing_city" class="form-control" value="{{ old('billing_city', $defaultAddress->billing_city ?? $user->billing_city) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="billing_province">Billing Province</label>
                        <input type="text" name="billing_province" id="billing_province" class="form-control" value="{{ old('billing_province', $defaultAddress->billing_province ?? $user->billing_province) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="billing_country">Billing Country</label>
                        <input type="text" name="billing_country" id="billing_country" class="form-control" value="{{ old('billing_country', $defaultAddress->billing_country ?? $user->billing_country) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="billing_postal_code">Billing Postal Code</label>
                        <input type="text" name="billing_postal_code" id="billing_postal_code" class="form-control" value="{{ old('billing_postal_code', $defaultAddress->billing_postal_code ?? $user->billing_postal_code) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="billing_email">Billing Email</label>
                        <input type="email" name="billing_email" id="billing_email" class="form-control" value="{{ old('billing_email', $defaultAddress->billing_email ?? $user->billing_email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="billing_phone">Billing Phone</label>
                        <input type="tel" name="billing_phone" id="billing_phone" class="form-control" value="{{ old('billing_phone', $defaultAddress->billing_phone ?? $user->billing_phone) }}" required>
                    </div>

                    <button type="submit" id="update_button" class="btn btn-primary">Update Default Address</button>
                </form>
            </div>

            <!-- Reviews -->
            <div id="reviews" class="profile-section" style="display:none;">
                <h4>Reviews</h4>
                <div class="review-list">
                    @if($user->reviews->isEmpty())
                    <p>You haven't written any reviews yet.</p>
                    @else
                    @foreach ($user->reviews as $review)
                    <div class="review mb-4">
                        <div class="review-header">
                            <div class="review-user-info d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="50" height="50" class="avatar-svg">
                                    <path fill-rule="evenodd" d="M12 2a5 5 0 100 10 5 5 0 000-10zM3.5 18a8.5 8.5 0 0117 0v2a1 1 0 01-1 1h-15a1 1 0 01-1-1v-2z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <h5 class="user-name">{{ $user->full_name }}</h5>
                                    <p class="review-date">Posted on {{ $review->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <div class="review-rating">
                                @for ($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $review->rating > $i ? '#f8ce0b' : '#ccc' }}" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M12 17.27L18.18 21 16.54 14.19 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.95L5.82 21z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </svg>
                                @endfor
                            </div>
                        </div>
                        <div class="review-body">
                            <p class="review-text">{{ $review->review_text }}</p>
                            @if($review->image)
                            <div class="review-image">
                                <img src="{{ asset('storage/' . $review->image) }}" alt="Review Image" class="img-fluid" style="max-width: 150px;">
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

                <!-- Pending Reviews -->
                <div class="pending-reviews">
                    <h4>Pending Reviews</h4>
                    @if($pendingReviews->isEmpty())
                    <p>You have reviewed all your purchased products.</p>
                    @else
                    @foreach ($pendingReviews as $order)
                    @foreach ($order->orderDetails as $detail)
                    <div class="pending-review-item">
                        <p><strong>Product Name:</strong> {{ $detail->product->name }}</p>
                        <img src="{{ asset($detail->product->image_url) }}" alt="Product Image" class="img-fluid" width="100px">
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                        <p><strong>Price:</strong> ${{ number_format($detail->price, 2) }}</p>
                        <a href="{{ route('reviews.store1', $detail->product->id) }}" id="update_button" class="btn btn-primary">Write a Review</a>
                    </div>
                    @endforeach
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
