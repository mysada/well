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
                <form id="shipping-form" action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <input type="text" name="shipping-name" placeholder="Name" value="{{ old('shipping-name') }}" required>
                    <input type="text" name="shipping-address" placeholder="Address" value="{{ old('shipping-address') }}" required>
                    <input type="text" name="shipping-city" placeholder="City" value="{{ old('shipping-city') }}" required>
                    <select name="shipping-country" id="shipping-country" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{ $country['code'] }}" {{ old('shipping-country') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                        @endforeach
                    </select>
                    <select name="shipping-state" id="shipping-state" style="display: none;" required>
                        <!-- States will be populated based on country selection -->
                    </select>
                    <input type="text" name="shipping-zip" placeholder="ZIP/Postal Code" value="{{ old('shipping-zip') }}" required>
                    <input type="email" name="shipping-email" placeholder="Email" value="{{ old('shipping-email') }}" required>
                    <input type="tel" name="shipping-phone" placeholder="Phone" value="{{ old('shipping-phone') }}" required>

                    <!-- Checkbox to Toggle Billing Address -->
                    <div class="checkout-section form-section">
                        <input type="checkbox" id="same-address" {{ old('same-address') ? 'checked' : '' }}>
                        <label for="same-address">Billing address is same as shipping address</label>
                    </div>

                    <!-- Billing Address -->
                    <div id="billing-address-section" class="form-section">
                        <h4>Billing Address</h4>
                        <input type="text" name="billing-name" placeholder="Name" value="{{ old('billing-name') }}" required>
                        <input type="text" name="billing-address" placeholder="Address" value="{{ old('billing-address') }}" required>
                        <input type="text" name="billing-city" placeholder="City" value="{{ old('billing-city') }}" required>
                        <select name="billing-country" id="billing-country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country['code'] }}" {{ old('billing-country') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                        <select name="billing-state" id="billing-state" style="display: none;" required>
                            <!-- States will be populated based on country selection -->
                        </select>
                        <input type="text" name="billing-zip" placeholder="ZIP/Postal Code" value="{{ old('billing-zip') }}" required>
                        <input type="email" name="billing-email" placeholder="Email" value="{{ old('billing-email') }}" required>
                        <input type="tel" name="billing-phone" placeholder="Phone" value="{{ old('billing-phone') }}" required>
                    </div>

                    <!-- Payment Information -->
                    <div class="form-section">
                        <h4>Payment Information</h4>
                        <input type="text" name="card-number" placeholder="Card Number" value="{{ old('card-number') }}" required>
                        <input type="text" name="card-name" placeholder="Cardholder Name" value="{{ old('card-name') }}" required>
                        <input type="text" name="card-expiry" placeholder="Expiry Date (MM/YY)" value="{{ old('card-expiry') }}" required>
                        <input type="text" name="card-cvc" placeholder="CVC" value="{{ old('card-cvc') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-checkout-custom">Place Order</button>
                </form>
            </div>
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


