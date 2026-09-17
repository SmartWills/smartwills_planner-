document.addEventListener('DOMContentLoaded', function () {
    const dateElement = document.getElementById('realTimeDate');

    function updateDate() {
        if (!dateElement) {
            return;
        }

        dateElement.innerText = new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }

    updateDate();
    setInterval(updateDate, 3600000);
});