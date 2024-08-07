@extends('layouts.app')
@vite('resources/sass/billing.scss')
@section('content')
<section class="py-5">
    <div class="container d-flex">
        <!-- Form Container -->
        <div class="flex-fill">
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

            <!-- Shipping Address -->
            <div class="form-section">
                <h4>Shipping Address</h4>
                <form id="shipping-form">
                    <input type="text" name="shipping-name" placeholder="Name" required>
                    <input type="text" name="shipping-address" placeholder="Address" required>
                    <input type="text" name="shipping-city" placeholder="City" required>
                    <select name="shipping-country" id="shipping-country" required>
                        <option value="">Select Country</option>
                        <option value="Canada">Canada</option>
                        <option value="USA">USA</option>
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
                        <option value="Canada">Canada</option>
                        <option value="USA">USA</option>
                    </select>
                    <select name="billing-state" id="billing-state" required>
                        <!-- States will be populated based on country selection -->
                    </select>
                    <input type="text" name="billing-zip" placeholder="ZIP/Postal Code" required>
                    <input type="email" name="billing-email" placeholder="Email" required>
                    <input type="tel" name="billing-phone" placeholder="Phone" required>
                </form>
            </div>

            <!-- Coupon Code -->
            <div class="form-section mt-4">
                <h4>Coupon Code</h4>
                <input type="text" name="coupon-code" placeholder="Enter Coupon Code" required>
            </div>

            <a href="#" class="btn btn-checkout-custom mt-4">Proceed to Checkout</a>
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary ml-4 sticky-form">
            <h4>Cart Summary</h4>
            <div class="item">
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
            <div class="item">
                <img src="/public/images/cart/list_p2.jpg" alt="Product 2">
                <div class="item-details">
                    <h5>Organic Shampoo</h5>
                    <p class="item-price">$22.00</p>
                </div>
                <div class="item-quantity">
                    <button class="btn-decrement">-</button>
                    <input type="text" value="2" readonly>
                    <button class="btn-increment">+</button>
                </div>
            </div>
            <div class="tax-breakdown">
                <p><strong>Subtotal:</strong> $78.00</p>
                <p><strong>GST:</strong> $0.00</p>
                <p><strong>PST:</strong> $0.00</p>
                <p><strong>HST:</strong> $0.00</p>
            </div>
            <div class="total-price">Total: $78.00</div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/billing.js') }}"></script>
@endsection
