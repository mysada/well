@extends('layouts.app')
@vite('resources/sass/cart.scss')
@vite('resources/js/cart.js')
@section('content')
    <section class="cart py-5">
        <div class="container">
            <h2 class="cart-title">Shopping Cart</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if($cartItems->isEmpty())
                <p>Your cart is empty.</p>
            @else
                <div class="row">
                    <div class="col-md-8">
                        @foreach($cartItems as $cartItem)
                            @if($cartItem->product)
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset($cartItem->product->image_url) }}" class="card-img-top" alt="{{ $cartItem->product->name }}">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="store-info">
                                                @if($cartItem->product->store)
                                                    <h5>{{ $cartItem->product->store->name }}</h5>
                                                    <span>{{ $cartItem->product->store->feedback }} positive feedback</span>
                                                @else
                                                    <h5>Store information not available</h5>
                                                @endif
                                            </div>
                                            <div class="product-details">
                                                <h5>{{ $cartItem->product->name }}</h5>
                                                <p>${{ number_format($cartItem->product->price, 2) }}</p>
                                            </div>
                                            <div class="product-actions">
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary btn-sm qty-btn" type="button" data-action="minus" data-cart-item-id="{{ $cartItem->id }}">-</button>
                                                    <input type="number" name="quantity" class="form-control w-25 text-center" value="{{ $cartItem->quantity }}" min="1" readonly>
                                                    <button class="btn btn-outline-secondary btn-sm qty-btn" type="button" data-action="add" data-cart-item-id="{{ $cartItem->id }}">+</button>
                                                </div>
                                                <div class="actions">
                                                    <a href="#" class="text-muted">Save for later</a> |
                                                    <form action="{{ route('CartItemDestroy', $cartItem->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger p-0">Remove</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <p class="total">${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Product information not available for cart item ID: {{ $cartItem->id }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <div class="cart-summary">
                            <h4>Summary</h4>
                            <p>Items ({{ $cartItems->count() }}): ${{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</p>
                            <p>Shipping: $0.00</p> <!-- Adjust as necessary -->
                            <p class="total">Total: ${{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</p>
                            <button class="btn btn-primary btn-block">Go to Checkout</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
