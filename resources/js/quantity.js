document.addEventListener('DOMContentLoaded', function () {
    const qtyInputs = document.querySelectorAll('.qty-input');

    qtyInputs.forEach(inputGroup => {
        const minusButton = inputGroup.querySelector('.qty-count--minus');
        const plusButton = inputGroup.querySelector('.qty-count--add');
        const qtyInput = inputGroup.querySelector('.product-qty');

        minusButton.addEventListener('click', function () {
            let currentQty = parseInt(qtyInput.value);
            if (currentQty > 1) {
                qtyInput.value = --currentQty;
                updateQuantity(qtyInput.dataset.productId, currentQty);
            }
        });

        plusButton.addEventListener('click', function () {
            let currentQty = parseInt(qtyInput.value);
            const maxQty = parseInt(qtyInput.max);
            if (currentQty < maxQty) {
                qtyInput.value = ++currentQty;
                updateQuantity(qtyInput.dataset.productId, currentQty);
            }
        });

        qtyInput.addEventListener('change', function () {
            let currentQty = parseInt(qtyInput.value);
            if (currentQty < 1) {
                qtyInput.value = 1;
                currentQty = 1;
            }
            const maxQty = parseInt(qtyInput.max);
            if (currentQty > maxQty) {
                qtyInput.value = maxQty;
                currentQty = maxQty;
            }
            updateQuantity(qtyInput.dataset.productId, currentQty);
        });
    });

    function updateQuantity(productId, quantity) {
        fetch('/update-cart-quantity', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    // alert(data.message);
                    // Update the stock display and other UI components here if necessary
                    document.querySelector(`input[data-product-id="${productId}"]`).max = data.newStock;
                    document.querySelector('.product-stock-display').textContent = `${data.newStock} in stock`;
                }
            })
            .catch(error => {
                console.error('Error updating quantity:', error);
            });
    }
});
