/**
 * Switch payment method selection status
 * @param {HTMLElement} el - The clicked label element
 */
function selectMethod(el) {
    document.querySelectorAll('.method-options label').forEach(l => l.classList.remove('active'));
    el.classList.add('active');
}