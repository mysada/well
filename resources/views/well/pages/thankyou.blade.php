@extends('layouts.app')
@section('content')
<div class="thank-you-page">
    <div class="container">
        <div class="thank-you-message">
            <h1>Thank You for Your Purchase!</h1>
            <p>Your order has been placed successfully.</p>
        </div>

        <div class="order-details">
            <h2>Order Details</h2>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
            <p><strong>Total Amount:</strong> ${{ number_format($order->post_tax_amount, 2) }}</p>

            <h3>Items Ordered</h3>
            <ul>
                @foreach ($order->orderDetails as $item)
                <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: ${{ number_format($item->price, 2) }}</li>
                @endforeach
            </ul>
        </div>

        <div class="payment-details">
            <h2>Payment Details</h2>
            @foreach ($order->payments as $payment)
            <p><strong>Payment Method:</strong> {{ $payment->method }}</p>
            <p><strong>Amount Paid:</strong> ${{ number_format($payment->amount, 2) }}</p>
            <p><strong>Payment Status:</strong> {{ $payment->status }}</p>
            <p><strong>Payer Name:</strong> {{ $payment->payer_name }}</p>
            @endforeach
        </div>

        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
</div>
@endsection
