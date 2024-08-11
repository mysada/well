@extends('layouts.app')
@vite('resources/sass/thankyou.scss')
@section('content')
<div class="thank-you-page"> <!-- Keep the same class for the outer div -->
    <div class="container">
        <!-- Order Details Section -->
        <div class="order-details card border-custom mb-4">
            <div class="card-body text-center">
                <div class="thank-you-message">
                    <h1>Order Details</h1> <!-- Updated the message here -->
                    <p>Here are the details of your order.</p> <!-- Updated message -->
                </div>

                <div class="order-status mt-4">
                    <p class="status-label">Order Status:</p>
                    <span class="status-badge">{{ ucfirst($order->status) }}</span>
                </div>

                <div class="order-info mt-4">
                    <p><strong>Order Number:</strong> {{ $order->id }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Payment Details Section -->
            <div class="payment-details card border-custom mb-4 col-md-6">
                <div class="card-header bg-custom">
                    <h2 class="card-title">Payment Details</h2>
                </div>
                <div class="card-body">
                    @foreach ($order->payments as $payment)
                    <p><strong>Payment Method:</strong> {{ $payment->method }}</p>
                    <p><strong>Amount Paid:</strong> ${{ number_format($payment->amount, 2) }}</p>
                    <p><strong>GST:</strong> ${{ number_format($order->gst, 2) }}</p>
                    <p><strong>PST:</strong> ${{ number_format($order->pst, 2) }}</p>
                    <p><strong>Shipping Cost:</strong> ${{ number_format($order->shipping_rate, 2) }}</p> <!-- Updated line -->
                    <p><strong>Before Tax Price:</strong> ${{ number_format($order->pre_tax_amount, 2) }}</p>
                    <p><strong>After Tax Price:</strong> ${{ number_format($order->post_tax_amount, 2) }}</p>
                    <p><strong>Payment Status:</strong> {{ $payment->status }}</p>
                    <p><strong>Payer Name:</strong> {{ $payment->payer_name }}</p>
                    @endforeach
                </div>
            </div>

            <!-- Shipping Address Section -->
            <div class="shipping-details card border-custom mb-4 col-md-6">
                <div class="card-header bg-custom">
                    <h2 class="card-title">Shipping Address</h2>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $order->shipping_name }}</p>
                    <p><strong>Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_province }}, {{ $order->shipping_country }} - {{ $order->shipping_postal_code }}</p>
                    <p><strong>Email:</strong> {{ $order->shipping_email }}</p>
                    <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
                </div>
            </div>
        </div>

        <!-- Items Ordered Section -->
        <div class="items-ordered card border-custom mb-4">
            <div class="card-header bg-custom">
                <h2 class="card-title">Items Ordered</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($order->orderDetails as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="item-image">
                            <img src="/{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="img-fluid">
                        </div>
                        <div class="item-details">
                            <strong>{{ $item->product->name }} : </strong>
                            <span>{{ $item->quantity }} X </span>
                            <span class="item-price">${{ number_format($item->price, 2) }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Buttons Section -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('user.profile') }}" class="btn btn-custom btn-lg">Go Back (Profile)</a>
            <a href="{{ route('order.reorder', $order->id) }}" class="btn btn-custom btn-lg">Reorder</a>
        </div>
    </div>
</div>
@endsection
