<?php
require_once __DIR__ . '/includes/bootstrap.php';

smartwills_require_login();

$activePage = 'cases';
$pageTitle = 'Case Management · SmartWills';
$pageStyles = ['cases.css'];
$pageScripts = ['cases.js'];

include __DIR__ . '/layouts/header.php';
?>
<div class="wrapper">
    <?php include __DIR__ . '/layouts/sidebar.php'; ?>
    <main class="main-content">
        <?php include __DIR__ . '/layouts/topbar.php'; ?>
        <div class="content">
            <div class="page-header">
                <h1><i class="fas fa-gavel"></i> Case Management</h1>
                <button class="btn-primary" id="addCaseBtn"><i class="fas fa-plus"></i> Add Case</button>
            </div>

            <div class="stats-grid">
                <div class="stat-card"><div class="stat-icon blue"><i class="fas fa-spinner"></i></div><div><div class="stat-number" id="statInProgress">0</div><div class="stat-label">In Progress</div></div></div>
                <div class="stat-card"><div class="stat-icon orange"><i class="fas fa-search"></i></div><div><div class="stat-number" id="statInReview">0</div><div class="stat-label">In Review</div></div></div>
                <div class="stat-card"><div class="stat-icon green"><i class="fas fa-check-circle"></i></div><div><div class="stat-number" id="statCompleted">0</div><div class="stat-label">Completed</div></div></div>
                <div class="stat-card"><div class="stat-icon red"><i class="fas fa-times-circle"></i></div><div><div class="stat-number" id="statRejected">0</div><div class="stat-label">Rejected</div></div></div>
                <div class="stat-card"><div class="stat-icon purple"><i class="fas fa-clock"></i></div><div><div class="stat-number" id="statPending">0</div><div class="stat-label">Pending</div></div></div>
            </div>

            <div class="toolbar">
                <div class="search-box"><i class="fas fa-search"></i><input type="text" placeholder="Search by client / case ID" id="searchInput"></div>
                <div class="filter-group">
                    <select id="filterStatus">
                        <option value="all">All Status</option>
                        <option value="in-progress">In Progress</option>
                        <option value="in-review">In Review</option>
                        <option value="completed">Completed</option>
                        <option value="rejected">Rejected</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
            </div>

            <div class="table-wrapper">
                <div class="table-scroll">
                    <table class="case-table">
                        <thead><tr><th>Case ID</th><th>Client</th><th>Case Type</th><th>Status</th><th>Submitted</th><th>Updated</th><th>Actions</th></tr></thead>
                        <tbody id="caseTableBody"></tbody>
                    </table>
                </div>
            </div>
            <footer>© 2026 smartwillsplanner.com</footer>
        </div>
    </main>
</div>
<?php include __DIR__ . '/layouts/footer.php'; ?>