document.addEventListener('DOMContentLoaded', function () {
    const qtyInputs = document.querySelectorAll('.qty-input');

    qtyInputs.forEach(qtyInput => {
        const minusBtn = qtyInput.querySelector('.qty-count--minus');
        const plusBtn = qtyInput.querySelector('.qty-count--add');
        const qtyField = qtyInput.querySelector('.product-qty');

        const updateQuantity = (action) => {
            let quantity = parseInt(qtyField.value);
            const maxQuantity = parseInt(qtyField.getAttribute('max'));
            const productId = qtyField.getAttribute('data-product-id');

            if (action === 'minus' && quantity > 1) {
                quantity--;
            } else if (action === 'add' && quantity < maxQuantity) {
                quantity++;
            }

            qtyField.value = quantity;

            // Update the stock in the database
            fetch(`/update-quantity/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Stock updated successfully');
                    } else {
                        console.log('Failed to update stock');
                    }
                })
                .catch(error => console.log('Error:', error));
        };

        minusBtn.addEventListener('click', () => updateQuantity('minus'));
        plusBtn.addEventListener('click', () => updateQuantity('add'));
    });

    const addToCartForm = document.getElementById('add-to-cart-form');
    addToCartForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const productId = this.querySelector('input[name="product_id"]').value;
        const quantity = this.querySelector('.product-qty').value;

        fetch(`/update-quantity/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Stock updated successfully');
                    this.submit();
                } else {
                    console.log('Failed to update stock');
                }
            })
            .catch(error => console.log('Error:', error));
    });
});
