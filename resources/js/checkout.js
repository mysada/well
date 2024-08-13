import $ from 'jquery';

let countries = [], provinces = [];

const $shippingCountry = $('#shipping-country');
const $caProvince = $('#ca-province');
const $shippingState = $('#shipping-state');
const $subtotal = $('#subtotal');
const $shippingRate = $('#shipping_rate');
const $gst = $('#gst');
const $pst = $('#pst');
const $cartTotal = $('#cart-total');
const $billingAddressSection = $('#billing-address-section');
const $sameAddress = $('#same-address');
const $form = $('form');

const fetchData = () => {
  Promise.all([
    $.getJSON('/api/countries'),
    $.getJSON('/api/provinces'),
  ])
    .then(([countryData, provinceData]) => {
      countries = countryData.status === 'success' ? countryData.data : [];
      provinces = provinceData.status === 'success' ? provinceData.data : [];
      toggleProvince();
      calculate();
    });
};
fetchData();

const toggleProvince = () => {
  const isCanada = $shippingCountry.val() === 'CA';
  $caProvince.toggle(isCanada).prop('disabled', !isCanada);
  $shippingState.toggle(!isCanada).prop('disabled', isCanada).val('');
};

const calculate = () => {
  calculateShipping();
  const countryCode = $shippingCountry.val();
  const subtotal = parseFloat($subtotal.text()) || 0;
  const shippingFee = parseFloat($shippingRate.text()) || 0;
  let gst = 0, pst = 0;

  if (countryCode === 'CA') {
    console.log($caProvince.val());
    console.log(provinces);
    const province = provinces.find(p => p.short_name === $caProvince.val());
    gst = subtotal * (parseFloat(province?.gst_rate) || 0) / 100;
    pst = subtotal * (parseFloat(province?.pst_rate) || 0) / 100;
  }

  const total = subtotal + shippingFee + gst + pst;
  $gst.text(gst.toFixed(2));
  $pst.text(pst.toFixed(2));
  $cartTotal.text(total.toFixed(2));
};

const calculateShipping = () => {
  const country = countries.find(c => c.code === $shippingCountry.val());
  $shippingRate.text((parseFloat(country?.shipping_rate) || 0).toFixed(2));
};

$shippingCountry.on('change', () => {
  toggleProvince();
  calculateShipping();
  calculate();
});

$caProvince.on('change', calculate);

$sameAddress.on('change', (e) => {
  $billingAddressSection.toggle(!e.target.checked);
});

$form.on('submit', () => {
  $caProvince.prop('disabled', $caProvince.is(':hidden'));
  $shippingState.prop('disabled', $shippingState.is(':hidden'));
});

