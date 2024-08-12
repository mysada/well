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
                <!-- Shipping Address -->
                <input type="hidden" name="order-id" value="{{ old('order-id', $id) }}">
                @php
                $defaultAddress = \App\Models\DefaultAddress::where('user_id', $user->id)->first();
                @endphp

                <div class="form-section">
                    <h4>Shipping Address</h4>
                    <div class="error-container">
                        <input type="text" name="shipping-name" placeholder="Name"
                               class="form-control @error('shipping-name') is-invalid @enderror"
                               value="{{ old('shipping-name', $defaultAddress->shipping_name ?? $user->shipping_name ?? '') }}" required>
                        @error('shipping-name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="shipping-address" placeholder="Address"
                               class="form-control @error('shipping-address') is-invalid @enderror"
                               value="{{ old('shipping-address', $defaultAddress->shipping_address ?? $user->shipping_address ?? '') }}" required>
                        @error('shipping-address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="shipping-city" placeholder="City"
                               class="form-control @error('shipping-city') is-invalid @enderror"
                               value="{{ old('shipping-city', $defaultAddress->shipping_city ?? $user->shipping_city ?? '') }}" required>
                        @error('shipping-city')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <select id="shipping-country" name="shipping-country" class="form-control @error('shipping-country') is-invalid @enderror" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country['code'] }}" {{ old('shipping-country', $defaultAddress->shipping_country ?? $user->shipping_country ?? '') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                        @error('shipping-country')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <select id="shipping-state" name="shipping-state" class="form-control" style="display: none;" required>
                            <!-- States will be populated based on country selection -->
                        </select>
                        @error('shipping-state')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="shipping-zip" placeholder="ZIP/Postal Code"
                               class="form-control @error('shipping-zip') is-invalid @enderror"
                               value="{{ old('shipping-zip', $defaultAddress->shipping_postal_code ?? $user->shipping_postal_code ?? '') }}" required>
                        @error('shipping-zip')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="email" name="shipping-email" placeholder="Email"
                               class="form-control @error('shipping-email') is-invalid @enderror"
                               value="{{ old('shipping-email', $defaultAddress->shipping_email ?? $user->email ?? '') }}" required>
                        @error('shipping-email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="tel" name="shipping-phone" placeholder="Phone"
                               class="form-control @error('shipping-phone') is-invalid @enderror"
                               value="{{ old('shipping-phone', $defaultAddress->shipping_phone ?? $user->phone ?? '') }}" required>
                        @error('shipping-phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Checkbox to Toggle Billing Address -->
                <div class="checkout-section form-section">
                    <input type="checkbox" id="same-address" name="same-address" {{ old('same-address') ? 'checked' : '' }}>
                    <label for="same-address">Billing address is same as shipping address</label>
                </div>

                <!-- Billing Address -->
                <div id="billing-address-section" class="bill-form form-section">
                    <h4>Billing Address</h4>
                    <div class="error-container">
                        <input type="text" name="billing-name" placeholder="Name"
                               class="form-control @error('billing-name') is-invalid @enderror"
                               value="{{ old('billing-name', $defaultAddress->billing_name ?? $user->billing_name ?? '') }}" required>
                        @error('billing-name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="billing-address" placeholder="Address"
                               class="form-control @error('billing-address') is-invalid @enderror"
                               value="{{ old('billing-address', $defaultAddress->billing_address ?? $user->billing_address ?? '') }}" required>
                        @error('billing-address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="billing-city" placeholder="City"
                               class="form-control @error('billing-city') is-invalid @enderror"
                               value="{{ old('billing-city', $defaultAddress->billing_city ?? $user->billing_city ?? '') }}" required>
                        @error('billing-city')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <select id="billing-country" name="billing-country" class="form-control @error('billing-country') is-invalid @enderror" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country['code'] }}" {{ old('billing-country', $defaultAddress->billing_country ?? $user->billing_country ?? '') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                        @error('billing-country')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <select id="billing-state" name="billing-state" class="form-control" style="display: none;" required>
                            <!-- States will be populated based on country selection -->
                        </select>
                        @error('billing-state')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="billing-zip" placeholder="ZIP/Postal Code"
                               class="form-control @error('billing-zip') is-invalid @enderror"
                               value="{{ old('billing-zip', $defaultAddress->billing_postal_code ?? $user->billing_postal_code ?? '') }}" required>
                        @error('billing-zip')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="email" name="billing-email" placeholder="Email"
                               class="form-control @error('billing-email') is-invalid @enderror"
                               value="{{ old('billing-email', $defaultAddress->billing_email ?? $user->billing_email ?? '') }}" required>
                        @error('billing-email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="tel" name="billing-phone" placeholder="Phone"
                               class="form-control @error('billing-phone') is-invalid @enderror"
                               value="{{ old('billing-phone', $defaultAddress->billing_phone ?? $user->billing_phone ?? '') }}" required>
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
                               value="{{ old('card-number',4111111111111111)}}" required>
                        @error('card-number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="card-name" placeholder="Cardholder Name"
                               class="form-control @error('card-name') is-invalid @enderror"
                               value="{{ old('card-name','Tom') }}" required>
                        @error('card-name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="error-container">
                        <input type="text" name="card-expiry" placeholder="Expiry Date (MM/YY)"
                               class="form-control @error('card-expiry') is-invalid @enderror"
                               value="{{ old('card-expiry','0418') }}" required>
                        @error('card-expiry')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
      }
    </style>
    <section class="py-5">
        <div class="container d-flex">
            <!-- Form Container -->
            <div class="flex-fill">
                <form id="shipping-form" action="{{ route('checkout.process') }}" method="post" novalidate>
                    @csrf
                    <input type="hidden" name="order-id" value="{{ old('order-id', $id) }}">
                    <!-- Shipping Address -->

                    <div class="form-section">
                        <h4>Shipping Address</h4>
                        <div class="error-container">
                            <input type="text" name="shipping-name" placeholder="Name"
                                   class="form-control @error('shipping-name') is-invalid @enderror"
                                   value="{{ old('shipping-name', $user->name ?? '') }}">
                            @error('shipping-name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-address" placeholder="Address"
                                   class="form-control @error('shipping-address') is-invalid @enderror"
                                   value="{{ old('shipping-address', $user->shipping_address ?? '') }}">
                            @error('shipping-address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-city" placeholder="City"
                                   class="form-control @error('shipping-city') is-invalid @enderror"
                                   value="{{ old('shipping-city') }}">
                            @error('shipping-city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input id="shipping-state" name="shipping-state" placeholder="Province/State"
                                   value="{{ old('shipping-state') }}" class="form-control">
                            <select id="ca-province" name="shipping-state" class="form-control" style="display: none;">
                                @foreach($provinces as $province)
                                    <option value="{{ $province['short_name'] }}" {{ old('shipping-state') === $province['short_name'] ? 'selected' : '' }}>
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
                                    <option value="{{ $country['code'] }}" {{ old('shipping-country') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                            @error('shipping-country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="shipping-zip" placeholder="ZIP/Postal Code"
                                   class="form-control @error('shipping-zip') is-invalid @enderror"
                                   value="{{ old('shipping-zip') }}">
                            @error('shipping-zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="email" name="shipping-email" placeholder="Email"
                                   class="form-control @error('shipping-email') is-invalid @enderror"
                                   value="{{ old('shipping-email', $user->email ?? '') }}">
                            @error('shipping-email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="tel" name="shipping-phone" placeholder="Phone"
                                   class="form-control @error('shipping-phone') is-invalid @enderror"
                                   value="{{ old('shipping-phone', $user->phone ?? '') }}">
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
                                   value="{{ old('billing-name', $user->name ?? '') }}">
                            @error('billing-name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-address" placeholder="Address"
                                   class="form-control @error('billing-address') is-invalid @enderror"
                                   value="{{ old('billing-address', $user->billing_address ?? '') }}">
                            @error('billing-address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-city" placeholder="City"
                                   class="form-control @error('billing-city') is-invalid @enderror"
                                   value="{{ old('billing-city') }}">
                            @error('billing-city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input id="billing-state" placeholder="Province/City" name="billing-state"
                                   value="{{ old('billing-state') }}" class="form-control"/>
                            @error('billing-state')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <select id="billing-country" name="billing-country"
                                    class="form-control @error('billing-country') is-invalid @enderror">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country['code'] }}" {{ old('billing-country') == $country['code'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                            @error('billing-country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="billing-zip" placeholder="ZIP/Postal Code"
                                   class="form-control @error('billing-zip') is-invalid @enderror"
                                   value="{{ old('billing-zip') }}">
                            @error('billing-zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="email" name="billing-email" placeholder="Email"
                                   class="form-control @error('billing-email') is-invalid @enderror"
                                   value="{{ old('billing-email', $user->email ?? '') }}">
                            @error('billing-email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="tel" name="billing-phone" placeholder="Phone"
                                   class="form-control @error('billing-phone') is-invalid @enderror"
                                   value="{{ old('billing-phone', $user->phone ?? '') }}">
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
                                   value="{{ old('card-number',4111111111111111)}}">
                            @error('card-number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-name" placeholder="Cardholder Name"
                                   class="form-control @error('card-name') is-invalid @enderror"
                                   value="{{ old('card-name','Tom') }}">
                            @error('card-name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="text" name="card-expiry" placeholder="Expiry Date (MM/YY)"
                                   class="form-control @error('card-expiry') is-invalid @enderror"
                                   value="{{ old('card-expiry','0418') }}">
                            @error('card-expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="error-container">
                            <input type="number" name="card-cvc" placeholder="CVC"
                                   class="form-control @error('card-cvc') is-invalid @enderror"
                                   value="{{ old('card-cvc','333') }}">
                            @error('card-cvc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-checkout-custom">Place Order</button>
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
