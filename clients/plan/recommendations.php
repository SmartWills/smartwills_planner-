<?php
$activePage = 'clients';
$clientId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$clientName = 'Zhang Wei';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Product Recommendations Â· SmartWills</title>
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/topbar.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/recommendations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <?php include '../../layouts/sidebar.php'; ?>
    <div class="main-content">
        <?php include '../../layouts/topbar.php'; ?>
        <div class="content">
            <div class="rec-wrapper">
                <div class="progress-steps">
                    <div class="step"><span class="circle">1</span><span class="label">My Assets</span></div>
                    <div class="step"><span class="circle">2</span><span class="label">Estate Planning Checklist</span></div>
                    <div class="step"><span class="circle">3</span><span class="label">Estate Fund Need Analysis</span></div>
                    <div class="step"><span class="circle">4</span><span class="label">Funding Gap</span></div>
                    <div class="step active"><span class="circle">5</span><span class="label">Product Recommendations</span></div>
                    <div class="step"><span class="circle">6</span><span class="label">Payment</span></div>
                </div>

                <div class="header">
                    <h1><i class="fas fa-gem"></i> Product Recommendations</h1>
                    <div class="client-info">
                        <span class="avatar"><?php echo strtoupper(substr(trim($clientName), 0, 1)); ?></span>
                        <span class="client-name-text"><?php echo htmlspecialchars($clientName); ?></span>
                    </div>
                </div>

                <div class="product-grid">
                    <div class="product-card">
                        <div class="price">Testament</div>
                        <h3>Comprehensive Last Will &amp; Testament</h3>
                        <div class="desc">A foundational document ensuring your assets are distributed exactly as you intend, protecting your heirs from legal complexity.</div>
                        <ul class="features">
                            <li>Asset Allocation Strategy</li>
                            <li>Guardianship Appointments</li>
                            <li>Executor Powers Definition</li>
                        </ul>
                        <button class="btn btn-primary">Add to Planning Cart</button>
                    </div>
                    <div class="product-card">
                        <div class="price">Personal Welfare</div>
                        <h3>LPA Form 1</h3>
                        <div class="desc">Lasting Power of Attorney (Personal Welfare &amp; Property). Nominate trusted individuals to manage affairs if you lose capacity.</div>
                        <ul class="features">
                            <li>Medical Decision Mandate</li>
                            <li>Financial Transaction Rights</li>
                            <li>Donor Preference Clauses</li>
                        </ul>
                        <button class="btn btn-primary">Add to Planning Cart</button>
                    </div>
                    <div class="product-card">
                        <div class="price">Custom</div>
                        <h3>SmartCare Trust</h3>
                        <div class="desc">An advanced trust structure designed for high-value asset protection and seamless generational wealth transfer.</div>
                        <ul class="features">
                            <li>Probate Avoidance</li>
                            <li>Tax Optimization Layer</li>
                            <li>Creditor Protection</li>
                        </ul>
                        <button class="btn btn-primary">Inquire for Custom Quote</button>
                    </div>
                    <div class="product-card">
                        <div class="price">Included</div>
                        <h3>AMD (Advanced)</h3>
                        <div class="desc">Ensure your healthcare preferences are honored in terminal situations. A critical companion to the Personal Will.</div>
                        <ul class="features">
                            <li>Life-Sustaining Treatment Logic</li>
                            <li>Palliative Care Priorities</li>
                            <li>Legal Clarity for Physicians</li>
                        </ul>
                        <button class="btn btn-primary">Include in Plan</button>
                    </div>
                </div>

                <div class="footer-cta">
                    <div class="text">
                        <i class="fas fa-shield-alt"></i>
                        Secure Your Family's Tomorrow, Today.
                        <span>Our legal advisors are standing by to review your selections and ensure absolute compliance with current estate laws.</span>
                    </div>
                    <div class="experts">
                        <i class="fas fa-user-check"></i> 12+ Experts Available for Review
                    </div>
                    <button class="btn-cta"><i class="fas fa-phone-alt"></i> Get Free Consultation</button>
                </div>

                <div class="btns">
                    <a href="fundinggap.php?id=<?=$clientId?>" class="btn btn-back"><i class="fas fa-arrow-left"></i> Back to Funding Gap</a>
                    <a href="payment.php?id=<?=$clientId?>" class="btn btn-next">Go to Payment <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../assets/js/global.js"></script>
</body>
</html>

