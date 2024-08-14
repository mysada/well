@extends('layouts.app')
@vite('resources/sass/cart.scss')
@vite('resources/js/cart.js')
@section('content')
    <section class="cart py-5">
        <div class="container">
            <h2 class="cart-title">Shopping Cart</h2>

            @if($cartItems->isEmpty())
                <p>Your cart is empty. Start adding items to your cart to see them here!</p>
            @else
                <div class="cart-layout">
                    <div class="cart-items">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartItems as $cartItem)
                                    @if($cartItem->product)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($cartItem->product->image_url) }}" alt="{{ $cartItem->product->name }}" class="img-thumbnail">
                                                <span>{{ $cartItem->product->name }}</span>
                                            </td>
                                            <td>${{ number_format($cartItem->product->price, 2) }}</td>
                                            <td>
                                                <select class="form-control quantity-select" data-cart-item-id="{{ $cartItem->id }}" data-price="{{ $cartItem->product->price }}">
                                                    @for($i = 1; $i <= $cartItem->product->stock; $i++)
                                                        <option value="{{ $i }}" {{ $cartItem->quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td class="item-total">${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</td>
                                            <td>
                                                <div class="actions">
                                                    <form id="remove-item-{{ $cartItem->id }}" action="{{ route('CartItemDestroy', $cartItem->id) }}" method="POST" class="d-inline remove-item-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger p-0">Remove</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="6">Product information not available for cart item ID: {{ $cartItem->id }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cart-summary">
                        <h4 class="summary-title">Order Summary</h4>
                        <p>Items: <span id="item-count">{{ $cartItems->sum('quantity') }}</span></p>
                        <p>Subtotal: $<span id="subtotal">{{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></p>
                        <p class="total">Total: $<span id="cart-total">{{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></p>
                        <form action="{{ route('OrderStore') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">Go to Checkout</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
