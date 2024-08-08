document.addEventListener('DOMContentLoaded', () => {
    const quantitySelects = document.querySelectorAll('.quantity-select');

    quantitySelects.forEach(select => {
        select.addEventListener('change', event => {
            const cartItemId = event.target.getAttribute('data-cart-item-id');
            const quantity = event.target.value;
            const price = parseFloat(event.target.getAttribute('data-price'));
            const itemTotalElement = event.target.closest('tr').querySelector('.item-total');

            fetch(`/cart_items/${cartItemId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: quantity })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Updated successfully') {
                        const itemTotal = (price * quantity).toFixed(2);
                        itemTotalElement.textContent = `$${itemTotal}`;

                        document.getElementById('item-count').textContent = data.itemCount;
                        document.getElementById('subtotal').textContent = data.subtotal;
                        document.getElementById('cart-total').textContent = data.total;
                        document.getElementById('cart-item-count').textContent = data.itemCount; // Update cart count badge
                    } else if (data.message === 'Removed item successfully') {
                        event.target.closest('tr').remove();

                        document.getElementById('item-count').textContent = data.itemCount;
                        document.getElementById('subtotal').textContent = data.subtotal;
                        document.getElementById('cart-total').textContent = data.total;
                        document.getElementById('cart-item-count').textContent = data.itemCount; // Update cart count badge
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
