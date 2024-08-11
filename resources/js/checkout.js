import $ from 'jquery';

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
