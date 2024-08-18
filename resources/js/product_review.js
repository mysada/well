document.addEventListener('DOMContentLoaded', function () {
  const firstErrorElement = document.getElementById('first-error');

  if (firstErrorElement) {
    firstErrorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
    firstErrorElement.focus();
  }
});
