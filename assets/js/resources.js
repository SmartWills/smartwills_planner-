document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.res-card').forEach(function (card) {
        card.addEventListener('click', function () {
            const title = card.querySelector('h4').textContent;
            alert('Opening "' + title + '" (demo)');
        });
    });

    const supportButton = document.getElementById('supportBtn');

    if (supportButton) {
        supportButton.addEventListener('click', function () {
            alert('Support & Ticketing (demo)');
        });
    }
});
