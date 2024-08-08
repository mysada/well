document.addEventListener('DOMContentLoaded', function () {
    const countries = [
        { code: 'US', name: 'United States' },
        { code: 'CA', name: 'Canada' },
        { code: 'GB', name: 'United Kingdom' },
        { code: 'AU', name: 'Australia' },
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
        { code: 'IO', name: 'British Indian Ocean Territory' },
        { code: 'VG', name: 'British Virgin Islands' },
        { code: 'BN', name: 'Brunei' },
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
        { code: 'CX', name: 'Christmas Island' },
        { code: 'CC', name: 'Cocos Islands' },
        { code: 'CO', name: 'Colombia' },
        { code: 'KM', name: 'Comoros' },
        { code: 'CK', name: 'Cook Islands' },
        { code: 'CR', name: 'Costa Rica' },
        { code: 'HR', name: 'Croatia' },
        { code: 'CU', name: 'Cuba' },
        { code: 'CW', name: 'Curacao' },
        { code: 'CY', name: 'Cyprus' },
        { code: 'CZ', name: 'Czech Republic' },
        { code: 'CD', name: 'Democratic Republic of the Congo' },
        { code: 'DK', name: 'Denmark' },
        { code: 'DJ', name: 'Djibouti' },
        { code: 'DM', name: 'Dominica' },
        { code: 'DO', name: 'Dominican Republic' },
        { code: 'TL', name: 'East Timor' },
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
        { code: 'PF', name: 'French Polynesia' },
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
        { code: 'GG', name: 'Guernsey' },
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
        { code: 'IM', name: 'Isle of Man' },
        { code: 'IL', name: 'Israel' },
        { code: 'IT', name: 'Italy' },
        { code: 'CI', name: 'Ivory Coast' },
        { code: 'JM', name: 'Jamaica' },
        { code: 'JP', name: 'Japan' },
        { code: 'JE', name: 'Jersey' },
        { code: 'JO', name: 'Jordan' },
        { code: 'KZ', name: 'Kazakhstan' },
        { code: 'KE', name: 'Kenya' },
        { code: 'KI', name: 'Kiribati' },
        { code: 'XK', name: 'Kosovo' },
        { code: 'KW', name: 'Kuwait' },
        { code: 'KG', name: 'Kyrgyzstan' },
        { code: 'LA', name: 'Laos' },
        { code: 'LV', name: 'Latvia' },
        { code: 'LB', name: 'Lebanon' },
        { code: 'LS', name: 'Lesotho' },
        { code: 'LR', name: 'Liberia' },
        { code: 'LY', name: 'Libya' },
        { code: 'LI', name: 'Liechtenstein' },
        { code: 'LT', name: 'Lithuania' },
        { code: 'LU', name: 'Luxembourg' },
        { code: 'MO', name: 'Macau' },
        { code: 'MK', name: 'Macedonia' },
        { code: 'MG', name: 'Madagascar' },
        { code: 'MW', name: 'Malawi' },
        { code: 'MY', name: 'Malaysia' },
        { code: 'MV', name: 'Maldives' },
        { code: 'ML', name: 'Mali' },
        { code: 'MT', name: 'Malta' },
        { code: 'MH', name: 'Marshall Islands' },
        { code: 'MR', name: 'Mauritania' },
        { code: 'MU', name: 'Mauritius' },
        { code: 'YT', name: 'Mayotte' },
        { code: 'MX', name: 'Mexico' },
        { code: 'FM', name: 'Micronesia' },
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
        { code: 'MP', name: 'Northern Mariana Islands' },
        { code: 'NO', name: 'Norway' },
        { code: 'OM', name: 'Oman' },
        { code: 'PK', name: 'Pakistan' },
        { code: 'PW', name: 'Palau' },
        { code: 'PS', name: 'Palestinian Territory' },
        { code: 'PA', name: 'Panama' },
        { code: 'PG', name: 'Papua New Guinea' },
        { code: 'PY', name: 'Paraguay' },
        { code: 'PE', name: 'Peru' },
        { code: 'PH', name: 'Philippines' },
        { code: 'PN', name: 'Pitcairn' },
        { code: 'PL', name: 'Poland' },
        { code: 'PT', name: 'Portugal' },
        { code: 'PR', name: 'Puerto Rico' },
        { code: 'QA', name: 'Qatar' },
        { code: 'CG', name: 'Republic of the Congo' },
        { code: 'RE', name: 'Reunion' },
        { code: 'RO', name: 'Romania' },
        { code: 'RU', name: 'Russia' },
        { code: 'RW', name: 'Rwanda' },
        { code: 'BL', name: 'Saint Barthelemy' },
        { code: 'SH', name: 'Saint Helena' },
        { code: 'KN', name: 'Saint Kitts and Nevis' },
        { code: 'LC', name: 'Saint Lucia' },
        { code: 'MF', name: 'Saint Martin' },
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
        { code: 'SX', name: 'Sint Maarten' },
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
        { code: 'SJ', name: 'Svalbard and Jan Mayen' },
        { code: 'SZ', name: 'Swaziland' },
        { code: 'SE', name: 'Sweden' },
        { code: 'CH', name: 'Switzerland' },
        { code: 'SY', name: 'Syria' },
        { code: 'TW', name: 'Taiwan' },
        { code: 'TJ', name: 'Tajikistan' },
        { code: 'TZ', name: 'Tanzania' },
        { code: 'TH', name: 'Thailand' },
        { code: 'TG', name: 'Togo' },
        { code: 'TK', name: 'Tokelau' },
        { code: 'TO', name: 'Tonga' },
        { code: 'TT', name: 'Trinidad and Tobago' },
        { code: 'TN', name: 'Tunisia' },
        { code: 'TR', name: 'Turkey' },
        { code: 'TM', name: 'Turkmenistan' },
        { code: 'TC', name: 'Turks and Caicos Islands' },
        { code: 'TV', name: 'Tuvalu' },
        { code: 'UG', name: 'Uganda' },
        { code: 'UA', name: 'Ukraine' },
        { code: 'AE', name: 'United Arab Emirates' },
        { code: 'GB', name: 'United Kingdom' },
        { code: 'UY', name: 'Uruguay' },
        { code: 'UZ', name: 'Uzbekistan' },
        { code: 'VU', name: 'Vanuatu' },
        { code: 'VA', name: 'Vatican' },
        { code: 'VE', name: 'Venezuela' },
        { code: 'VN', name: 'Vietnam' },
        { code: 'WF', name: 'Wallis and Futuna' },
        { code: 'EH', name: 'Western Sahara' },
        { code: 'YE', name: 'Yemen' },
        { code: 'ZM', name: 'Zambia' },
        { code: 'ZW', name: 'Zimbabwe' }
    ];

    const provinces = [
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
    const countrySelects = document.querySelectorAll('#billing-country, #shipping-country');
    const stateSelects = document.querySelectorAll('#billing-state, #shipping-state');
    const sameAddressCheckbox = document.getElementById('same-address');
    const billingAddressSection = document.getElementById('billing-address-section');

    // Populate countries
    countrySelects.forEach(select => {
        countries.forEach(country => {
            const option = document.createElement('option');
            option.value = country.code;
            option.textContent = country.name;
            select.appendChild(option);
        });

        select.addEventListener('change', function () {
            const country = this.value;
            stateSelects.forEach(stateSelect => {
                if (country === 'CA') {
                    stateSelect.style.display = 'block';
                    stateSelect.innerHTML = '<option value="">Select Province</option>';
                    provinces.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.code;
                        option.textContent = province.name;
                        stateSelect.appendChild(option);
                    });
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

    const validateField = (field, regex, message) => {
        const value = field.value.trim();
        if (!regex.test(value)) {
            showError(field, message);
            return false;
        } else {
            removeError(field);
            return true;
        }
    };

    const showError = (field, message) => {
        removeError(field);
        const error = document.createElement('div');
        error.className = 'error-message';
        error.textContent = message;
        field.parentNode.appendChild(error);
        field.classList.add('error');
    };

    const removeError = (field) => {
        const error = field.parentNode.querySelector('.error-message');
        if (error) {
            error.remove();
        }
        field.classList.remove('error');
    };

    // Form validation
    document.querySelector('.btn-checkout-custom').addEventListener('click', function (e) {
        e.preventDefault();

        const cardNumber = document.querySelector('input[name="card-number"]');
        const cardName = document.querySelector('input[name="card-name"]');
        const cardExpiry = document.querySelector('input[name="card-expiry"]');
        const cardCvc = document.querySelector('input[name="card-cvc"]');
        const cardType = document.querySelector('select[name="card-type"]');

        const shippingName = document.querySelector('input[name="shipping-name"]');
        const shippingAddress = document.querySelector('input[name="shipping-address"]');
        const shippingCity = document.querySelector('input[name="shipping-city"]');
        const shippingCountry = document.querySelector('select[name="shipping-country"]');
        const shippingZip = document.querySelector('input[name="shipping-zip"]');
        const shippingEmail = document.querySelector('input[name="shipping-email"]');
        const shippingPhone = document.querySelector('input[name="shipping-phone"]');

        const billingName = document.querySelector('input[name="billing-name"]');
        const billingAddress = document.querySelector('input[name="billing-address"]');
        const billingCity = document.querySelector('input[name="billing-city"]');
        const billingCountry = document.querySelector('select[name="billing-country"]');
        const billingZip = document.querySelector('input[name="billing-zip"]');
        const billingEmail = document.querySelector('input[name="billing-email"]');
        const billingPhone = document.querySelector('input[name="billing-phone"]');

        const cardNumberRegex = /^\d{16}$/;
        const cardNameRegex = /^[a-zA-Z\s]+$/;
        const cardExpiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
        const cardCvcRegex = /^\d{3}$/;

        const nameRegex = /^[a-zA-Z\s]+$/;
        const addressRegex = /^[a-zA-Z0-9\s,'-]+$/;
        const cityRegex = /^[a-zA-Z\s]+$/;
        const zipRegex = /^[a-zA-Z0-9\s-]+$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\d{10,15}$/;

        let isValid = true;

        isValid &= validateField(cardNumber, cardNumberRegex, 'Please enter a valid 16-digit card number.');
        isValid &= validateField(cardName, cardNameRegex, 'Please enter a valid cardholder name.');
        isValid &= validateField(cardExpiry, cardExpiryRegex, 'Please enter a valid expiry date in MM/YY format.');
        isValid &= validateField(cardCvc, cardCvcRegex, 'Please enter a valid 3-digit CVC.');
        isValid &= validateField(cardType, /.+/, 'Please select a card type.');

        isValid &= validateField(shippingName, nameRegex, 'Please enter a valid name.');
        isValid &= validateField(shippingAddress, addressRegex, 'Please enter a valid address.');
        isValid &= validateField(shippingCity, cityRegex, 'Please enter a valid city.');
        isValid &= validateField(shippingCountry, /.+/, 'Please select a country.');
        isValid &= validateField(shippingZip, zipRegex, 'Please enter a valid ZIP/Postal Code.');
        isValid &= validateField(shippingEmail, emailRegex, 'Please enter a valid email.');
        isValid &= validateField(shippingPhone, phoneRegex, 'Please enter a valid phone number.');

        if (!sameAddressCheckbox.checked) {
            isValid &= validateField(billingName, nameRegex, 'Please enter a valid name.');
            isValid &= validateField(billingAddress, addressRegex, 'Please enter a valid address.');
            isValid &= validateField(billingCity, cityRegex, 'Please enter a valid city.');
            isValid &= validateField(billingCountry, /.+/, 'Please select a country.');
            isValid &= validateField(billingZip, zipRegex, 'Please enter a valid ZIP/Postal Code.');
            isValid &= validateField(billingEmail, emailRegex, 'Please enter a valid email.');
            isValid &= validateField(billingPhone, phoneRegex, 'Please enter a valid phone number.');
        }

        if (isValid) {
            alert('Form submitted successfully!');
        } else {
            alert('Please correct the errors in the form.');
        }
    });

    // CSRF token setup
    document.querySelectorAll('form').forEach(form => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = '_token';
        input.value = csrfToken;
        form.appendChild(input);
    });
});
