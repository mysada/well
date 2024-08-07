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
                <div id="shipping-errors"></div>
                <form id="shipping-form">
                    @csrf
                    <div class="error-container">
                        <input type="text" name="shipping-name" placeholder="Name" value="{{ old('shipping-name') }}" required>
                        <div id="shipping-name-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="shipping-address" placeholder="Address" value="{{ old('shipping-address') }}" required>
                        <div id="shipping-address-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="shipping-city" placeholder="City" value="{{ old('shipping-city') }}" required>
                        <div id="shipping-city-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <select id="shipping-country" name="shipping-country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country['code'] }}" {{ old('shipping-country') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                        <div id="shipping-country-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <select id="shipping-state" name="shipping-state" style="display: none;" required>
                            <!-- States will be populated based on country selection -->
                        </select>
                        <div id="shipping-state-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="shipping-zip" placeholder="ZIP/Postal Code" value="{{ old('shipping-zip') }}" required>
                        <div id="shipping-zip-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="email" name="shipping-email" placeholder="Email" value="{{ old('shipping-email') }}" required>
                        <div id="shipping-email-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="tel" name="shipping-phone" placeholder="Phone" value="{{ old('shipping-phone') }}" required>
                        <div id="shipping-phone-error" class="error-message"></div>
                    </div>
                </form>
            </div>

            <!-- Checkbox to Toggle Billing Address -->
            <div class="checkout-section form-section">
                <input type="checkbox" id="same-address" {{ old('same-address') ? 'checked' : '' }}>
                <label for="same-address">Billing address is same as shipping address</label>
            </div>

            <!-- Billing Address -->
            <div id="billing-address-section" class="form-section">
                <h4>Billing Address</h4>
                <div id="billing-errors"></div>
                <form id="billing-form">
                    @csrf
                    <div class="error-container">
                        <input type="text" name="billing-name" placeholder="Name" value="{{ old('billing-name') }}" required>
                        <div id="billing-name-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="billing-address" placeholder="Address" value="{{ old('billing-address') }}" required>
                        <div id="billing-address-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="billing-city" placeholder="City" value="{{ old('billing-city') }}" required>
                        <div id="billing-city-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <select id="billing-country" name="billing-country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country['code'] }}" {{ old('billing-country') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                        <div id="billing-country-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <select id="billing-state" name="billing-state" style="display: none;" required>
                            <!-- States will be populated based on country selection -->
                        </select>
                        <div id="billing-state-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="billing-zip" placeholder="ZIP/Postal Code" value="{{ old('billing-zip') }}" required>
                        <div id="billing-zip-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="email" name="billing-email" placeholder="Email" value="{{ old('billing-email') }}" required>
                        <div id="billing-email-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="tel" name="billing-phone" placeholder="Phone" value="{{ old('billing-phone') }}" required>
                        <div id="billing-phone-error" class="error-message"></div>
                    </div>
                </form>
            </div>

            <!-- Payment Information -->
            <div class="form-section">
                <h4>Payment Information</h4>
                <div id="payment-errors"></div>
                <form id="payment-form">
                    @csrf
                    <div class="error-container">
                        <input type="text" name="card-number" placeholder="Card Number" value="{{ old('card-number') }}" required>
                        <div id="card-number-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="card-name" placeholder="Cardholder Name" value="{{ old('card-name') }}" required>
                        <div id="card-name-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="card-expiry" placeholder="Expiry Date (MM/YY)" value="{{ old('card-expiry') }}" required>
                        <div id="card-expiry-error" class="error-message"></div>
                    </div>

                    <div class="error-container">
                        <input type="text" name="card-cvc" placeholder="CVC" value="{{ old('card-cvc') }}" required>
                        <div id="card-cvc-error" class="error-message"></div>
                    </div>
                </form>
            </div>

            <a href="#" class="btn btn-primary btn-checkout-custom">Place Order</a>
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
