
document.addEventListener("DOMContentLoaded", function() {
// Show the Order History section by default on page load
document.getElementById('order-history').style.display = 'block';

document.querySelectorAll('.profile-link').forEach(link => {
link.addEventListener('click', function() {
document.querySelectorAll('.profile-section').forEach(section => section.style.display = 'none');
const sectionId = this.getAttribute('data-section');
document.getElementById(sectionId).style.display = 'block';
});
});
});
