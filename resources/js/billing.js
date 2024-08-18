document.addEventListener('DOMContentLoaded', function () {
  const countrySelects = document.querySelectorAll('#billing-country, #shipping-country');
  const stateSelects = document.querySelectorAll('#billing-state, #shipping-state');

  countrySelects.forEach(select => {
    select.addEventListener('change', function () {
      const country = this.value;
      stateSelects.forEach(stateSelect => {
        stateSelect.innerHTML = '<option value="">Select Province/State</option>';
        if (country === 'Canada') {
          stateSelect.innerHTML += '<option value="AB">Alberta</option><option value="BC">British Columbia</option><option value="MB">Manitoba</option><option value="NB">New Brunswick</option><option value="NL">Newfoundland and Labrador</option><option value="NS">Nova Scotia</option><option value="NT">Northwest Territories</option><option value="NU">Nunavut</option><option value="ON">Ontario</option><option value="PE">Prince Edward Island</option><option value="QC">Quebec</option><option value="SK">Saskatchewan</option><option value="YT">Yukon</option>';
        } else if (country === 'USA') {
          stateSelect.innerHTML += '<option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option>';
        }
      });
    });
  });

  // Initial population of states/provinces
  countrySelects.forEach(select => select.dispatchEvent(new Event('change')));
});

// Toggle Billing Address
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

// Increment and decrement buttons functionality
document.querySelectorAll('.btn-increment').forEach(button => {
  button.addEventListener('click', function () {
    const input = this.previousElementSibling;
    input.value = parseInt(input.value) + 1;
    updateCartSummary();
  });
});

document.querySelectorAll('.btn-decrement').forEach(button => {
  button.addEventListener('click', function () {
    const input = this.nextElementSibling;
    if (parseInt(input.value) > 0) {
      input.value = parseInt(input.value) - 1;
      updateCartSummary();
    }
  });
});

// Tax calculation function
function calculateTax(province) {
  let gst = 0, pst = 0, hst = 0;
  switch (province) {
    case 'AB':
    case 'NT':
    case 'NU':
    case 'YT':
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
    case 'NB':
    case 'NL':
    case 'NS':
    case 'PE':
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

document.getElementById('billing-state').addEventListener('change', updateCartSummary);
document.getElementById('billing-country').addEventListener('change', updateCartSummary);

// Initial tax and total calculation
updateCartSummary();
