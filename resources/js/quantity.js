document.addEventListener('DOMContentLoaded', function () {
  console.log('JavaScript Loaded'); // Check if the script is running

  const qtyInputs = document.querySelectorAll('.product-qty');
  console.log('Quantity Inputs Found:', qtyInputs.length); // Log how many quantity inputs are found

  qtyInputs.forEach(input => {
    console.log('Processing Input:', input); // Log each input element being processed

    const qtyInputContainer = input.closest('.qty-input');
    console.log('Quantity Input Container:', qtyInputContainer); // Log the closest quantity input container

    if (qtyInputContainer) {
      const minusBtn = qtyInputContainer.querySelector('.qty-count--minus');
      const addBtn = qtyInputContainer.querySelector('.qty-count--add');

      console.log('Minus Button:', minusBtn); // Debugging
      console.log('Add Button:', addBtn); // Debugging

      // Ensure the buttons exist before adding event listeners
      if (minusBtn) {
        minusBtn.addEventListener('click', function () {
          let qty = parseInt(input.value, 10);
          if (qty > 1) {
            input.value = --qty;
            updateHiddenQty(input);
          }
        });
      } else {
        console.warn('Minus Button Not Found');
      }

      if (addBtn) {
        addBtn.addEventListener('click', function () {
          let qty = parseInt(input.value, 10);
          const max = parseInt(input.getAttribute('max'), 10);
          if (qty < max) {
            input.value = ++qty;
            updateHiddenQty(input);
          }
        });
      } else {
        console.warn('Add Button Not Found');
      }

      // Update the hidden input value when the quantity changes
      input.addEventListener('input', function () {
        updateHiddenQty(input);
      });
    } else {
      console.warn('Quantity Input Container Not Found');
    }
  });

  function updateHiddenQty(input) {
    // Instead of relying on .d-flex, select the form more directly
    const form = document.querySelector('#add-to-cart-form');
    if (form) {
      const hiddenInput = form.querySelector('.product-qty-input');
      if (hiddenInput) {
        hiddenInput.value = input.value;
        console.log('Hidden Input Updated:', hiddenInput.value); // Debugging
      } else {
        console.warn('Hidden Input Not Found');
      }
    } else {
      console.warn('Form Not Found for Quantity Input');
    }
  }
});
