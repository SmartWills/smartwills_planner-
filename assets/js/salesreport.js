document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.report-card').forEach(function (card) {
        card.addEventListener('click', function () {
            const title = card.querySelector('h4').textContent;
            alert('Opening "' + title + '" (demo)');
        });
    });

    const exportButton = document.getElementById('exportBtn');
    const dateRangeSelect = document.getElementById('dateRangeSelect');

    if (exportButton) {
        exportButton.addEventListener('click', function () {
            alert('Exporting report as CSV (demo)');
        });
    }

    if (dateRangeSelect) {
        dateRangeSelect.addEventListener('change', function () {
            alert('Filter: ' + this.options[this.selectedIndex].text + ' (demo)');
        });
    }
});
