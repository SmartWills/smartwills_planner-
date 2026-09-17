/**
 * Risk Assessment Page JavaScript
 * Independent of clients.js, it handles customer information display and form/result switching.
 */

(function() {
    // Static customer data (consistent with clients.js)
    const clientsData = [
        {id: 1, name: 'Zhang Wei', phone: '13812345678', status: 'active', riskScore: 8, updated: '2026-06-15'},
        {id: 2, name: 'Li Fang', phone: '13987654321', status: 'done', riskScore: 3, updated: '2026-06-10'},
        {id: 3, name: 'Wang Qiang', phone: '13755556666', status: 'pending', riskScore: 17, updated: '2026-06-12'}
    ];

    // Get client ID from URL
    const urlParams = new URLSearchParams(window.location.search);
    const clientId = parseInt(urlParams.get('id')) || 0;

    // Find the corresponding customer
    const client = clientsData.find(c => c.id === clientId);

    // Update page header
    const avatarEl = document.getElementById('clientAvatar');
    const nameEl = document.getElementById('clientNameDisplay');
    if (client) {
        avatarEl.textContent = client.name.charAt(0).toUpperCase();
        nameEl.textContent = client.name;
        // Save to global for later use
        window.currentClient = client;
    } else {
        avatarEl.textContent = '?';
        nameEl.textContent = 'Unknown Client';
        window.currentClient = null;
        // If no customer can be found, disable the button or prompt.
    }

    // Get DOM elements
    const formSection = document.getElementById('riskFormSection');
    const resultSection = document.getElementById('riskResultSection');
    const checkBtn = document.getElementById('checkResultBtn');

    // Results display elements
    const resultScore = document.getElementById('resultScore');
    const resultLevel = document.getElementById('resultLevel');
    const resultDesc = document.getElementById('resultDesc');

    // Define rating scale function
    function getRiskLevel(score) {
        return score <= 6 ? 'LOW RISK' : score <= 15 ? 'MODERATE RISK' : 'RISKY TO HIGH RISK';
    }
    function getRiskClass(score) {
        return score <= 6 ? 'low' : score <= 15 ? 'moderate' : 'high';
    }
    function getRiskDescription(score) {
        if (score <= 6) {
            return `This presumes that you already have an existing Will held in proper custody.<br>
            It is prudent to review and update your Will periodically with your Planner to ensure it continues to reflect your current wishes and circumstances.<br>
            We recommend doing this at least once every two to three years, or whenever there are significant changes in your life or financial situation.`;
        } else if (score <= 15) {
            return `It appears that your current Will, if you have one, is inadequate and does not comprehensively address your estate planning objectives.<br>
            This issue can be rectified through a consultation with your Planner, who can help identify and address any gaps by drafting a new Will or establishing Trusts.`;
        } else {
            return `Your estate affairs may be fraught with delays and disputes among your family members.<br>
            The distribution outcome could be unsatisfactory for certain beneficiaries.<br>
            There are likely to be higher costs, leakages and legal expenses in sorting out the estate.<br>
            There is an urgent need to address your estate affairs, and you should meet with your Planner as soon as possible.`;
        }
    }

    // Display results
    function showResult() {
        if (!window.currentClient) {
            alert('Client data not found. Please go back and try again.');
            return;
        }
        const score = window.currentClient.riskScore;
        const level = getRiskLevel(score);
        const levelClass = getRiskClass(score);
        const desc = getRiskDescription(score);

        resultScore.textContent = score + ' points';
        resultLevel.textContent = level;
        resultLevel.className = 'risk-level ' + levelClass;
        resultDesc.innerHTML = desc;

        // Switch display
        formSection.style.display = 'none';
        resultSection.style.display = 'block';
    }

    // Bind button events
    if (checkBtn) {
        checkBtn.addEventListener('click', showResult);
    }

    // If the customer does not exist, consider automatically returning or displaying a message.
    if (!window.currentClient) {
        // Error messages can be displayed, but redirection is not forced.
        console.warn('Client not found for id:', clientId);
        // Disable button
        if (checkBtn) checkBtn.disabled = true;
    }

})();