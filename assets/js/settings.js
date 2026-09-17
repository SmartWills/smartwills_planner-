document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-demo-message]').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            alert(form.dataset.demoMessage);
        });
    });
});
