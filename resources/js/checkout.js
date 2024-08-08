import $ from 'jquery';

// Initialize empty arrays
const countries = [];
const provinces = [];
let gstRate = 0;
let pstRate = 0;
const $countrySelects = $('#billing-country, #shipping-country');
const $stateSelects = $('#billing-state, #shipping-state');
const $sameAddressCheckbox = $('#same-address');
const $billingAddressSection = $('#billing-address-section');

// Fetch data from API
const fetchData = () => {
  // Fetch countries
  fetch('/api/countries')
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        countries.push(...data.data);
        console.log('Countries:', countries);
        populateCountries();
      } else {
        console.error('Error fetching countries:', data.message);
      }
    })
    .catch(error => console.error('Fetch error:', error));

  // Fetch provinces
  fetch('/api/provinces')
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        provinces.push(...data.data);
        console.log('Provinces:', provinces);
        updateStateSelects(); // Ensure states are updated after provinces are fetched
      } else {
        console.error('Error fetching provinces:', data.message);
      }
    })
    .catch(error => console.error('Fetch error:', error));
};
fetchData();

// Populate country select boxes
const populateCountries = () => {
  $countrySelects.each(function () {
    const $select = $(this);
    $select.empty().append('<option value="">Select Country</option>');
    countries.forEach(country => {
      $select.append(new Option(country.name, country.code));
    });

    // Bind change event to update state/province selects
    $select.change(() => {
      const countryCode = $(this).val();
      updateStateSelects(countryCode);
      updateShippingCost(countryCode);
    });
  });
};

// Update states select based on country selection
const updateStateSelects = (countryCode) => {
  $stateSelects.each(function () {
    const $stateSelect = $(this);
    gstRate=0;
    pstRate=0;
    if (countryCode === 'CA') {
      $stateSelect.show().empty().append('<option value="">Select Province</option>');
      provinces
        .filter(province => province.country_code === 'CA')
        .forEach(province => {
          $stateSelect.append(new Option(province.name, province.short_name));
        });
    } else {
      $stateSelect.hide().empty();
    }
    updateShippingCost();
  });
};

// Update shipping cost based on country selection
const updateShippingCost = (countryCode) => {
  const country = countries.find(c => c.code === countryCode);
  const shippingRate = country ? parseFloat(country.shipping_rate) : 0;
  $('#shipping_rate').text(shippingRate.toFixed(2));
  calculate();
};

// Bind change event to update taxes based on province selection
$('#shipping-state').change(function () {
  const provinceCode = $(this).val();
  updateTaxes(provinceCode);
});
// Update taxes based on province selection
const updateTaxes = (provinceCode) => {
  if ($('#shipping-country').val() === 'CA') {
    const province = provinces.find(p => p.short_name === provinceCode);
    gstRate = province ? parseFloat(province.gst_rate) : 0;
    pstRate = province ? parseFloat(province.pst_rate) : 0;
  }
  calculate();
};

const calculate = () => {
  const subtotal = parseFloat($('#subtotal').text());
  const shippingFee = parseFloat($('#shipping_rate').text());
  const gst = (subtotal * gstRate / 100).toFixed(2);
  const pst = (subtotal * pstRate / 100).toFixed(2);
  const total = (subtotal + shippingFee + parseFloat(gst) + parseFloat(pst)).toFixed(2);

  $('#gst').text(gst);
  $('#pst').text(pst);
  $('#cart-total').text(total);
};

// Bind change event to country selects
$countrySelects.each(function () {
  const $select = $(this);
  $select.change(() => {
    const countryCode = $(this).val();
    updateStateSelects(countryCode);
    updateShippingCost(countryCode);
  });

  // Trigger change event to populate states on page load
  $select.trigger('change');
});

// Toggle billing address section
$sameAddressCheckbox.change(() => {
  if ($sameAddressCheckbox.is(':checked')) {
    $billingAddressSection.hide();
    $('.billing-form input, .billing-form select').prop('disabled', true);
  } else {
    $billingAddressSection.show();
    $('.billing-form input, .billing-form select').prop('disabled', false);
  }
});

// Initial toggle state on page load
if ($sameAddressCheckbox.is(':checked')) {
  $billingAddressSection.hide();
  $('.billing-form input, .billing-form select').prop('disabled', true);
}

// Validate field function
const validateField = ($field, regex, message) => {
  const value = $field.val().trim();
  if (!regex.test(value)) {
    showError($field, message);
    return false;
  } else {
    removeError($field);
    return true;
  }
};

// Show error message
const showError = ($field, message) => {
  removeError($field);
  $field.after(`<div class="error-message">${message}</div>`);
  $field.addClass('error');
};

// Remove error message
const removeError = ($field) => {
  $field.siblings('.error-message').remove();
  $field.removeClass('error');
};

// Form validation
$('.btn-checkout-custom').click(function (e) {
  e.preventDefault();

  const $cardNumber = $('input[name="card-number"]');
  const $cardName = $('input[name="card-name"]');
  const $cardExpiry = $('input[name="card-expiry"]');
  const $cardCvc = $('input[name="card-cvc"]');
  const $cardType = $('select[name="card-type"]');

  const $shippingName = $('input[name="shipping-name"]');
  const $shippingAddress = $('input[name="shipping-address"]');
  const $shippingCity = $('input[name="shipping-city"]');
  const $shippingCountry = $('select[name="shipping-country"]');
  const $shippingZip = $('input[name="shipping-zip"]');
  const $shippingEmail = $('input[name="shipping-email"]');
  const $shippingPhone = $('input[name="shipping-phone"]');

  const $billingName = $('input[name="billing-name"]');
  const $billingAddress = $('input[name="billing-address"]');
  const $billingCity = $('input[name="billing-city"]');
  const $billingCountry = $('select[name="billing-country"]');
  const $billingZip = $('input[name="billing-zip"]');
  const $billingEmail = $('input[name="billing-email"]');
  const $billingPhone = $('input[name="billing-phone"]');

  const cardNumberRegex = /^\d{16}$/;
  const cardNameRegex = /^[a-zA-Z\s]+$/;
  const cardExpiryRegex = /^(0[1-9]|1[0-2])\d{2}$/;
  const cardCvcRegex = /^\d{3}$/;

  const nameRegex = /^[a-zA-Z\s]+$/;
  const addressRegex = /^[a-zA-Z0-9\s,'-]+$/;
  const cityRegex = /^[a-zA-Z\s]+$/;
  const zipRegex = /^[a-zA-Z0-9\s-]+$/;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const phoneRegex = /^\d{10,15}$/;

  let isValid = true;

  isValid &= validateField($cardNumber, cardNumberRegex, 'Please enter a valid 16-digit card number.');
  isValid &= validateField($cardName, cardNameRegex, 'Please enter a valid cardholder name.');
  isValid &= validateField($cardExpiry, cardExpiryRegex, 'Please enter a valid expiry date in MMYY format.');
  isValid &= validateField($cardCvc, cardCvcRegex, 'Please enter a valid 3-digit CVC.');
  isValid &= validateField($cardType, /.+/, 'Please select a card type.');

  isValid &= validateField($shippingName, nameRegex, 'Please enter a valid name.');
  isValid &= validateField($shippingAddress, addressRegex, 'Please enter a valid address.');
  isValid &= validateField($shippingCity, cityRegex, 'Please enter a valid city.');
  isValid &= validateField($shippingCountry, /.+/, 'Please select a country.');
  isValid &= validateField($shippingZip, zipRegex, 'Please enter a valid ZIP/Postal Code.');
  isValid &= validateField($shippingEmail, emailRegex, 'Please enter a valid email.');
  isValid &= validateField($shippingPhone, phoneRegex, 'Please enter a valid phone number.');

  if (!$sameAddressCheckbox.is(':checked')) {
    isValid &= validateField($billingName, nameRegex, 'Please enter a valid name.');
    isValid &= validateField($billingAddress, addressRegex, 'Please enter a valid address.');
    isValid &= validateField($billingCity, cityRegex, 'Please enter a valid city.');
    isValid &= validateField($billingCountry, /.+/, 'Please select a country.');
    isValid &= validateField($billingZip, zipRegex, 'Please enter a valid ZIP/Postal Code.');
    isValid &= validateField($billingEmail, emailRegex, 'Please enter a valid email.');
    isValid &= validateField($billingPhone, phoneRegex, 'Please enter a valid phone number.');
  }

  if (isValid) {
    $('#shipping-form').submit();
  } else {
    alert('Please correct the errors in the form.');
  }
});
