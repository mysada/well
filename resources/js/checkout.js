document.addEventListener('DOMContentLoaded', function () {
    const countrySelects = document.querySelectorAll('#billing-country, #shipping-country');
    const stateSelects = document.querySelectorAll('#billing-state, #shipping-state');

    const countries = [
        { code: 'CA', name: 'Canada' },
        { code: 'US', name: 'United States' },
        { code: 'AF', name: 'Afghanistan' },
        { code: 'AL', name: 'Albania' },
        { code: 'DZ', name: 'Algeria' },
        { code: 'AS', name: 'American Samoa' },
        { code: 'AD', name: 'Andorra' },
        { code: 'AO', name: 'Angola' },
        { code: 'AI', name: 'Anguilla' },
        { code: 'AQ', name: 'Antarctica' },
        { code: 'AG', name: 'Antigua and Barbuda' },
        { code: 'AR', name: 'Argentina' },
        { code: 'AM', name: 'Armenia' },
        { code: 'AW', name: 'Aruba' },
        { code: 'AU', name: 'Australia' },
        { code: 'AT', name: 'Austria' },
        { code: 'AZ', name: 'Azerbaijan' },
        { code: 'BS', name: 'Bahamas' },
        { code: 'BH', name: 'Bahrain' },
        { code: 'BD', name: 'Bangladesh' },
        { code: 'BB', name: 'Barbados' },
        { code: 'BY', name: 'Belarus' },
        { code: 'BE', name: 'Belgium' },
        { code: 'BZ', name: 'Belize' },
        { code: 'BJ', name: 'Benin' },
        { code: 'BM', name: 'Bermuda' },
        { code: 'BT', name: 'Bhutan' },
        { code: 'BO', name: 'Bolivia' },
        { code: 'BA', name: 'Bosnia and Herzegovina' },
        { code: 'BW', name: 'Botswana' },
        { code: 'BR', name: 'Brazil' },
        { code: 'BN', name: 'Brunei Darussalam' },
        { code: 'BG', name: 'Bulgaria' },
        { code: 'BF', name: 'Burkina Faso' },
        { code: 'BI', name: 'Burundi' },
        { code: 'KH', name: 'Cambodia' },
        { code: 'CM', name: 'Cameroon' },
        { code: 'CV', name: 'Cape Verde' },
        { code: 'KY', name: 'Cayman Islands' },
        { code: 'CF', name: 'Central African Republic' },
        { code: 'TD', name: 'Chad' },
        { code: 'CL', name: 'Chile' },
        { code: 'CN', name: 'China' },
        { code: 'CO', name: 'Colombia' },
        { code: 'KM', name: 'Comoros' },
        { code: 'CG', name: 'Congo' },
        { code: 'CR', name: 'Costa Rica' },
        { code: 'HR', name: 'Croatia' },
        { code: 'CU', name: 'Cuba' },
        { code: 'CY', name: 'Cyprus' },
        { code: 'CZ', name: 'Czech Republic' },
        { code: 'DK', name: 'Denmark' },
        { code: 'DJ', name: 'Djibouti' },
        { code: 'DM', name: 'Dominica' },
        { code: 'DO', name: 'Dominican Republic' },
        { code: 'EC', name: 'Ecuador' },
        { code: 'EG', name: 'Egypt' },
        { code: 'SV', name: 'El Salvador' },
        { code: 'GQ', name: 'Equatorial Guinea' },
        { code: 'ER', name: 'Eritrea' },
        { code: 'EE', name: 'Estonia' },
        { code: 'ET', name: 'Ethiopia' },
        { code: 'FK', name: 'Falkland Islands' },
        { code: 'FO', name: 'Faroe Islands' },
        { code: 'FJ', name: 'Fiji' },
        { code: 'FI', name: 'Finland' },
        { code: 'FR', name: 'France' },
        { code: 'GF', name: 'French Guiana' },
        { code: 'GA', name: 'Gabon' },
        { code: 'GM', name: 'Gambia' },
        { code: 'GE', name: 'Georgia' },
        { code: 'DE', name: 'Germany' },
        { code: 'GH', name: 'Ghana' },
        { code: 'GI', name: 'Gibraltar' },
        { code: 'GR', name: 'Greece' },
        { code: 'GL', name: 'Greenland' },
        { code: 'GD', name: 'Grenada' },
        { code: 'GU', name: 'Guam' },
        { code: 'GT', name: 'Guatemala' },
        { code: 'GN', name: 'Guinea' },
        { code: 'GW', name: 'Guinea-Bissau' },
        { code: 'GY', name: 'Guyana' },
        { code: 'HT', name: 'Haiti' },
        { code: 'HN', name: 'Honduras' },
        { code: 'HK', name: 'Hong Kong' },
        { code: 'HU', name: 'Hungary' },
        { code: 'IS', name: 'Iceland' },
        { code: 'IN', name: 'India' },
        { code: 'ID', name: 'Indonesia' },
        { code: 'IR', name: 'Iran' },
        { code: 'IQ', name: 'Iraq' },
        { code: 'IE', name: 'Ireland' },
        { code: 'IL', name: 'Israel' },
        { code: 'IT', name: 'Italy' },
        { code: 'JM', name: 'Jamaica' },
        { code: 'JP', name: 'Japan' },
        { code: 'JO', name: 'Jordan' },
        { code: 'KZ', name: 'Kazakhstan' },
        { code: 'KE', name: 'Kenya' },
        { code: 'KI', name: 'Kiribati' },
        { code: 'KW', name: 'Kuwait' },
        { code: 'KG', name: 'Kyrgyzstan' },
        { code: 'LA', name: 'Lao People\'s Democratic Republic' },
        { code: 'LV', name: 'Latvia' },
        { code: 'LB', name: 'Lebanon' },
        { code: 'LS', name: 'Lesotho' },
        { code: 'LR', name: 'Liberia' },
        { code: 'LY', name: 'Libya' },
        { code: 'LI', name: 'Liechtenstein' },
        { code: 'LT', name: 'Lithuania' },
        { code: 'LU', name: 'Luxembourg' },
        { code: 'MO', name: 'Macao' },
        { code: 'MG', name: 'Madagascar' },
        { code: 'MW', name: 'Malawi' },
        { code: 'MY', name: 'Malaysia' },
        { code: 'MV', name: 'Maldives' },
        { code: 'ML', name: 'Mali' },
        { code: 'MT', name: 'Malta' },
        { code: 'MH', name: 'Marshall Islands' },
        { code: 'MQ', name: 'Martinique' },
        { code: 'MR', name: 'Mauritania' },
        { code: 'MU', name: 'Mauritius' },
        { code: 'YT', name: 'Mayotte' },
        { code: 'MX', name: 'Mexico' },
        { code: 'FM', name: 'Micronesia, Federated States of' },
        { code: 'MD', name: 'Moldova' },
        { code: 'MC', name: 'Monaco' },
        { code: 'MN', name: 'Mongolia' },
        { code: 'ME', name: 'Montenegro' },
        { code: 'MS', name: 'Montserrat' },
        { code: 'MA', name: 'Morocco' },
        { code: 'MZ', name: 'Mozambique' },
        { code: 'MM', name: 'Myanmar' },
        { code: 'NA', name: 'Namibia' },
        { code: 'NR', name: 'Nauru' },
        { code: 'NP', name: 'Nepal' },
        { code: 'NL', name: 'Netherlands' },
        { code: 'NC', name: 'New Caledonia' },
        { code: 'NZ', name: 'New Zealand' },
        { code: 'NI', name: 'Nicaragua' },
        { code: 'NE', name: 'Niger' },
        { code: 'NG', name: 'Nigeria' },
        { code: 'NU', name: 'Niue' },
        { code: 'NF', name: 'Norfolk Island' },
        { code: 'KP', name: 'North Korea' },
        { code: 'MK', name: 'North Macedonia' },
        { code: 'NO', name: 'Norway' },
        { code: 'OM', name: 'Oman' },
        { code: 'PK', name: 'Pakistan' },
        { code: 'PW', name: 'Palau' },
        { code: 'PA', name: 'Panama' },
        { code: 'PG', name: 'Papua New Guinea' },
        { code: 'PY', name: 'Paraguay' },
        { code: 'PE', name: 'Peru' },
        { code: 'PH', name: 'Philippines' },
        { code: 'PL', name: 'Poland' },
        { code: 'PT', name: 'Portugal' },
        { code: 'PR', name: 'Puerto Rico' },
        { code: 'QA', name: 'Qatar' },
        { code: 'RO', name: 'Romania' },
        { code: 'RU', name: 'Russian Federation' },
        { code: 'RW', name: 'Rwanda' },
        { code: 'SH', name: 'Saint Helena' },
        { code: 'KN', name: 'Saint Kitts and Nevis' },
        { code: 'LC', name: 'Saint Lucia' },
        { code: 'PM', name: 'Saint Pierre and Miquelon' },
        { code: 'VC', name: 'Saint Vincent and the Grenadines' },
        { code: 'WS', name: 'Samoa' },
        { code: 'SM', name: 'San Marino' },
        { code: 'ST', name: 'Sao Tome and Principe' },
        { code: 'SA', name: 'Saudi Arabia' },
        { code: 'SN', name: 'Senegal' },
        { code: 'RS', name: 'Serbia' },
        { code: 'SC', name: 'Seychelles' },
        { code: 'SL', name: 'Sierra Leone' },
        { code: 'SG', name: 'Singapore' },
        { code: 'SX', name: 'Sint Maarten (Dutch part)' },
        { code: 'SK', name: 'Slovakia' },
        { code: 'SI', name: 'Slovenia' },
        { code: 'SB', name: 'Solomon Islands' },
        { code: 'SO', name: 'Somalia' },
        { code: 'ZA', name: 'South Africa' },
        { code: 'KR', name: 'South Korea' },
        { code: 'SS', name: 'South Sudan' },
        { code: 'ES', name: 'Spain' },
        { code: 'LK', name: 'Sri Lanka' },
        { code: 'SD', name: 'Sudan' },
        { code: 'SR', name: 'Suriname' },
        { code: 'SE', name: 'Sweden' },
        { code: 'CH', name: 'Switzerland' },
        { code: 'SY', name: 'Syrian Arab Republic' },
        { code: 'TW', name: 'Taiwan' },
        { code: 'TJ', name: 'Tajikistan' },
        { code: 'TZ', name: 'Tanzania' },
        { code: 'TH', name: 'Thailand' },
        { code: 'TL', name: 'Timor-Leste' },
        { code: 'TG', name: 'Togo' },
        { code: 'TK', name: 'Tokelau' },
        { code: 'TO', name: 'Tonga' },
        { code: 'TT', name: 'Trinidad and Tobago' },
        { code: 'TN', name: 'Tunisia' },
        { code: 'TR', name: 'Turkey' },
        { code: 'TM', name: 'Turkmenistan' },
        { code: 'TV', name: 'Tuvalu' },
        { code: 'UG', name: 'Uganda' },
        { code: 'UA', name: 'Ukraine' },
        { code: 'AE', name: 'United Arab Emirates' },
        { code: 'GB', name: 'United Kingdom' },
        { code: 'UY', name: 'Uruguay' },
        { code: 'UZ', name: 'Uzbekistan' },
        { code: 'VU', name: 'Vanuatu' },
        { code: 'VE', name: 'Venezuela' },
        { code: 'VN', name: 'Viet Nam' },
        { code: 'EH', name: 'Western Sahara' },
        { code: 'YE', name: 'Yemen' },
        { code: 'ZM', name: 'Zambia' },
        { code: 'ZW', name: 'Zimbabwe' }
    ];

    const canadianProvinces = [
        { code: 'AB', name: 'Alberta' },
        { code: 'BC', name: 'British Columbia' },
        { code: 'MB', name: 'Manitoba' },
        { code: 'NB', name: 'New Brunswick' },
        { code: 'NL', name: 'Newfoundland and Labrador' },
        { code: 'NS', name: 'Nova Scotia' },
        { code: 'NT', name: 'Northwest Territories' },
        { code: 'NU', name: 'Nunavut' },
        { code: 'ON', name: 'Ontario' },
        { code: 'PE', name: 'Prince Edward Island' },
        { code: 'QC', name: 'Quebec' },
        { code: 'SK', name: 'Saskatchewan' },
        { code: 'YT', name: 'Yukon' }
    ];

    // Populate country selects
    countrySelects.forEach(select => {
        countries.forEach(country => {
            const option = document.createElement('option');
            option.value = country.code;
            option.textContent = country.name;
            select.appendChild(option);
        });
    });

    // Function to populate state/province selects based on country
    function populateStates(countryCode, stateSelect) {
        stateSelect.innerHTML = '<option value="">Select Province/State</option>';
        if (countryCode === 'CA') {
            canadianProvinces.forEach(province => {
                const option = document.createElement('option');
                option.value = province.code;
                option.textContent = province.name;
                stateSelect.appendChild(option);
            });
        }
    }

    // Event listener for country select change
    countrySelects.forEach(select => {
        select.addEventListener('change', function () {
            const country = this.value;
            const stateSelect = this.id === 'billing-country' ? document.getElementById('billing-state') : document.getElementById('shipping-state');
            populateStates(country, stateSelect);
        });
    });

    // Initial population of states/provinces
    countrySelects.forEach(select => select.dispatchEvent(new Event('change')));

    // Toggle Billing Address functionality
    document.getElementById('same-address').addEventListener('change', function () {
        const billingFormSection = document.getElementById('billing-address-section');
        if (this.checked) {
            billingFormSection.style.display = 'none';
            document.querySelectorAll('#billing-form input, #billing-form select').forEach(input => input.disabled = true);
        } else {
            billingFormSection.style.display = 'block';
            document.querySelectorAll('#billing-form input, #billing-form select').forEach(input => input.disabled = false);
        }
    });

    // Function to update cart summary
    function updateCartSummary() {
        let subtotal = 0;
        document.querySelectorAll('.cart-summary .item').forEach(item => {
            const price = parseFloat(item.querySelector('.item-price').textContent.replace('$', ''));
            const quantity = parseInt(item.querySelector('.item-quantity input').value);
            subtotal += price * quantity;
        });

        const province = document.getElementById('billing-state').value;
        const { gst, pst, hst } = calculateTax(province);
        const gstAmount = subtotal * gst;
        const pstAmount = subtotal * pst;
        const hstAmount = subtotal * hst;
        const total = subtotal + gstAmount + pstAmount + hstAmount;

        document.querySelector('.tax-breakdown').innerHTML = `
            <p><strong>Subtotal:</strong> $${subtotal.toFixed(2)}</p>
            <p><strong>GST:</strong> $${gstAmount.toFixed(2)}</p>
            <p><strong>PST:</strong> $${pstAmount.toFixed(2)}</p>
            <p><strong>HST:</strong> $${hstAmount.toFixed(2)}</p>
        `;
        document.querySelector('.total-price').textContent = `Total: $${total.toFixed(2)}`;
    }

    // Tax calculation function
    function calculateTax(province) {
        let gst = 0, pst = 0, hst = 0;
        switch (province) {
            case 'AB': case 'NT': case 'NU': case 'YT':
                gst = 0.05;
                break;
            case 'BC':
                gst = 0.05;
                pst = 0.07;
                break;
            case 'MB':
                gst = 0.05;
                pst = 0.08;
                break;
            case 'NB': case 'NL': case 'NS': case 'PE':
                hst = 0.15;
                break;
            case 'ON':
                hst = 0.13;
                break;
            case 'QC':
                gst = 0.05;
                pst = 0.09975;
                break;
            case 'SK':
                gst = 0.05;
                pst = 0.06;
                break;
            default:
                gst = 0;
                pst = 0;
                hst = 0;
        }
        return { gst, pst, hst };
    }

    // Initial tax and total calculation
    updateCartSummary();
    document.getElementById('billing-state').addEventListener('change', updateCartSummary);
    document.getElementById('billing-country').addEventListener('change', updateCartSummary);

});
