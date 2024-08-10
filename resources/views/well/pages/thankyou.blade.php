@extends('layouts.app')
@vite('resources/sass/thankyou.scss')
@section('content')
<div class="thank-you-page">
    <div class="container">
        <div class="thank-you-message text-center">
            <h1>Thank You for Your Purchase!</h1>
            <p>Your order has been placed successfully.</p>
        </div>

        <!-- Progress Tracker -->
        <div class="progress-tracker card mb-4">
            <div class="card-body">
                <h5 class="card-title">INVOICE #{{ $order->id }}</h5>
                <div class="tracker">
                    <ul class="progressbar">
                        <li class="completed">Order Processed</li>
                        <li class="{{ $order->status === 'Shipped' ? 'completed' : '' }}">Order Shipped</li>
                        <li class="{{ $order->status === 'En Route' ? 'completed' : '' }}">Order En Route</li>
                        <li class="{{ $order->status === 'Arrived' ? 'completed' : '' }}">Order Arrived</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="order-details card mb-4">
            <div class="card-body">
                <h2 class="card-title">Order Details</h2>
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                <h3>Items Ordered</h3>
                <ul class="list-group">
                    @foreach ($order->orderDetails as $item)
                    <li class="list-group-item">
                        <img src="/{{ $item->product->image_url }}" alt="{{ $item->product->name }}">
                        <div>
                            <strong>{{ $item->product->name }}</strong>
                            <span>Quantity: {{ $item->quantity }} - Price: ${{ number_format($item->price, 2) }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Payment Details -->
        <div class="payment-details card mb-4">
            <div class="card-body">
                <h2 class="card-title">Payment Details</h2>
                <p><strong>Payment Method:</strong> {{ $order->payments->first()->method }}</p>
                <p><strong>Before Tax Price:</strong> ${{ number_format($order->pre_tax_amount, 2) }}</p>
                <p><strong>GST:</strong> ${{ number_format($order->gst, 2) }}</p>
                <p><strong>PST:</strong> ${{ number_format($order->pst, 2) }}</p>
                <p><strong>Shipping Cost:</strong> ${{ number_format($order->shipping_fee, 2) }}</p>
                <p><strong>After Tax Price:</strong> ${{ number_format($order->post_tax_amount, 2) }}</p>
                <p><strong>Amount Paid:</strong> ${{ number_format($order->payments->first()->amount, 2) }}</p>
                <p><strong>Payment Status:</strong> {{ $order->payments->first()->status }}</p>
                <p><strong>Payer Name:</strong> {{ $order->payments->first()->payer_name }}</p>
            </div>
        </div>

        <!-- Shipping Details -->
        <div class="shipping-details card mb-4">
            <div class="card-body">
                <h2 class="card-title">Shipping Address</h2>
                <p><strong>Name:</strong> {{ $order->shipping_name }}</p>
                <p><strong>Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_province }}, {{ $order->shipping_country }} - {{ $order->shipping_postal_code }}</p>
                <p><strong>Email:</strong> {{ $order->shipping_email }}</p>
                <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block mt-4">Continue Shopping</a>
    </div>
</div>
@endsection
