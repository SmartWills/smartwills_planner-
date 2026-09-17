/**
 * Accordion folding switch
 */
function toggleAccordion(header) {
    const body = header.nextElementSibling;
    const arrow = header.querySelector('.arrow');
    const isOpen = body.classList.contains('open');
    isOpen ? (body.classList.remove('open'), arrow.classList.remove('open')) : (body.classList.add('open'), arrow.classList.add('open'));
}

let policyCount = 0;
const planTypes = ['Investment Link','Whole Life','Universal Life','Term Life','Personal Accident','Medical & Hospitalization','Endowment'];

/**
 * Add an insurance strategy
 * @param {Object} data - Optional pre-filled data
 */
function addPolicy(data) {
    policyCount++;
    const id = policyCount;
    const d = data || { company:'', policy:'', premium:'', plan:'', life:'', ci:'', term:'', pa:'' };
    const div = document.createElement('div');
    div.className = 'policy-box';
    div.id = 'policy_'+id;
    div.innerHTML = `
        <div class="policy-header">
            <strong>[${String.fromCharCode(64+policyCount)}] Insurance Company</strong>
            <button type="button" class="btn-sm btn-remove" onclick="removePolicy(${id})"><i class="fas fa-trash"></i> Remove</button>
        </div>
        <div class="row"><label>Company Name</label><input type="text" class="pCompany" value="${d.company}" placeholder="e.g. Prudential" oninput="calc()"></div>
        <div class="row"><label>Policy Number (optional)</label><input type="text" class="pPolicy" value="${d.policy}" placeholder="optional" oninput="calc()"></div>
        <div class="row"><label>Annual Premium</label><input type="number" class="pPremium" value="${d.premium||''}" step="100" placeholder="$" oninput="calc()"></div>
        <div class="row"><label>Type of Insurance Plan *</label>
            <select class="pPlan" onchange="calc()">${planTypes.map(t=>`<option value="${t}" ${t===d.plan?'selected':''}>${t}</option>`).join('')}</select>
        </div>
        <div class="row"><label>Life (optional)</label><input type="number" class="pLife" value="${d.life||''}" step="1000" placeholder="$" oninput="calc()"></div>
        <div class="row"><label>Critical Illness (optional)</label><input type="number" class="pCI" value="${d.ci||''}" step="1000" placeholder="$" oninput="calc()"></div>
        <div class="row"><label>Term Insurance (optional)</label><input type="number" class="pTerm" value="${d.term||''}" step="1000" placeholder="$" oninput="calc()"></div>
        <div class="row"><label>Personal Accident (optional)</label><input type="number" class="pPA" value="${d.pa||''}" step="1000" placeholder="$" oninput="calc()"></div>
    `;
    document.getElementById('policiesList').appendChild(div);
    calc();
}

/**
 * Remove an insurance strategy
 */
function removePolicy(id) {
    document.getElementById('policy_'+id).remove();
    calc();
}

/**
 * Toggle whether to display the insurance policy area
 */
function togglePolicies() {
    const show = document.querySelector('input[name="has_insurance"]:checked').value === 'Yes';
    document.getElementById('policiesWrap').style.display = show ? 'block' : 'none';
    if (!show) document.getElementById('policiesList').innerHTML = '';
    calc();
}

/**
 * Calculate all values ​​and update the display.
 */
function calc() {
    let cash = parseFloat(document.getElementById('cash').value)||0;
    let invest = parseFloat(document.getElementById('invest').value)||0;
    let retire = parseFloat(document.getElementById('retire').value)||0;
    document.getElementById('cashDisp').textContent = '$ '+cash.toLocaleString();
    document.getElementById('investDisp').textContent = '$ '+invest.toLocaleString();
    document.getElementById('retireDisp').textContent = '$ '+retire.toLocaleString();
    document.getElementById('sCash').textContent = '$ '+cash.toLocaleString();
    document.getElementById('sInvest').textContent = '$ '+invest.toLocaleString();
    document.getElementById('sRetire').textContent = '$ '+retire.toLocaleString();

    let totalIns = 0;
    let summaryHTML = '';
    const boxes = document.querySelectorAll('.policy-box');
    let idx = 0;
    boxes.forEach(box => {
        const company = box.querySelector('.pCompany').value || 'Unnamed';
        const life = parseFloat(box.querySelector('.pLife').value)||0;
        totalIns += life;
        idx++;
        summaryHTML += `<div class="summary-item"><span class="lbl">[${String.fromCharCode(64+idx)}] ${company}</span><span class="val">$ ${life.toLocaleString()}</span></div>`;
    });
    document.getElementById('summaryList').innerHTML = summaryHTML || '<div class="empty-summary">No insurance policies added.</div>';
    document.getElementById('sInsurance').textContent = '$ '+totalIns.toLocaleString();

    let totalMovable = cash + invest + retire + totalIns;
    let estateNeed = 3000000;
    let surplus = totalMovable - estateNeed;
    document.getElementById('totalMovable').textContent = '$ '+totalMovable.toLocaleString();
    document.getElementById('totalMovableHidden').value = totalMovable;
    document.getElementById('insuranceTotalHidden').value = totalIns;
    const surplusEl = document.getElementById('surplusVal');
    surplusEl.textContent = '$ '+surplus.toLocaleString();
    surplusEl.className = 'val ' + (surplus >= 0 ? 'surplus' : 'deficit');
    document.getElementById('surplusRow').querySelector('span:first-child').textContent = surplus >= 0 ? 'Surplus' : 'Deficit';
}

// Initialize after page load: Add sample policy and calculate.
document.addEventListener('DOMContentLoaded', function() {
    addPolicy({company:'Prudential', plan:'Whole Life', life:500000});
    addPolicy({company:'Manulife', plan:'Term Life', term:1000000, ci:200000});
    addPolicy({});
    calc();
});