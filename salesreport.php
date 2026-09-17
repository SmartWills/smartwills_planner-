<?php
require_once __DIR__ . '/includes/bootstrap.php';

smartwills_require_login();

$activePage = 'salesreport';
$pageTitle = 'Sales Report - SmartWills';
$pageStyles = ['salesreport.css'];
$pageScripts = ['salesreport.js'];

include __DIR__ . '/layouts/header.php';
?>
<div class="wrapper">
    <?php include __DIR__ . '/layouts/sidebar.php'; ?>

    <main class="main-content">
        <?php include __DIR__ . '/layouts/topbar.php'; ?>

        <div class="content">
            <header class="page-header">
                <h1><i class="fas fa-chart-line"></i> Sales Report</h1>
                <div class="date-range">
                    <i class="fas fa-calendar-alt"></i>
                    <select id="dateRangeSelect">
                        <option value="this_month">This Month</option>
                        <option value="last_month">Last Month</option>
                        <option value="this_quarter">This Quarter</option>
                        <option value="this_year">This Year</option>
                    </select>
                    <button class="btn-outline" id="exportBtn">
                        <i class="fas fa-download"></i>
                        Export
                    </button>
                </div>
            </header>

            <section class="stats-grid" aria-label="Sales statistics">
                <article class="stat-card">
                    <div class="stat-icon green"><i class="fas fa-dollar-sign"></i></div>
                    <div class="stat-info">
                        <div class="stat-number">$124,580</div>
                        <div class="stat-label">Total Commission</div>
                    </div>
                </article>
                <article class="stat-card">
                    <div class="stat-icon blue"><i class="fas fa-file-invoice"></i></div>
                    <div class="stat-info">
                        <div class="stat-number">47</div>
                        <div class="stat-label">Closed Deals</div>
                    </div>
                </article>
                <article class="stat-card">
                    <div class="stat-icon orange"><i class="fas fa-user-check"></i></div>
                    <div class="stat-info">
                        <div class="stat-number">32</div>
                        <div class="stat-label">Active Clients</div>
                    </div>
                </article>
                <article class="stat-card">
                    <div class="stat-icon purple"><i class="fas fa-trophy"></i></div>
                    <div class="stat-info">
                        <div class="stat-number">#2</div>
                        <div class="stat-label">Ranking</div>
                    </div>
                </article>
            </section>

            <section class="report-grid" aria-label="Sales reports">
                <article class="report-card" data-report="commission">
                    <div class="icon-wrap green"><i class="fas fa-file-invoice-dollar"></i></div>
                    <h4>Commission Statement</h4>
                    <p>Detailed breakdown of commissions earned per deal, with payment status and history.</p>
                    <div class="meta">
                        <span class="badge green">12 statements</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </article>

                <article class="report-card" data-report="performance">
                    <div class="icon-wrap blue"><i class="fas fa-chart-bar"></i></div>
                    <h4>Performance Reports</h4>
                    <p>Track monthly &amp; quarterly KPIs, conversion rates, and overall sales performance.</p>
                    <div class="meta">
                        <span class="badge">8 reports</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </article>

                <article class="report-card" data-report="payout">
                    <div class="icon-wrap purple"><i class="fas fa-wallet"></i></div>
                    <h4>Payout History</h4>
                    <p>Complete record of commission payouts, dates, and bank transaction references.</p>
                    <div class="meta">
                        <span class="badge">18 entries</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </article>
            </section>
        </div>
    </main>
</div>
<?php include __DIR__ . '/layouts/footer.php'; ?>
