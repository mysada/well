@extends('admin.admin')

@section('content')
    <div class="container mx-auto flex flex-col gap-4 p-4">

        <!-- Order Summary -->
        <div class="bg-base-100 shadow-xl rounded-lg p-4">
            <div class="flex flex-wrap gap-4">
                <!-- Order Summary -->
                <div class="flex-1">
                    <h3 class="text-lg font-bold">Order Summary</h3>
                    <div class="space-y-2">
                        <p><strong>Status:</strong> <span class="badge badge-primary">{{ $order->status }}</span></p>
                        <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
                        <p><strong>Total Amount:</strong> ${{ number_format($order->post_tax_amount, 2) }}</p>
                        <p><strong>Items:</strong> {{ $order->quantity }}</p>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="flex-1">
                    <h3 class="text-lg font-bold">Customer Information</h3>
                    <div class="space-y-2">
                        <p><strong>Name:</strong> {{ $order->shipping_name }}</p>
                        <p><strong>Email:</strong> {{ $order->shipping_email }}</p>
                        <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
                    </div>
                </div>

                <div class="flex-1">
                    <h3 class="text-lg font-bold">Shipping Address</h3>
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_city }}
                        , {{ $order->shipping_province }} {{ $order->shipping_postal_code }}</p>
                    <p>{{ $order->shipping_country }}</p>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="bg-base-100 shadow-xl rounded-lg p-4 mt-6">
            <h3 class="text-lg font-bold">Order Items</h3>
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>${{ number_format($detail->price, 2) }}</td>
                                <td>${{ number_format($detail->total_price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <p><strong>Subtotal:</strong> ${{ number_format($order->pre_tax_amount, 2) }}</p>
                <p><strong>GST:</strong> ${{ number_format($order->gst, 2) }}</p>
                <p><strong>PST:</strong> ${{ number_format($order->pst, 2) }}</p>
                <p class="text-lg font-bold"><strong>Total:</strong> ${{ number_format($order->post_tax_amount, 2) }}
                </p>
            </div>
        </div>

        <!-- Billing Address and Payment Information -->
        <div class="bg-base-100 shadow-xl rounded-lg p-4 mt-6">
            <h3 class="text-lg font-bold">Billing Address</h3>
            <p>{{ $order->billing_address }}</p>
            <p>{{ $order->billing_city }}, {{ $order->billing_province }} {{ $order->billing_postal_code }}</p>
            <p>{{ $order->billing_country }}</p>

            <h3 class="text-lg font-bold mt-4">Payment Information</h3>
            @foreach ($order->payments as $payment)
                <div class="bg-base-200 p-4 rounded-lg mb-4">
                    <p><strong>Method:</strong> {{ $payment->method }}</p>
                    <p><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
                    <p><strong>Status:</strong> <span class="badge badge-ghost">{{ $payment->status }}</span></p>
                    <p><strong>Payer Name:</strong> {{ $payment->payer_name }}</p>
                    <p><strong>Card:</strong> {{ $payment->payer_card }}</p>
                </div>
            @endforeach
        </div>

        <!-- Transactions -->
        <div class="bg-base-100 shadow-xl rounded-lg p-4 mt-6">
            <h3 class="text-lg font-bold">Transactions</h3>
            <div class="overflow-x-auto">
                <table class="table table-compact w-full">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction_type }}</td>
                                <td>${{ number_format($transaction->amount, 2) }}</td>
                                <td>{{ $transaction->currency }}</td>
                                <td><span class="badge badge-ghost">{{ $transaction->status }}</span></td>
                                <td>{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
