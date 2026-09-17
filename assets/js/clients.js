/**
 * Clients Page JavaScript
 * 
 * Changes:
 * - "Add Client" button redirects to add_client.php
 * - Risk Analyze redirects to risk_assessment.php
 * - Edit button now redirects to edit_client.php?id=...
 * - Removed modal display logic
 */

// ===== Data =====
const clients = [
    {id:1, name:'Zhang Wei', phone:'13812345678', status:'active', riskScore:8, updated:'2026-06-15'},
    {id:2, name:'Li Fang', phone:'13987654321', status:'done', riskScore:3, updated:'2026-06-10'},
    {id:3, name:'Wang Qiang', phone:'13755556666', status:'pending', riskScore:17, updated:'2026-06-12'}
];

// ===== Helper functions =====
function getRiskLevel(score) {
    return score <= 6 ? 'Low' : score <= 15 ? 'Moderate' : 'High';
}
function getRiskClass(score) {
    return score <= 6 ? 'low' : score <= 15 ? 'moderate' : 'high';
}
function getStatusLabel(status) {
    return {active:'Active', done:'Completed', pending:'Pending'}[status] || status;
}
function getStatusClass(status) {
    return {active:'active', done:'done', pending:'pending'}[status] || 'pending';
}

// ===== Render Table =====
function render(data) {
    const tbody = document.getElementById('clientTableBody');
    if (!data.length) {
        tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;padding:40px;color:#8aa4bc;">No clients found</td></tr>';
        return;
    }
    tbody.innerHTML = data.map(c => `
        <tr>
            <td><div class="client-name"><span class="avatar">${c.name.charAt(0)}</span>${c.name}</div></td>
            <td>${c.phone || '—'}</td>
            <td><span class="risk-badge ${getRiskClass(c.riskScore)}">${c.riskScore} · ${getRiskLevel(c.riskScore)}</span></td>
            <td><span class="status-badge ${getStatusClass(c.status)}">${getStatusLabel(c.status)}</span></td>
            <td>${c.updated || '—'}</td>
            <td><button class="btn-sm btn-risk-analyze" data-id="${c.id}"><i class="fas fa-chart-line"></i> Risk Analyze</button></td>
            <td><div class="action-cell">
                <button class="btn-sm btn-plan" data-id="${c.id}"><i class="fas fa-route"></i> Plan</button>
                <button class="btn-sm btn-edit" data-id="${c.id}"><i class="fas fa-edit"></i> Edit</button>
                <button class="btn-sm btn-delete" data-id="${c.id}"><i class="fas fa-trash-alt"></i> Delete</button>
            </div></td>
        </tr>
    `).join('');

    // Attach events
    document.querySelectorAll('[data-id]').forEach(btn => {
        btn.onclick = function(e) {
            e.stopPropagation();
            const id = parseInt(this.dataset.id);
            const client = clients.find(c => c.id === id);
            if (!client) return;
            if (this.classList.contains('btn-plan')) {
                window.location.href = 'plan/myassets.php?id=' + id;
            } else if (this.classList.contains('btn-edit')) {
                
                window.location.href = 'edit_client.php?id=' + id;
            } else if (this.classList.contains('btn-delete')) {
                alert('Delete client: ' + client.name + ' (demo)');
            } else if (this.classList.contains('btn-risk-analyze')) {
                window.location.href = 'risk_assessment.php?id=' + id;
            }
        };
    });
}

// ===== Filter & Search =====
document.getElementById('searchInput').oninput = function() {
    const keyword = this.value.trim().toLowerCase();
    render(clients.filter(c => 
        c.name.toLowerCase().includes(keyword) || 
        (c.phone && c.phone.includes(keyword))
    ));
};
document.getElementById('filterRisk').onchange = function() {
    const val = this.value;
    render(clients.filter(c => val === 'all' || getRiskLevel(c.riskScore).toLowerCase() === val));
};
document.getElementById('filterStatus').onchange = function() {
    const val = this.value;
    render(clients.filter(c => val === 'all' || c.status === val));
};

// ===== Add Client Button =====
document.getElementById('addClientBtn').onclick = function() {
    window.location.href = 'add_client.php';
};

// ===== Initial Render =====
document.addEventListener('DOMContentLoaded', function() {
    render(clients);
});