/**
 * Add Client Page JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {
    // You can add any front-end validation.
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const name = document.querySelector('input[name="client_name"]');
            const contact = document.querySelector('input[name="contact"]');
            if (!name.value.trim() || !contact.value.trim()) {
                e.preventDefault();
                alert('Please fill in both Client Name and Contact fields.');
            }
        });
    }
});