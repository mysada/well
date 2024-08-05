@extends('layouts.app')

@push('styles')
    @vite('resources/sass/cart.scss')
@endpush

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

@push('scripts')
<script>
    document.querySelectorAll('.btn-decrement').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.nextElementSibling;
            let value = parseInt(input.value);
            if (value > 0) {
                input.value = value - 1;
                updateTotal();
            }
        });
    });

    document.querySelectorAll('.btn-increment').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            let value = parseInt(input.value);
            input.value = value + 1;
            updateTotal();
        });
    });

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.cart-item').forEach(item => {
            const price = parseFloat(item.querySelector('.item-price').textContent.replace('$', ''));
            const quantity = parseInt(item.querySelector('.item-quantity input').value);
            total += price * quantity;
        });
        document.querySelector('.total-price').textContent = `Total: $${total.toFixed(2)}`;
    }

    // Initialize total on page load
    updateTotal();
</script>
@endpush
