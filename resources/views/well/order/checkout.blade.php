@extends('layouts.app')
@vite('resources/sass/checkout.scss')
@vite('resources/js/checkout.js')
@section('content')
    <style>
      .error-container {
        margin-bottom: 1em;
      }
    </style>
    <section class="py-5">
        <div class="container d-flex">
            <!-- Form Container -->
            <div class="flex-fill">
                <form id="shipping-form" action="{{route('checkout.process')}}" method="post">
                    @csrf
                    <!-- Shipping Address -->
                    <div class="form-section">
                        <h4>Shipping Address</h4>
                        <div class="error-container">
                            <input type="text" name="shipping-name" placeholder="Name"
                                   value="{{ old('shipping-name', $user->name ?? '') }}" required>
                            <div id="shipping-name-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-address" placeholder="Address"
                                   value="{{ old('shipping-address', $user->shipping_address ?? '') }}" required>
                            <div id="shipping-address-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-city" placeholder="City"
                                   value="{{ old('shipping-city') }}" required>
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
                            <input type="text" name="shipping-zip" placeholder="ZIP/Postal Code"
                                   value="{{ old('shipping-zip') }}" required>
                            <div id="shipping-zip-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="email" name="shipping-email" placeholder="Email"
                                   value="{{ old('shipping-email', $user->email ?? '') }}" required>
                            <div id="shipping-email-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="tel" name="shipping-phone" placeholder="Phone"
                                   value="{{ old('shipping-phone', $user->phone ?? '') }}" required>
                            <div id="shipping-phone-error" class="error-message"></div>
                        </div>
                    </div>

                    <!-- Checkbox to Toggle Billing Address -->
                    <div class="checkout-section form-section">
                        <input type="checkbox" id="same-address" {{ old('same-address') ? 'checked' : '' }}><label
                                for="same-address">Billing address is same as shipping address</label>

                    </div>

                    <!-- Billing Address -->
                    <div id="billing-address-section" class="bill-form form-section">
                        <h4>Billing Address</h4>
                        <div class="error-container">
                            <input type="text" name="billing-name" placeholder="Name"
                                   value="{{ old('billing-name', $user->name ?? '') }}" required>
                            <div id="billing-name-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-address" placeholder="Address"
                                   value="{{ old('billing-address', $user->billing_address ?? '') }}" required>
                            <div id="billing-address-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-city" placeholder="City" value="{{ old('billing-city') }}"
                                   required>
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
                            <input type="text" name="billing-zip" placeholder="ZIP/Postal Code"
                                   value="{{ old('billing-zip') }}" required>
                            <div id="billing-zip-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="email" name="billing-email" placeholder="Email"
                                   value="{{ old('billing-email', $user->email ?? '') }}" required>
                            <div id="billing-email-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="tel" name="billing-phone" placeholder="Phone"
                                   value="{{ old('billing-phone', $user->phone ?? '') }}" required>
                            <div id="billing-phone-error" class="error-message"></div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="form-section">
                        <h4>Payment Information</h4>
                        <div class="error-container">
                            <input type="text" name="amount" placeholder="Amount" value="{{ old('amount') }}" required>
                            <div id="amount-error" class="error-message"></div>
                        </div>
                        <div class="error-container">
                            <input type="text" name="card-number" placeholder="Card Number"
                                   value="{{ old('card-number') }}" required>
                            <div id="card-number-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-name" placeholder="Cardholder Name"
                                   value="{{ old('card-name') }}" required>
                            <div id="card-name-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-expiry" placeholder="Expiry Date (MM/YY)"
                                   value="{{ old('card-expiry') }}" required>
                            <div id="card-expiry-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-cvc" placeholder="CVC" value="{{ old('card-cvc') }}" required>
                            <div id="card-cvc-error" class="error-message"></div>
                        </div>

                        <div class="error-container">
                            <select name="card-type" required>
                                <option value="">Select Card Type</option>
                                <option value="visa" {{ old('card-type') == 'visa' ? 'selected' : '' }}>Visa</option>
                                <option value="mastercard" {{ old('card-type') == 'mastercard' ? 'selected' : '' }}>
                                    MasterCard
                                </option>
                                <option value="amex" {{ old('card-type') == 'amex' ? 'selected' : '' }}>American
                                    Express
                                </option>
                            </select>
                            <div id="card-type-error" class="error-message"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-checkout-custom">Place Order</button>
                </form>
            </div>

            <!-- Cart Summary -->
            <div class="cart-summary ml-4 sticky-form">
                <h4>Order Summary</h4>

                <div class="tax-breakdown">
                    <p><strong>Subtotal:</strong> $<span
                                id="subtotal">{{$order['price']}}</span>
                    </p>
                    <p><strong>Quantity:</strong> <span
                                id="quantity">{{$order['quantity']}}</span>
                    </p>
                    <p><strong>GST (5%):</strong> $<span
                                id="gst"></span>
                    </p>
                    <p><strong>PST (7%):</strong> $<span
                                id="pst"></span>
                    </p>
                </div>
                <div class="total-price"><strong>Total:</strong> $<span
                            id="cart-total"></span>
                </div>
            </div>
        </div>
    </section>
@endsection
