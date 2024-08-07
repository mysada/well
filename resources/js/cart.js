document.querySelectorAll('.btn-decrement').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.nextElementSibling;
        let value = parseInt(input.value);
        if (value > 0) {
            input.value = value - 1;
            if (input.closest('form').classList.contains('guest-cart-item-form')) {
                // Handle guest cart item update (using cookies)
                updateGuestCartItem(this.closest('.cart-item'), input.value);
            } else {
                // Submit form for authenticated user
                input.closest('form').submit();
            }
            updateTotal();
        }
    });
});

document.querySelectorAll('.btn-increment').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.previousElementSibling;
        let value = parseInt(input.value);
        input.value = value + 1;
        if (input.closest('form').classList.contains('guest-cart-item-form')) {
            // Handle guest cart item update (using cookies)
            updateGuestCartItem(this.closest('.cart-item'), input.value);
        } else {
            // Submit form for authenticated user
            input.closest('form').submit();
        }
        updateTotal();
    });
});

function updateGuestCartItem(cartItem, quantity) {
    // Get the product ID from the cart item element
    const productId = cartItem.dataset.productId;

    // Get the existing cart items from cookies
    let cartItems = JSON.parse(getCookie('cart_items') || '[]');

    // Update the quantity of the specific item in the cart
    cartItems = cartItems.map(item => {
        if (item.product_id == productId) {
            return { ...item, quantity };
        }
        return item;
    });

    // Remove items with zero quantity
    cartItems = cartItems.filter(item => item.quantity > 0);

    // Update the cart items in cookies
    setCookie('cart_items', JSON.stringify(cartItems), 7);
}

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

// Cookie utility functions
function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
