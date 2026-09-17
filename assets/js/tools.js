// ========== Global function (for HTML onclick to call) ==========
function closeRiskModal() {
    const modal = document.getElementById('riskModal');
    modal.classList.remove('open');
    document.getElementById('riskForm').style.display = 'block';
    document.getElementById('riskResult').style.display = 'none';
}
window.closeRiskModal = closeRiskModal;

function goToCheckResult() {
    const checkboxes = document.querySelectorAll('#riskForm .ck-item input[type="checkbox"]');
    let count = 0;
    checkboxes.forEach(cb => { if(cb.checked) count++; });
    const score = count;
    let rating, ratingClass, descText;
    if (score <= 5) {
        rating = 'LOW RISK';
        ratingClass = 'low';
        descText = 'This presumes that you already have an existing Will held in proper custody.<br>It is prudent to review and update your Will periodically with your Planner to ensure it continues to reflect your current wishes and circumstances.<br>We recommend doing this at least once every two to three years, or whenever there are significant changes in your life or financial situation.';
    } else if (score <= 10) {
        rating = 'MODERATE RISK';
        ratingClass = 'moderate';
        descText = 'It appears that your current Will, if you have one, is inadequate and does not comprehensively address your estate planning objectives.<br>This issue can be rectified through a consultation with your Planner, who can help identify and address any gaps by drafting a new Will or establishing Trusts.';
    } else {
        rating = 'RISKY TO HIGH RISK';
        ratingClass = 'high';
        descText = 'Your estate affairs may be fraught with delays and disputes among your family members.<br>The distribution outcome could be unsatisfactory for certain beneficiaries.<br>There are likely to be higher costs, leakages and legal expenses in sorting out the estate.<br>There is an urgent need to address your estate affairs, and you should meet with your Planner as soon as possible.';
    }

    document.getElementById('resultScore').textContent = score + ' points';
    const ratingEl = document.getElementById('resultRating');
    ratingEl.textContent = rating;
    ratingEl.className = 'rating ' + ratingClass;
    document.getElementById('resultDesc').innerHTML = descText;

    document.getElementById('riskForm').style.display = 'none';
    document.getElementById('riskResult').style.display = 'block';
}
window.goToCheckResult = goToCheckResult;

// ========== DOM Bind events after loading ==========
document.addEventListener('DOMContentLoaded', function() {

    // 1. Funds calculator redirect
    const fundingBtn = document.getElementById('fundingCalcBtn');
    if (fundingBtn) {
        fundingBtn.addEventListener('click', function() {
            // Navigate to the separate Funding Calculator page (root)
            window.location.href = 'fundingcalculator.php';
        });
    }

    // 2. Open the risk assessment modal
    const openRiskBtn = document.getElementById('openRiskModal');
    const riskModal = document.getElementById('riskModal');
    if (openRiskBtn && riskModal) {
        openRiskBtn.addEventListener('click', function() {
            document.getElementById('riskForm').style.display = 'block';
            document.getElementById('riskResult').style.display = 'none';
            // Reset all checkboxes
            document.querySelectorAll('#riskForm .ck-item input[type="checkbox"]').forEach(cb => cb.checked = false);
            riskModal.classList.add('open');
        });
    }

    // 3. Close button (id: closeRiskModal)
    const closeBtn = document.getElementById('closeRiskModal');
    if (closeBtn) {
        closeBtn.addEventListener('click', closeRiskModal);
    }

    // 4. Click to close the modal background.
    if (riskModal) {
        riskModal.addEventListener('click', function(e) {
            if (e.target === this) closeRiskModal();
        });
    }

    // 5. Click on the supplementary links
    document.querySelectorAll('.affiliate-item').forEach(el => {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            alert(' Redirecting to ' + (this.dataset.affiliate || 'partner') + ' (demo)');
        });
    });

    // 6 layout
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
            this.classList.add('active');
            const target = this.dataset.nav;
            const map = {
                dashboard: 'index.php',
                clients: 'clients/clients.php',
                cases: 'cases.php',
                tools: 'tools.php',
                education: 'education/dashboard.php',
                resources: 'resources.php',
                salesreport: 'salesreport.php'
            };
            if (target === 'tools') return;
            if (map[target]) window.location.href = map[target];
            else alert(' Navigate to ' + (this.querySelector('span')?.innerText || target));
        });
    });

    // 7.（myprofile / settings）
    document.querySelectorAll('.action-side-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const action = this.dataset.action;
            if (action === 'myprofile') alert('👤 My Profile (demo)');
            else if (action === 'settings') alert('⚙️ Settings (demo)');
            else alert(' ' + (this.querySelector('span')?.innerText || action));
        });
    });

});