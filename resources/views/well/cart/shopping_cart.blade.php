@extends('layouts.app')
@vite('resources/sass/cart.scss')
@vite('resources/js/cart.js')

@section('content')
    <section class="py-5">
        <div class="container">
            @foreach($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ asset($item->product->image_url) }}" alt="{{ $item->product->name }}">
                    <div class="item-details">
                        <h5>{{ $item->product->name }}</h5>
                        <p class="item-price">${{ number_format($item->price, 2) }}</p>
                    </div>
                    <div class="item-quantity">
                        <form action="{{ route('CartItemUpdate', ['cart_item' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn-decrement">-</button>
                            <input type="text" value="{{ $item->quantity }}" readonly>
                            <button class="btn-increment">+</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <!-- cart-item -->
            <div class="text-right">
                <p class="total-price">Total: ${{ number_format($cartItems->sum('total_price'), 2) }}</p>
            </div>
            <div class="text-right">
                <a href="#" class="btn btn-checkout">Proceed to Checkout</a>
            </div>
        </div>
    </section>
@endsection
