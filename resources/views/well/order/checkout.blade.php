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
                <form id="shipping-form" action="{{ route('checkout.process') }}" method="post" novalidate>
                    @csrf
                    <input type="hidden" name="order-id" value="{{ old('order-id', $id) }}">
                    <div class="form-section">
                        <h4>Shipping Address</h4>
                        <div class="error-container">
                            <input type="text" name="shipping-name" placeholder="Name"
                                   class="form-control @error('shipping-name') is-invalid @enderror"
                                   value="{{ old('shipping-name', $defaultAddr->shipping_name ?? '') }}">
                            @error('shipping-name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-address" placeholder="Address"
                                   class="form-control @error('shipping-address') is-invalid @enderror"
                                   value="{{ old('shipping-address', $defaultAddr->shipping_address ?? '') }}">
                            @error('shipping-address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-city" placeholder="City"
                                   class="form-control @error('shipping-city') is-invalid @enderror"
                                   value="{{ old('shipping-city', $defaultAddr->shipping_city ?? '') }}">
                            @error('shipping-city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input id="shipping-state" name="shipping-state" placeholder="Province/State"
                                   value="{{ old('shipping-state', $defaultAddr->shipping_province ?? '') }}"
                                   class="form-control">
                            <select id="ca-province" name="shipping-state" class="form-control" style="display: none;">
                                @foreach($provinces as $province)
                                    <option value="{{ $province['short_name'] }}"
                                            {{ old('shipping-state', $defaultAddr->shipping_province ?? '') === $province['short_name'] ? 'selected' : '' }}>
                                        {{ $province['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('shipping-state')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <select id="shipping-country" name="shipping-country"
                                    class="form-control @error('shipping-country') is-invalid @enderror">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country['code'] }}"
                                            {{ old('shipping-country', $defaultAddr->shipping_country ?? '') == $country['code'] ? 'selected' : '' }}>
                                        {{ $country['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('shipping-country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-zip" placeholder="ZIP/Postal Code"
                                   class="form-control @error('shipping-zip') is-invalid @enderror"
                                   value="{{ old('shipping-zip', $defaultAddr->shipping_postal_code ?? '') }}">
                            @error('shipping-zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="email" name="shipping-email" placeholder="Email"
                                   class="form-control @error('shipping-email') is-invalid @enderror"
                                   value="{{ old('shipping-email', $defaultAddr->shipping_email ?? '') }}">
                            @error('shipping-email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="tel" name="shipping-phone" placeholder="Phone"
                                   class="form-control @error('shipping-phone') is-invalid @enderror"
                                   value="{{ old('shipping-phone', $defaultAddr->shipping_phone ?? '') }}">
                            @error('shipping-phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Checkbox to Toggle Billing Address -->
                    <div class="checkout-section form-section">
                        <input type="checkbox" id="same-address"
                               name="same-address" {{ old('same-address') ? 'checked' : '' }}>
                        <label for="same-address">Billing address is same as shipping address</label>
                    </div>

                    <!-- Billing Address -->
                    <div id="billing-address-section" class="bill-form form-section"
                         @if(old('same-address'))
                             style="display: none"
                            @endif
                    >
                        <h4>Billing Address</h4>
                        <div class="error-container">
                            <input type="text" name="billing-name" placeholder="Name"
                                   class="form-control @error('billing-name') is-invalid @enderror"
                                   value="{{ old('billing-name', $defaultAddr->billing_name ?? '') }}">
                            @error('billing-name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-address" placeholder="Address"
                                   class="form-control @error('billing-address') is-invalid @enderror"
                                   value="{{ old('billing-address', $defaultAddr->billing_address ?? '') }}">
                            @error('billing-address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-city" placeholder="City"
                                   class="form-control @error('billing-city') is-invalid @enderror"
                                   value="{{ old('billing-city', $defaultAddr->billing_city ?? '') }}">
                            @error('billing-city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input id="billing-state" placeholder="Province/City" name="billing-state"
                                   value="{{ old('billing-state', $defaultAddr->billing_province ?? '') }}"
                                   class="form-control"/>
                            @error('billing-state')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <select id="billing-country" name="billing-country"
                                    class="form-control @error('billing-country') is-invalid @enderror">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country['code'] }}" {{ old('billing-country', $defaultAddr->billing_country ?? '') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                            @error('billing-country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-zip" placeholder="ZIP/Postal Code"
                                   class="form-control @error('billing-zip') is-invalid @enderror"
                                   value="{{ old('billing-zip', $defaultAddr->billing_postal_code ?? '') }}">
                            @error('billing-zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="email" name="billing-email" placeholder="Email"
                                   class="form-control @error('billing-email') is-invalid @enderror"
                                   value="{{ old('billing-email', $defaultAddr->billing_email ?? '') }}">
                            @error('billing-email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="tel" name="billing-phone" placeholder="Phone"
                                   class="form-control @error('billing-phone') is-invalid @enderror"
                                   value="{{ old('billing-phone', $defaultAddr->billing_phone ?? '') }}">
                            @error('billing-phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="form-section">
                        <h4>Payment Information</h4>
                        <div class="error-container">
                            <input type="number" name="card-number" placeholder="Card Number"
                                   class="form-control @error('card-number') is-invalid @enderror"
                                   value="{{ old('card-number') }}">
                            @error('card-number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-name" placeholder="Cardholder Name"
                                   class="form-control @error('card-name') is-invalid @enderror"
                                   value="{{ old('card-name') }}">
                            @error('card-name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-expiry" placeholder="Expiration Date (MM/YY)"
                                   class="form-control @error('card-expiry') is-invalid @enderror"
                                   value="{{ old('card-expiry') }}">
                            @error('card-expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-cvc" placeholder="CVC"
                                   class="form-control @error('card-cvc') is-invalid @enderror"
                                   value="{{ old('card-cvc') }}">
                            @error('card-cvc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-section">
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </form>
            </div>
            <!-- Cart Summary -->
            <div class="cart-summary ml-4 sticky-form">
                <h4>Order Summary</h4>

                <div class="tax-breakdown">
                    <p><strong>Subtotal:</strong> $<span id="subtotal">{{ $order['pre_tax_amount'] }}</span></p>
                    <p><strong>Quantity:</strong> <span id="quantity">{{ $order['quantity'] }}</span></p>
                    <p><strong>GST:</strong> $<span id="gst">0.00</span></p>
                    <p><strong>PST:</strong> $<span id="pst">0.00</span></p>
                    <p><strong>Shipping Rate:</strong> $<span id="shipping_rate">0.00</span></p>
                </div>
                <div class="total-price"><strong>Total:</strong> $<span id="cart-total">0.00</span></div>
            </div>
        </div>
    </section>
@endsection
