function updateQuantity(cartItemId, newQuantity) {
    if (newQuantity < 1) {
        return;
    }

    let form = document.createElement('form');
    form.method = 'POST';
    form.action = '/cart_items/' + cartItemId;

    let hiddenInputMethod = document.createElement('input');
    hiddenInputMethod.type = 'hidden';
    hiddenInputMethod.name = '_method';
    hiddenInputMethod.value = 'PUT';
    form.appendChild(hiddenInputMethod);

    let hiddenInputToken = document.createElement('input');
    hiddenInputToken.type = 'hidden';
    hiddenInputToken.name = '_token';
    hiddenInputToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form.appendChild(hiddenInputToken);

    let hiddenInputQuantity = document.createElement('input');
    hiddenInputQuantity.type = 'hidden';
    hiddenInputQuantity.name = 'quantity';
    hiddenInputQuantity.value = newQuantity;
    form.appendChild(hiddenInputQuantity);

    document.body.appendChild(form);
    form.submit();
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.qty-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const cartItemId = this.getAttribute('data-cart-item-id');
            const currentQuantity = parseInt(this.closest('.input-group').querySelector('input[name="quantity"]').value);
            const action = this.getAttribute('data-action');

            let newQuantity = currentQuantity;
            if (action === 'minus') {
                newQuantity = currentQuantity - 1;
            } else if (action === 'add') {
                newQuantity = currentQuantity + 1;
            }

            updateQuantity(cartItemId, newQuantity);
        });
    });
});
