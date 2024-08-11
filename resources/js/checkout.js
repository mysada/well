import $ from 'jquery';

const countries = [];
const provinces = [];

const $country = $('#shipping-country');

const $subtotal = $('#subtotal');
const $shippingRate = $('#shipping_rate');
const $gst = $('#gst');
const $pst = $('#pst');
const $cartTotal = $('#cart-total');
const $sameAddress = $('#same-address');
const $province = $('#ca-province');
const $state = $('#shipping-state');
const $billingAddressSection = $('#billing-address-section');

// Fetch data from API
const fetchData = async () => {
  try {
    // Fetch countries
    const countryResponse = await fetch('/api/countries');
    const countryData = await countryResponse.json();
    if (countryData.status === 'success') {
      countries.push(...countryData.data);
    }

    // Fetch provinces
    const provinceResponse = await fetch('/api/provinces');
    const provinceData = await provinceResponse.json();
    if (provinceData.status === 'success') {
      provinces.push(...provinceData.data);
    }
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};

const toggleProvince = () => {
  const countryCode = $country.val();
  if (countryCode === 'CA') {
    $province.show().prop('disabled', false);
    $state.hide().prop('disabled', true);
    $state.val(''); // Clear the value when hiding
  } else {
    $province.hide().prop('disabled', true);
    $state.show().prop('disabled', false);
  }
};

// Add this event listener to your form
$('form').on('submit', function() {
  // Ensure the hidden field is disabled before submission
  if ($province.is(':hidden')) {
    $province.prop('disabled', true);
  } else {
    $state.prop('disabled', true);
  }
});

const calculate = () => {
  // Retrieve selected values
  const selectedProvinceValue = $province.find(':selected').val();
  const countryCode = $country.find(':selected').val();
  const shippingFee = parseFloat($shippingRate.text()) || 0;
  const subtotal = parseFloat($subtotal.text()) || 0;

  let gst = 0.00;
  let pst = 0.00;

  if (countryCode === 'CA') {
    const mProvince = provinces.find(p => p.short_name === selectedProvinceValue);
    const gstRate = mProvince ? parseFloat(mProvince.gst_rate) : 0;
    const pstRate = mProvince ? parseFloat(mProvince.pst_rate) : 0;
    gst = (subtotal * gstRate / 100);
    pst = (subtotal * pstRate / 100);
  }
  const total = subtotal + shippingFee + gst + pst;
  $gst.text(gst.toFixed(2));
  $pst.text(pst.toFixed(2));
  $cartTotal.text(total.toFixed(2));
};

// Event listeners
$country.on('change', () => {
  toggleProvince();
  const countryCode = $country.find(':selected').val();
  const country = countries.find(c => c.code === countryCode);
  const shippingRate = country ? parseFloat(country.shipping_rate) : 0;
  $shippingRate.text(shippingRate.toFixed(2));
  calculate();
});

$province.on('change', calculate);

$sameAddress.on('change', () => {
  $billingAddressSection.toggle(!$sameAddress.is(':checked'));
});

$(document).ready(() => {
  fetchData().then(() => {
    toggleProvince();
    calculate();
  });
});
