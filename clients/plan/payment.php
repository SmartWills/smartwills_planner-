<?php
$activePage = 'clients';
$clientId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$clientName = 'Zhang Wei';
$paymentSuccess = isset($_GET['status']) && $_GET['status'] === 'success';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Payment · SmartWills</title>
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/topbar.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <?php include '../../layouts/sidebar.php'; ?>
    <div class="main-content">
        <?php include '../../layouts/topbar.php'; ?>
        <div class="content">
            <div class="payment-wrapper">
                <!-- progress bar -->
                <div class="progress-steps">
                    <div class="step"><span class="circle">1</span><span class="label">My Assets</span></div>
                    <div class="step"><span class="circle">2</span><span class="label">Estate Planning Checklist</span></div>
                    <div class="step"><span class="circle">3</span><span class="label">Estate Fund Need Analysis</span></div>
                    <div class="step"><span class="circle">4</span><span class="label">Funding Gap</span></div>
                    <div class="step"><span class="circle">5</span><span class="label">Product Recommendations</span></div>
                    <div class="step active"><span class="circle">6</span><span class="label">Payment</span></div>
                </div>

                <div class="header">
                    <h1><i class="fas fa-credit-card"></i> Payment</h1>
                    <span class="total-badge"><i class="fas fa-tag"></i> $1,200</span>
                </div>

                <?php if ($paymentSuccess): ?>
                <div class="success-box">
                    <i class="fas fa-check-circle"></i>
                    <div class="msg">Payment successful! Your estate plan has been confirmed.</div>
                </div>
                <?php endif; ?>

                <div class="payment-summary">
                    <div class="row"><span class="lbl">Comprehensive Last Will &amp; Testament</span><span class="val">$1,200</span></div>
                    <div class="row"><span class="lbl">LPA Form 1</span><span class="val">$0</span></div>
                    <div class="row"><span class="lbl">SmartCare Trust</span><span class="val">Custom Quote</span></div>
                    <div class="row"><span class="lbl">AMD (Advanced)</span><span class="val">Included</span></div>
                    <div class="row total"><span class="lbl">Total Amount</span><span class="val">$1,200</span></div>
                </div>

                <div class="payment-methods">
                    <span class="label">Select Payment Method</span>
                    <div class="method-options <?= $paymentSuccess ? 'is-disabled' : '' ?>">
                        <label class="active" onclick="selectMethod(this)">
                            <input type="radio" name="method" value="card" checked>
                            <span><i class="fas fa-credit-card"></i> Credit Card</span>
                        </label>
                        <label onclick="selectMethod(this)">
                            <input type="radio" name="method" value="paypal">
                            <span><i class="fab fa-paypal"></i> PayPal</span>
                        </label>
                        <label onclick="selectMethod(this)">
                            <input type="radio" name="method" value="bank">
                            <span><i class="fas fa-university"></i> Bank Transfer</span>
                        </label>
                    </div>
                </div>

                <div class="card-details <?= $paymentSuccess ? 'is-disabled' : '' ?>" id="cardDetails">
                    <div class="row">
                        <label>Card Number</label>
                        <input type="text" placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="row">
                        <label>Cardholder Name</label>
                        <input type="text" placeholder="John Doe">
                    </div>
                    <div class="row">
                        <label>Expiry Date</label>
                        <input type="text" placeholder="MM/YY" class="half">
                        <label class="cvv-label">CVV</label>
                        <input type="text" placeholder="123" class="cvv-input">
                    </div>
                </div>

                <div class="btns">
                    <a href="recommendations.php?id=<?=$clientId?>" class="btn btn-back"><i class="fas fa-arrow-left"></i> Back to Recommendations</a>
                    <?php if ($paymentSuccess): ?>
                        <a href="../clients.php" class="btn btn-success"><i class="fas fa-check"></i> Back to Clients</a>
                    <?php else: ?>
                        <a href="payment.php?id=<?=$clientId?>&status=success" class="btn btn-pay"><i class="fas fa-lock"></i> Pay $1,200</a>
                    <?php endif; ?>
                </div>
                <div class="secure-note"><i class="fas fa-lock"></i> Your payment is secure and encrypted.</div>
            </div>
        </div>
    </div>
</div>

<!-- Referencing external JavaScript (after separation) -->
<script src="../../assets/js/global.js"></script>
<script src="../../assets/js/payment.js"></script>
</body>
</html>