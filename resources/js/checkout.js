import $ from 'jquery';

let countries = [], provinces = [];

const fetchData = async () => {
  const [countryData, provinceData] = await Promise.all([
    $.getJSON('/api/countries'),
    $.getJSON('/api/provinces'),
  ]);
  countries = countryData.status === 'success' ? countryData.data : [];
  provinces = provinceData.status === 'success' ? provinceData.data : [];
};

const toggleProvince = () => {
  const isCanada = $('#shipping-country').val() === 'CA';
  $('#ca-province').toggle(isCanada).prop('disabled', !isCanada);
  $('#shipping-state').toggle(!isCanada).prop('disabled', isCanada).val('');
};

const calculate = () => {
  const countryCode = $('#shipping-country').val();
  const subtotal = parseFloat($('#subtotal').text()) || 0;
  const shippingFee = parseFloat($('#shipping_rate').text()) || 0;
  let gst = 0, pst = 0;

  if (countryCode === 'CA') {
    const province = provinces.find(p => p.short_name === $('#ca-province').val());
    gst = subtotal * (parseFloat(province?.gst_rate) || 0) / 100;
    pst = subtotal * (parseFloat(province?.pst_rate) || 0) / 100;
  }

  const total = subtotal + shippingFee + gst + pst;
  $('#gst').text(gst.toFixed(2));
  $('#pst').text(pst.toFixed(2));
  $('#cart-total').text(total.toFixed(2));
};

$('#shipping-country').on('change', () => {
  toggleProvince();
  const country = countries.find(c => c.code === $('#shipping-country').val());
  $('#shipping_rate').text((parseFloat(country?.shipping_rate) || 0).toFixed(2));
  calculate();
});

$('#ca-province').on('change', calculate);

$('#same-address').on('change', (e) => {
  $('#billing-address-section').toggle(!e.target.checked);
});

$('form').on('submit', (e) => {
  $('#ca-province, #shipping-state').each((_, el) => {
    $(el).prop('disabled', $(el).is(':hidden'));
  });
});

$(async () => {
  await fetchData();
  toggleProvince();
  calculate();
});
