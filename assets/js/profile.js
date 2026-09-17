document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-demo-message]').forEach(function (button) {
        button.addEventListener('click', function () {
            alert(button.dataset.demoMessage);
        });
    });
});
