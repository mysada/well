
document.addEventListener('DOMContentLoaded', function () {
    const flashMessage = document.getElementById('flash-message');

    if (flashMessage) {
        setTimeout(() => {
            flashMessage.style.transition = 'opacity 0.5s ease';
            flashMessage.style.opacity = '0';

            setTimeout(() => {
                flashMessage.remove();
            }, 500);
        }, 2000);
    }
});
