document.getElementById('category').addEventListener('change', function () {
  let categoryId = this.value;

  fetch(`/admin/products-by-category/${categoryId}`)
    .then(response => response.json())
    .then(data => {
      let productSelect = document.getElementById('product');
      productSelect.innerHTML = '<option value="">All Products</option>';
      data.forEach(product => {
        productSelect.innerHTML += `<option value="${product.id}">${product.name}</option>`;
      });
    });
});

document.getElementById('status-dropdown').addEventListener('change', function () {
  const selectedOption = this.options[this.selectedIndex];
  this.className = `select select-bordered w-full ${selectedOption.className}`;
});

window.addEventListener('load', function () {
  const statusDropdown = document.getElementById('status-dropdown');
  const selectedOption = statusDropdown.options[statusDropdown.selectedIndex];
  statusDropdown.className = `select select-bordered w-full ${selectedOption.className}`;
});

