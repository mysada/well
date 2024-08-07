document.addEventListener('DOMContentLoaded', function () {
    const countrySelects = document.querySelectorAll('#billing-country, #shipping-country');
    const stateSelects = document.querySelectorAll('#billing-state, #shipping-state');
    const sameAddressCheckbox = document.getElementById('same-address');
    const billingAddressSection = document.getElementById('billing-address-section');

    // Initial population of countries and states/provinces
    countrySelects.forEach(select => {
        select.addEventListener('change', function () {
            const country = this.value;
            stateSelects.forEach(stateSelect => {
                if (country === 'CA') {
                    stateSelect.style.display = 'block';
                    stateSelect.innerHTML = '<option value="">Select Province</option><option value="AB">Alberta</option><option value="BC">British Columbia</option><option value="MB">Manitoba</option><option value="NB">New Brunswick</option><option value="NL">Newfoundland and Labrador</option><option value="NS">Nova Scotia</option><option value="NT">Northwest Territories</option><option value="NU">Nunavut</option><option value="ON">Ontario</option><option value="PE">Prince Edward Island</option><option value="QC">Quebec</option><option value="SK">Saskatchewan</option><option value="YT">Yukon</option>';
                } else {
                    stateSelect.style.display = 'none';
                    stateSelect.innerHTML = '';
                }
            });
        });

        // Trigger change event to populate states on page load
        select.dispatchEvent(new Event('change'));
    });

    // Toggle billing address section
    sameAddressCheckbox.addEventListener('change', function () {
        if (this.checked) {
            billingAddressSection.style.display = 'none';
            document.querySelectorAll('#billing-form input, #billing-form select').forEach(input => input.disabled = true);
        } else {
            billingAddressSection.style.display = 'block';
            document.querySelectorAll('#billing-form input, #billing-form select').forEach(input => input.disabled = false);
        }
    });

    // Initial toggle state on page load
    if (sameAddressCheckbox.checked) {
        billingAddressSection.style.display = 'none';
        document.querySelectorAll('#billing-form input, #billing-form select').forEach(input => input.disabled = true);
    }

    // Form validation
    document.querySelector('.btn-checkout-custom').addEventListener('click', function (e) {
        e.preventDefault();
        const cardNumber = document.querySelector('input[name="card-number"]');
        const cardName = document.querySelector('input[name="card-name"]');
        const cardExpiry = document.querySelector('input[name="card-expiry"]');
        const cardCvc = document.querySelector('input[name="card-cvc"]');

        const cardNumberRegex = /^\d{16}$/;
        const cardNameRegex = /^[a-zA-Z\s]+$/;
        const cardExpiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
        const cardCvcRegex = /^\d{3}$/;

        if (!cardNumberRegex.test(cardNumber.value)) {
            alert('Please enter a valid 16-digit card number.');
            cardNumber.focus();
            return;
        }

        if (!cardNameRegex.test(cardName.value)) {
            alert('Please enter a valid cardholder name.');
            cardName.focus();
            return;
        }

        if (!cardExpiryRegex.test(cardExpiry.value)) {
            alert('Please enter a valid expiry date in MM/YY format.');
            cardExpiry.focus();
            return;
        }

        if (!cardCvcRegex.test(cardCvc.value)) {
            alert('Please enter a valid 3-digit CVC.');
            cardCvc.focus();
            return;
        }

        alert('Form submitted successfully!');
        // Add form submission logic here
    });
});
