<?php
require_once __DIR__ . '/includes/bootstrap.php';

smartwills_require_login();

$activePage = 'tools';
$pageTitle = 'SmartWills · Tools';
$pageStyles = ['tools.css'];
$pageScripts = ['tools.js'];

include __DIR__ . '/layouts/header.php';
?>
<div class="wrapper">
    <?php include __DIR__ . '/layouts/sidebar.php'; ?>
    <main class="main-content">
        <?php include __DIR__ . '/layouts/topbar.php'; ?>
        <div class="content">
            <div class="page-header">
                <div>
                    <h1><i class="fas fa-tools"></i> Tools</h1>
                    <p>Essential tools for estate planning analysis and resource access.</p>
                </div>
            </div>

            <div class="tools-grid">
                <div class="tool-card btn-card">
                    <div class="tool-icon blue"><i class="fas fa-calculator"></i></div>
                    <button class="btn-tool" id="fundingCalcBtn" onclick="window.location.href='fundingcalculator.php'">
                        Funding Calculator
                    </button>
                </div>

                <div class="tool-card btn-card">
                    <div class="tool-icon orange"><i class="fas fa-clipboard-list"></i></div>
                    <button class="btn-tool" onclick="window.location.href='clients/risk_assessment.php'">
                        Risk Assessment Form
                    </button>
                </div>

                <div class="tool-card">
                    <div class="tool-icon purple"><i class="fas fa-link"></i></div>
                    <h3>Affiliate Links</h3>
                    <div class="tool-desc">Access trusted partners for legal document preparation.</div>
                    <div class="tool-body">
                        <div class="affiliate-list">
                            <div class="affiliate-item" data-affiliate="CSPR">
                                <div class="aff-icon blue"><i class="fas fa-file-signature"></i></div>
                                <div class="aff-info"><div class="name">CSPR</div><div class="desc">Comprehensive estate planning services</div></div>
                                <div class="aff-arrow"><i class="fas fa-chevron-right"></i></div>
                            </div>
                            <div class="affiliate-item" data-affiliate="Will">
                                <div class="aff-icon green"><i class="fas fa-gavel"></i></div>
                                <div class="aff-info"><div class="name">Will Writing Service</div><div class="desc">Professional will drafting &amp; execution</div></div>
                                <div class="aff-arrow"><i class="fas fa-chevron-right"></i></div>
                            </div>
                            <div class="affiliate-item" data-affiliate="SmartWriter">
                                <div class="aff-icon orange"><i class="fas fa-pen-fancy"></i></div>
                                <div class="aff-info"><div class="name">SmartWriter</div><div class="desc">AI-powered legal document generation</div></div>
                                <div class="aff-arrow"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>© 2026 smartwillsplanner.com</footer>
        </div>
    </main>
</div>
<?php include __DIR__ . '/layouts/footer.php'; ?>