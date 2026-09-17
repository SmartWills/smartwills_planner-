/**
 * Accordion folding switch
 * @param {HTMLElement} header - The clicked accordion-header element
 */
function toggleAccordion(header) {
    const body = header.nextElementSibling;
    const arrow = header.querySelector('.arrow');
    const isOpen = body.classList.contains('open');
    
    if (isOpen) {
        body.classList.remove('open');
        arrow.classList.remove('open');
    } else {
        body.classList.add('open');
        arrow.classList.add('open');
    }
}

/**
 * Calculate all fields and update the display.
 */
function calc() {
    // A. Estate Administration Fee
    let asset = parseFloat(document.getElementById('assetValue').value) || 0;
    let admin = asset * 0.05;
    document.getElementById('adminFeeDisplay').textContent = '$ ' + admin.toLocaleString();
    document.getElementById('adminFeeSubTotal').textContent = '$ ' + admin.toLocaleString();
    document.getElementById('adminFeeHidden').value = admin;
    document.getElementById('adminFeeFormula').textContent = 
        'Estate Administration Fee (A): ' + asset.toLocaleString() + ' × 5% = ' + admin.toLocaleString();

    // B. Family Living Expenses
    const bIds = ['living','parent','guardian','edu','medical','emergency'];
    let familyTotal = 0;
    bIds.forEach(id => {
        let v1 = parseFloat(document.getElementById(id+'_val1').value) || 0;
        let v2 = parseFloat(document.getElementById(id+'_val2')?.value) || 0;
        let total = id === 'emergency' ? v1 : v1 * v2 * (id === 'edu' || id === 'medical' ? 1 : 12);
        document.getElementById(id+'_total').textContent = '$ ' + total.toLocaleString();
        familyTotal += total;
    });
    document.getElementById('familyTotalDisplay').textContent = '$ ' + familyTotal.toLocaleString();
    document.getElementById('familyTotalHidden').value = familyTotal;

    // C. Personal Debts
    const cIds = ['debt_loan','debt_car','debt_housing','debt_others'];
    let debtTotal = 0;
    cIds.forEach(id => {
        let val = parseFloat(document.getElementById(id).value) || 0;
        document.getElementById(id+'_display').textContent = '$ ' + val.toLocaleString();
        debtTotal += val;
    });
    document.getElementById('debtTotalDisplay').textContent = '$ ' + debtTotal.toLocaleString();
    document.getElementById('debtTotalHidden').value = debtTotal;

    // Grand Total
    let grand = admin + familyTotal + debtTotal;
    document.getElementById('grandTotalDisplay').textContent = '$ ' + grand.toLocaleString();
    document.getElementById('grandTotalHidden').value = grand;
}

// Page loaded, calculate once
document.addEventListener('DOMContentLoaded', calc);