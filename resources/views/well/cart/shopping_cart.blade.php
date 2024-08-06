@extends('layouts.app')

@vite('resources/sass/cart.scss')
@vite('resources/js/cart.js')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="cart-item">
            <img src="/public/images/cart/list_p1.jpg" alt="Product 1">
            <div class="item-details">
                <h5>Nyantuy Skincare</h5>
                <p class="item-price">$56.00</p>
            </div>
            <div class="item-quantity">
                <button class="btn-decrement">-</button>
                <input type="text" value="1" readonly>
                <button class="btn-increment">+</button>
            </div>
        </div>
        <div class="cart-item">
            <img src="/public/images/cart/list_p2.jpg" alt="Product 2">
            <div class="item-details">
                <h5>Nyantuy Skincare</h5>
                <p class="item-price">$56.00</p>
            </div>
            <div class="item-quantity">
                <button class="btn-decrement">-</button>
                <input type="text" value="1" readonly>
                <button class="btn-increment">+</button>
            </div>
        </div>
        <!-- cart-item -->
        <div class="text-right">
            <p class="total-price">Total: $56.00</p>
        </div>
        <div class="text-right">
            <a href="{{ route('payment.create') }}" class="btn btn-checkout">Proceed to Checkout</a>
        </div>
    </div>
</section>
@endsection

