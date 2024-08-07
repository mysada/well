import axios from 'axios';

document.addEventListener('DOMContentLoaded', function () {
    const quantitySelects = document.querySelectorAll('.quantity-select');

    quantitySelects.forEach(select => {
        select.addEventListener('change', function () {
            const cartItemId = this.dataset.cartItemId;
            const price = parseFloat(this.dataset.price);
            const quantity = parseInt(this.value);
            const total = price * quantity;

            // Update the total for the item in the UI
            const totalElement = this.closest('tr').querySelector('.item-total');
            totalElement.textContent = `$${total.toFixed(2)}`;

            // Update the overall cart total in the UI
            updateCartTotal();

            // Send a request to update the quantity in the database
            axios.post('/api/cart/update', {
                id: cartItemId,
                quantity: quantity
            })
                .then(response => {
                    console.log('Update successful:', response.data);
                })
                .catch(error => {
                    console.error('Error updating cart item:', error);
                });
        });
    });

    function updateCartTotal() {
        const totalElements = document.querySelectorAll('.item-total');
        let subtotal = Array.from(totalElements).reduce((acc, element) => acc + parseFloat(element.textContent.replace('$', '')), 0);

        // Update Subtotal
        const subtotalElement = document.getElementById('subtotal');
        subtotalElement.textContent = subtotal.toFixed(2);

        // Calculate and update GST and PST
        const gstRate = 0.05;
        const pstRate = 0.07;
        const gst = subtotal * gstRate;
        const pst = subtotal * pstRate;

        const gstElement = document.getElementById('gst');
        const pstElement = document.getElementById('pst');
        gstElement.textContent = gst.toFixed(2);
        pstElement.textContent = pst.toFixed(2);

        // Update Total
        const total = subtotal + gst + pst;
        const cartTotalElement = document.getElementById('cart-total');
        cartTotalElement.textContent = total.toFixed(2);

        // Update the item count
        const quantitySelects = document.querySelectorAll('.quantity-select');
        const totalItems = Array.from(quantitySelects).reduce((acc, select) => acc + parseInt(select.value), 0);
        const itemCountElement = document.getElementById('item-count');
        itemCountElement.textContent = totalItems;
    }
});
