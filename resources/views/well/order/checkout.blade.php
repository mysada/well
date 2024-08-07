@extends('layouts.app')
@vite('resources/sass/checkout.scss')
@vite('resources/js/checkout.js')

@section('content')
<section class="py-5">
    <div class="container d-flex">
        <!-- Form Container -->
        <div class="flex-fill">
            <!-- Shipping Address -->
            <div class="form-section">
                <h4>Shipping Address</h4>
                <form id="shipping-form">
                    <input type="text" name="shipping-name" placeholder="Name" required>
                    <input type="text" name="shipping-address" placeholder="Address" required>
                    <input type="text" name="shipping-city" placeholder="City" required>
                    <select name="shipping-country" id="shipping-country" required>
                        <option value="">Select Country</option>
                    </select>
                    <select name="shipping-state" id="shipping-state" required>
                        <!-- States will be populated based on country selection -->
                    </select>
                    <input type="text" name="shipping-zip" placeholder="ZIP/Postal Code" required>
                    <input type="email" name="shipping-email" placeholder="Email" required>
                    <input type="tel" name="shipping-phone" placeholder="Phone" required>
                </form>
            </div>

            <!-- Checkbox to Toggle Billing Address -->
            <div class="checkout-section form-section">
                <input type="checkbox" id="same-address">
                <label for="same-address">Billing address is same as shipping address</label>
            </div>

            <!-- Billing Address -->
            <div id="billing-address-section" class="form-section">
                <h4>Billing Address</h4>
                <form id="billing-form">
                    <input type="text" name="billing-name" placeholder="Name" required>
                    <input type="text" name="billing-address" placeholder="Address" required>
                    <input type="text" name="billing-city" placeholder="City" required>
                    <select name="billing-country" id="billing-country" required>
                        <option value="">Select Country</option>
                    </select>
                    <select name="billing-state" id="billing-state" required>
                        <!-- States will be populated based on country selection -->
                    </select>
                    <input type="text" name="billing-zip" placeholder="ZIP/Postal Code" required>
                    <input type="email" name="billing-email" placeholder="Email" required>
                    <input type="tel" name="billing-phone" placeholder="Phone" required>
                </form>
            </div>

            <!-- Payment Information -->
            <div class="form-section">
                <h4>Payment Information</h4>
                <form id="payment-form">
                    <input type="text" name="card-number" placeholder="Card Number" required>
                    <input type="text" name="card-name" placeholder="Cardholder Name" required>
                    <input type="text" name="card-expiry" placeholder="Expiry Date (MM/YY)" required>
                    <input type="text" name="card-cvc" placeholder="CVC" required>
                </form>
            </div>

            <a href="#" class="btn btn-primary">Place Order</a>
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary ml-4 sticky-form">
            <h4>Order Summary</h4>
            @foreach ($cartItems as $cartItem)
            @if($cartItem->product)
            <div class="item">
                <div class="item-details">
                    <p>{{ $cartItem->product->name }} x {{ $cartItem->quantity }} = ${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</p>
                </div>
            </div>
            @endif
            @endforeach
            <div class="tax-breakdown">
                <p><strong>Subtotal:</strong> $<span id="subtotal">{{ number_format($cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></p>
                <p><strong>GST (5%):</strong> $<span id="gst">{{ number_format(0.05 * $cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></p>
                <p><strong>PST (7%):</strong> $<span id="pst">{{ number_format(0.07 * $cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></p>
            </div>
            <div class="total-price"><strong>Total:</strong> $<span id="cart-total">{{ number_format(1.12 * $cartItems->sum(fn($item) => $item->product ? $item->product->price * $item->quantity : 0), 2) }}</span></div>
        </div>
    </div>
</section>
@endsection
