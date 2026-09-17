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
    <title>Estate Fund Need Analysis · SmartWills</title>
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/topbar.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/reviewresources.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <?php include '../../layouts/sidebar.php'; ?>
    <div class="main-content">
        <?php include '../../layouts/topbar.php'; ?>
        <div class="content">
            <div class="review-wrapper">
                <!-- progress bar -->
                <div class="progress-steps">
                    <div class="step"><span class="circle">1</span><span class="label">My Assets</span></div>
                    <div class="step"><span class="circle">2</span><span class="label">Estate Planning Checklist</span></div>
                    <div class="step active"><span class="circle">3</span><span class="label">Estate Fund Need Analysis</span></div>
                    <div class="step"><span class="circle">4</span><span class="label">Funding Gap</span></div>
                    <div class="step"><span class="circle">5</span><span class="label">Product Recommendations</span></div>
                    <div class="step"><span class="circle">6</span><span class="label">Payment</span></div>
                </div>

                <div class="header">
                    <h1><i class="fas fa-calculator"></i> Estate Fund Need Analysis</h1>
                    <div class="client-info">
                        <span class="avatar"><?php echo strtoupper(substr(trim($clientName), 0, 1)); ?></span>
                        <span class="client-name-text"><?php echo htmlspecialchars($clientName); ?></span>
                    </div>
                </div>

                <div class="section-intro">
                    <i class="fas fa-info-circle intro-icon"></i>
                    This section allows you to determine the amount of funding needed for your estate plan when you pass on.
                </div>

                <form method="POST" action="fundinggap.php">
                    <input type="hidden" name="client_id" value="<?=$clientId?>">

                    <!-- A. Estate Administration Fee -->
                    <div class="accordion-section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <span class="title"><i class="fas fa-file-invoice-dollar"></i> A. Estate Administration Fee <span class="badge">5%</span></span>
                            <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-body">
                            <div class="a-row">
                                <label>Total value of movable &amp; immovable assets</label>
                                <input type="number" id="assetValue" value="5000000" step="1000" oninput="calc()">
                                <span class="total" id="adminFeeDisplay">$ 250,000</span>
                            </div>
                            <div class="desc-text">
                                <i class="fas fa-info-circle desc-icon"></i>
                                Estate Administration Fee refers to the cost associated with managing and settling an individual's estate after their passing. This includes legal fees, executor fees, court costs, and expenses related to the distribution of assets, payment of debts, and resolution of estate-related matters.
                            </div>
                            <div class="sub-total">
                                <span class="formula" id="adminFeeFormula">Estate Administration Fee (A): 5,000,000 × 5% = 250,000</span>
                                <span class="amt" id="adminFeeSubTotal">$ 250,000</span>
                                <input type="hidden" name="admin_fee" id="adminFeeHidden" value="250000">
                            </div>
                        </div>
                    </div>

                    <!-- B. Family Living Expenses -->
                    <div class="accordion-section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <span class="title"><i class="fas fa-home"></i> B. Family Living Expenses</span>
                            <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-body">
                            <?php
                            $bItems = [
                                ['label'=>'1. Living expenses', 'id'=>'living', 'val1'=>25000, 'val2'=>10, 'unit1'=>'Monthly ×', 'unit2'=>'years'],
                                ['label'=>'2. Allowance for parent', 'id'=>'parent', 'val1'=>25000, 'val2'=>10, 'unit1'=>'Monthly ×', 'unit2'=>'years'],
                                ['label'=>'3. Allowance for guardian', 'id'=>'guardian', 'val1'=>25000, 'val2'=>10, 'unit1'=>'Monthly ×', 'unit2'=>'years'],
                                ['label'=>'4. Education Fund', 'id'=>'edu', 'val1'=>300000, 'val2'=>3, 'unit1'=>'per child ×', 'unit2'=>'children'],
                                ['label'=>'5. Medical & healthcare fund', 'id'=>'medical', 'val1'=>100000, 'val2'=>2, 'unit1'=>'per pax ×', 'unit2'=>'pax'],
                                ['label'=>'6. Emergency Fund', 'id'=>'emergency', 'val1'=>200000, 'val2'=>0, 'unit1'=>'Lumpsum', 'unit2'=>'']
                            ];
                            foreach($bItems as $b):
                                $isEmergency = $b['id'] === 'emergency';
                            ?>
                            <div class="b-row">
                                <label><?=$b['label']?></label>
                                <input type="number" id="<?=$b['id']?>_val1" value="<?=$b['val1']?>" step="<?=$isEmergency?1000:100?>" oninput="calc()">
                                <span class="unit"><?=$b['unit1']?></span>
                                <?php if(!$isEmergency): ?>
                                <input type="number" id="<?=$b['id']?>_val2" value="<?=$b['val2']?>" step="1" oninput="calc()">
                                <span class="unit"><?=$b['unit2']?></span>
                                <?php else: ?>
                                <span class="unit"></span><span></span>
                                <?php endif; ?>
                                <span class="total" id="<?=$b['id']?>_total">$ <?=number_format($b['val1'] * ($b['val2'] ?: 1))?></span>
                            </div>
                            <?php endforeach; ?>
                            <div class="sub-total">
                                <span>Sub-total (B):</span>
                                <span class="amt" id="familyTotalDisplay">$ 2,500,000</span>
                                <input type="hidden" name="family_total" id="familyTotalHidden" value="2500000">
                            </div>
                        </div>
                    </div>

                    <!-- C. Personal Debts -->
                    <div class="accordion-section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <span class="title"><i class="fas fa-credit-card"></i> C. Personal Debts</span>
                            <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-body">
                            <?php
                            $cItems = [
                                ['label'=>'1. Personal Loan / Credit Cards', 'id'=>'debt_loan', 'val'=>20000],
                                ['label'=>'2. Car Loan', 'id'=>'debt_car', 'val'=>200000],
                                ['label'=>'3. Housing Loan', 'id'=>'debt_housing', 'val'=>500000],
                                ['label'=>'4. Personal Guarantor / Others', 'id'=>'debt_others', 'val'=>10000]
                            ];
                            foreach($cItems as $c):
                            ?>
                            <div class="c-row">
                                <label><?=$c['label']?></label>
                                <input type="number" id="<?=$c['id']?>" value="<?=$c['val']?>" step="100" oninput="calc()">
                                <span class="total" id="<?=$c['id']?>_display">$ <?=number_format($c['val'])?></span>
                            </div>
                            <?php endforeach; ?>
                            <div class="sub-total">
                                <span>Sub-total (C):</span>
                                <span class="amt" id="debtTotalDisplay">$ 730,000</span>
                                <input type="hidden" name="debt_total" id="debtTotalHidden" value="730000">
                            </div>
                        </div>
                    </div>

                    <!-- Grand Total -->
                    <div class="grand-total">
                        <span class="label">The Total Amount of Estate Funds Needed (A+B+C)</span>
                        <span class="amt" id="grandTotalDisplay">$ 3,480,000</span>
                        <input type="hidden" name="grand_total" id="grandTotalHidden" value="3480000">
                    </div>

                    <div class="btn-row">
                        <a href="epchecklist.php?id=<?=$clientId?>" class="btn btn-back"><i class="fas fa-arrow-left"></i> Back to Checklist</a>
                        <button type="submit" class="btn btn-next">Go to Funding Gap <i class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Referencing external JavaScript (after separation) -->
<script src="../../assets/js/global.js"></script>
<script src="../../assets/js/reviewresources.js"></script>
</body>
</html>