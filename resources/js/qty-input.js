import $ from 'jquery';

document.addEventListener('DOMContentLoaded', function() {
    var QtyInput = (function () {
        let $qtyInputs = $(".qty-input");

        if (!$qtyInputs.length) {
            return;
        }

        var $inputs = $qtyInputs.find(".product-qty");
        var $countBtn = $qtyInputs.find(".qty-count");

        $inputs.each(function () {
            var $input = $(this);
            var qtyMin = parseInt($input.attr("min"));
            var qtyMax = parseInt($input.attr("max"));

            $input.change(function () {
                var qty = parseInt($input.val());

                if (isNaN(qty) || qty < qtyMin) {
                    $input.val(qtyMin);
                    qty = qtyMin;
                } else if (qty > qtyMax) {
                    $input.val(qtyMax);
                    qty = qtyMax;
                }

                updateQuantity($input.data('product-id'), qty);
            });
        });

        $countBtn.click(function () {
            var $this = $(this);
            var operator = $this.data('action');
            var $input = $this.siblings(".product-qty");
            var qty = parseInt($input.val());
            var qtyMin = parseInt($input.attr("min"));
            var qtyMax = parseInt($input.attr("max"));

            console.log(`Button clicked: ${operator}`); // Debugging line

            if (operator == "add") {
                qty += 1;
                if (qty > qtyMax) {
                    qty = qtyMax;
                }
            } else if (operator == "minus") {
                qty -= 1;
                if (qty < qtyMin) {
                    qty = qtyMin;
                }
            }

            $input.val(qty);
            updateQuantity($input.data('product-id'), qty);
        });

        function updateQuantity(productId, quantity) {
            const data = { product_id: productId, quantity: quantity };
            console.log('Sending data to server:', data); // Debugging line

            fetch(`/cart_items/update_quantity`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to update quantity');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.message === 'Updated successfully') {
                        console.log('Quantity updated successfully');
                    } else {
                        console.error('Failed to update quantity');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Handle Add to Cart button submission
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');

        addToCartForms.forEach(form => {
            form.addEventListener('submit', event => {
                event.preventDefault(); // Prevent default form submission

                const formData = new FormData(form);
                const productId = formData.get('product_id');
                const quantity = formData.get('quantity');
                console.log('Submitting form with quantity:', quantity); // Debugging line

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Product added to cart successfully.') {
                            // Update the UI as needed, e.g., update the cart icon, display a success message, etc.
                            console.log('Product added successfully:', data);
                        } else {
                            console.error('Failed to add product:', data);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    })();
});
