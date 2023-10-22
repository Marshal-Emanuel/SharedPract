document.addEventListener('DOMContentLoaded', function () {
    const bookButtons = document.querySelectorAll('.book-button');
    const iframe = document.getElementById('bookingFormFrame');
    const popupOverlay = document.getElementById('popup-container');

    bookButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const carName = button.getAttribute('data-car');
            // Load the booking form in the iframe
            iframe.src = 'bookingForm.php?car=' + carName;
            // Display the modal popup
            popupOverlay.style.display = 'block';
        });
    });
});

function closePopup() {
    const popupOverlay = document.getElementById('popup-container');
    // Hide the modal popup
    popupOverlay.style.display = 'none';
}
