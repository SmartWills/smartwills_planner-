// ========== Data ==========
let cases = [
    { id: 1, client: 'Zhang Wei', type: 'Will', status: 'in-progress', submitted: '2026-06-10', updated: '2026-06-12' },
    { id: 2, client: 'Li Fang', type: 'Trust', status: 'completed', submitted: '2026-06-05', updated: '2026-06-09' },
    { id: 3, client: 'Wang Qiang', type: 'LPA', status: 'pending', submitted: '2026-06-15', updated: '2026-06-15' },
    { id: 4, client: 'Chen Mei', type: 'Will', status: 'in-review', submitted: '2026-06-12', updated: '2026-06-14' },
    { id: 5, client: 'Liu Yang', type: 'AMD', status: 'rejected', submitted: '2026-06-08', updated: '2026-06-11' }
];
let nextId = 6;

// ========== Helpers ==========
const statusDisplay = s => ({ 'in-progress':'In Progress','in-review':'In Review','completed':'Completed','rejected':'Rejected','pending':'Pending' }[s]||s);
const statusClass = s => 'status-badge ' + s;

// ========== Render ==========
function render(data) {
    const tbody = document.getElementById('caseTableBody');
    if (!data.length) {
        tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;padding:40px;color:#8aa4bc;">No cases found</td></tr>';
        updateStats([]);
        return;
    }
    tbody.innerHTML = data.map(c => `
        <tr>
            <td><span class="case-id">#${c.id}</span></td>
            <td><div class="client-name"><span class="avatar">${c.client.charAt(0)}</span>${c.client}</div></td>
            <td>${c.type}</td>
            <td><span class="${statusClass(c.status)}">${statusDisplay(c.status)}</span></td>
            <td>${c.submitted}</td>
            <td>${c.updated}</td>
            <td>
                <div class="action-cell">
                    <button class="btn-sm btn-view" data-id="${c.id}"><i class="fas fa-eye"></i> View</button>
                    <button class="btn-sm btn-edit" data-id="${c.id}"><i class="fas fa-edit"></i> Edit</button>
                    <button class="btn-sm btn-delete" data-id="${c.id}"><i class="fas fa-trash-alt"></i> Delete</button>
                </div>
            </td>
        </tr>
    `).join('');

    tbody.querySelectorAll('[data-id]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const id = parseInt(this.dataset.id);
            const c = cases.find(x => x.id === id);
            if (!c) return;
            if (this.classList.contains('btn-view')) {
                alert('📄 View case #' + id + ' for ' + c.client + ' (demo)');
            } else if (this.classList.contains('btn-edit')) {
                // Redirect to edit page
                window.location.href = 'edit_case.php?id=' + id;
            } else if (this.classList.contains('btn-delete')) {
                if (confirm('Delete case #' + id + ' for ' + c.client + '?')) {
                    cases = cases.filter(x => x.id !== id);
                    render(cases);
                    updateStats(cases);
                }
            }
        });
    });
    updateStats(data);
}

function updateStats(data) {
    const counts = { 'in-progress':0, 'in-review':0, 'completed':0, 'rejected':0, 'pending':0 };
    data.forEach(c => { if (counts.hasOwnProperty(c.status)) counts[c.status]++; });
    document.getElementById('statInProgress').textContent = counts['in-progress'];
    document.getElementById('statInReview').textContent = counts['in-review'];
    document.getElementById('statCompleted').textContent = counts['completed'];
    document.getElementById('statRejected').textContent = counts['rejected'];
    document.getElementById('statPending').textContent = counts['pending'];
}

// ========== Filter ==========
function filterCases() {
    const keyword = document.getElementById('searchInput').value.trim().toLowerCase();
    const statusFilter = document.getElementById('filterStatus').value;
    const filtered = cases.filter(c => 
        (c.client.toLowerCase().includes(keyword) || c.id.toString().includes(keyword)) &&
        (statusFilter === 'all' || c.status === statusFilter)
    );
    render(filtered);
}

// ========== Add Case Button ==========
document.getElementById('addCaseBtn').addEventListener('click', function() {
    window.location.href = 'add_case.php';
});

// ========== Init ==========
document.getElementById('searchInput').addEventListener('input', filterCases);
document.getElementById('filterStatus').addEventListener('change', filterCases);
render(cases);