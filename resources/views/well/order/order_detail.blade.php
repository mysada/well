@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container">
    <h1>Order #{{ $order->id }} Details</h1>
    <div class="order-info">
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Ordered on:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
        <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_province }}, {{ $order->shipping_country }} - {{ $order->shipping_postal_code }}</p>
        <p><strong>Billing Address:</strong> {{ $order->billing_address }}, {{ $order->billing_city }}, {{ $order->billing_province }}, {{ $order->billing_country }} - {{ $order->billing_postal_code }}</p>
        <!-- More details -->
    </div>
</div>
@endsection
