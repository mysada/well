document.addEventListener('DOMContentLoaded', function () {
    // Function to toggle the billing address form visibility
    function toggleBillingAddress() {
        const sameAddress = document.getElementById('same-address').checked;
        const billingFormSection = document.getElementById('billing-address-section');
        if (sameAddress) {
            billingFormSection.style.display = 'none';
            document.querySelectorAll('#billing-form input, #billing-form select').forEach(input => input.disabled = true);
        } else {
            billingFormSection.style.display = 'block';
            document.querySelectorAll('#billing-form input, #billing-form select').forEach(input => input.disabled = false);
        }
    }

    // Function to update state/province options based on country selection
    function updateStateOptions() {
        const countrySelect = document.querySelector('#shipping-country');
        const stateSelect = document.querySelector('#shipping-state');
        const billingCountrySelect = document.querySelector('#billing-country');
        const billingStateSelect = document.querySelector('#billing-state');

        function populateStates(country, stateSelectElement) {
            let options = '';
            if (country === 'Canada') {
                options = `
                    <option value="">Select Province</option>
                    <option value="AB">Alberta</option>
                    <option value="BC">British Columbia</option>
                    <option value="MB">Manitoba</option>
                    <option value="NB">New Brunswick</option>
                    <option value="NL">Newfoundland and Labrador</option>
                    <option value="NS">Nova Scotia</option>
                    <option value="NT">Northwest Territories</option>
                    <option value="NU">Nunavut</option>
                    <option value="ON">Ontario</option>
                    <option value="PE">Prince Edward Island</option>
                    <option value="QC">Quebec</option>
                    <option value="SK">Saskatchewan</option>
                    <option value="YT">Yukon</option>
                `;
            } else if (country === 'USA') {
                options = `
                    <option value="">Select State</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                `;
            } else {
                options = '<option value="">Select</option>';
            }
            stateSelectElement.innerHTML = options;
        }

        // Event listeners for country selection
        countrySelect.addEventListener('change', () => {
            populateStates(countrySelect.value, stateSelect);
        });
        billingCountrySelect.addEventListener('change', () => {
            populateStates(billingCountrySelect.value, billingStateSelect);
        });

        // Initialize state options
        populateStates(countrySelect.value, stateSelect);
        populateStates(billingCountrySelect.value, billingStateSelect);
    }

    // Initialize event listeners
    document.getElementById('same-address').addEventListener('change', toggleBillingAddress);

    // Initialize states options on page load
    updateStateOptions();
});
