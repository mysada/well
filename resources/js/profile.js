document.addEventListener("DOMContentLoaded", function () {
    // Default behavior: Show the Order History section
    document.getElementById('order-history').style.display = 'block';

    // Check if any invalid-feedback elements are visible
    const invalidFeedbackElements = document.querySelectorAll('.invalid-feedback');
    let hasErrors = false;
    let firstErrorElement = null;

    invalidFeedbackElements.forEach(element => {
        if (element.textContent.trim() !== '') {
            hasErrors = true;
            if (!firstErrorElement) {
                // Store the first element with an error
                firstErrorElement = element;
            }
        }
    });

    // If there are validation errors, show the Settings section
    if (hasErrors) {
        document.querySelectorAll('.profile-section').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById('settings').style.display = 'block';

        // Scroll to the first error element
        if (firstErrorElement) {
            firstErrorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    // Event listener for profile links to switch sections
    document.querySelectorAll('.profile-link').forEach(link => {
        link.addEventListener('click', function () {
            document.querySelectorAll('.profile-section').forEach(section => {
                section.style.display = 'none';
            });
            const sectionId = this.getAttribute('data-section');
            document.getElementById(sectionId).style.display = 'block';
        });
    });
});
