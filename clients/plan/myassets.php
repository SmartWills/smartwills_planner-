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
    <title>My Assets · SmartWills</title>
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/topbar.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/myassets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <?php include '../../layouts/sidebar.php'; ?>
    <div class="main-content">
        <?php include '../../layouts/topbar.php'; ?>
        <div class="content">
            <div class="assets-wrapper">
                <!-- progress bar -->
                <div class="progress-steps">
                    <div class="step active">
                        <span class="circle">1</span>
                        <span class="label">My Assets</span>
                    </div>
                    <div class="step">
                        <span class="circle">2</span>
                        <span class="label">Estate Planning Checklist</span>
                    </div>
                    <div class="step">
                        <span class="circle">3</span>
                        <span class="label">Estate Fund Need Analysis</span>
                    </div>
                    <div class="step">
                        <span class="circle">4</span>
                        <span class="label">Funding Gap</span>
                    </div>
                    <div class="step">
                        <span class="circle">5</span>
                        <span class="label">Product Recommendations</span>
                    </div>
                    <div class="step">
                        <span class="circle">6</span>
                        <span class="label">Payment</span>
                    </div>
                </div>

                <div class="header">
                    <h1><i class="fas fa-address-card"></i> My Assets</h1>
                    <div class="client-info">
                        <span class="avatar">
                            <?php echo strtoupper(substr(trim($clientName), 0, 1)); ?>
                        </span>
                        <span class="client-name-text"><?php echo htmlspecialchars($clientName); ?></span>
                    </div>
                </div>

                <form method="POST" action="myassets.php?id=<?=$clientId?>">
                    <input type="hidden" name="client_id" value="<?=$clientId?>">

                    <!-- Family Information -->
                    <div class="accordion-section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <span class="title"><i class="fas fa-users"></i> Family Information</span>
                            <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-body">
                            <div class="frow">
                                <label>Spouse (with Will?)</label>
                                <div class="input-group">
                                    <label><input type="radio" name="spouse_will" value="yes"> Yes</label>
                                    <label><input type="radio" name="spouse_will" value="no" checked> No</label>
                                    <label><input type="radio" name="spouse_will" value="n_a"> N/A</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Children &lt; 21</label>
                                <input type="number" name="children_under_21" value="0" min="0" class="small">
                            </div>
                            <div class="frow">
                                <label>Children &gt; 21</label>
                                <input type="number" name="children_over_21" value="0" min="0" class="small">
                            </div>
                            <div class="frow">
                                <label>Grandparents alive?</label>
                                <div class="input-group">
                                    <label><input type="radio" name="grandparents" value="yes"> Yes</label>
                                    <label><input type="radio" name="grandparents" value="no" checked> No</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Parents alive?</label>
                                <div class="input-group">
                                    <label><input type="radio" name="parents" value="yes"> Yes</label>
                                    <label><input type="radio" name="parents" value="no" checked> No</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Brothers &amp; Sisters</label>
                                <input type="text" name="siblings" placeholder="e.g. 2 brothers, 1 sister" class="half">
                            </div>
                        </div>
                    </div>

                    <!-- Assets Information -->
                    <div class="accordion-section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <span class="title"><i class="fas fa-building"></i> Assets Information</span>
                            <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-body">
                            <div class="sub-section">
                                <div class="sub-label">Movable Assets:</div>
                                <div class="frow"><label>Bank / Savings</label><input type="text" name="bank_savings" placeholder="e.g. CIMB, Maybank"></div>
                                <div class="frow"><label>Unit Trust</label><input type="text" name="unit_trust" placeholder="e.g. Public Mutual"></div>
                                <div class="frow"><label>Share / Equity</label><input type="text" name="share_equity" placeholder="e.g. KLSE stocks"></div>
                                <div class="frow"><label>Investment</label><input type="text" name="investment" placeholder="e.g. Gold, bonds"></div>
                                <div class="frow"><label>Motor Vehicle</label><input type="text" name="motor_vehicle" placeholder="e.g. Toyota, BMW"></div>
                                <div class="frow"><label>Company / Business</label><input type="text" name="company_business" placeholder="e.g. Sdn Bhd"></div>
                            </div>
                            <div class="sub-section">
                                <div class="sub-label">Immovable Assets:</div>
                                <div class="frow"><label>HDB / Apartment</label><input type="text" name="hdb_apartment" placeholder="e.g. HDB block 123"></div>
                                <div class="frow"><label>Private Properties</label><input type="text" name="private_properties" placeholder="e.g. Landed house"></div>
                                <div class="frow"><label>Land</label><input type="text" name="land" placeholder="e.g. Agricultural land"></div>
                                <div class="frow"><label>Others</label><input type="text" name="assets_others" placeholder="Other assets"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Checklist -->
                    <div class="accordion-section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <span class="title"><i class="fas fa-list-check"></i> Checklist</span>
                            <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="accordion-body">
                            <div class="frow">
                                <label>Nationality</label>
                                <input type="text" name="nationality" placeholder="e.g. Malaysian" class="half">
                            </div>
                            <div class="frow">
                                <label>Cover assets in:</label>
                                <div class="input-group">
                                    <label><input type="checkbox" name="cover_assets[]" value="Malaysia"> Malaysia</label>
                                    <label><input type="checkbox" name="cover_assets[]" value="Singapore"> Singapore</label>
                                    <label><input type="checkbox" name="cover_assets[]" value="Brunei"> Brunei</label>
                                    <label><input type="checkbox" name="cover_assets[]" value="Others"> Others</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Understand English?</label>
                                <div class="input-group">
                                    <label><input type="radio" name="english" value="yes"> Yes</label>
                                    <label><input type="radio" name="english" value="no" checked> No</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Special Circumstances:</label>
                                <div class="input-group">
                                    <label><input type="checkbox" name="special[]" value="blind"> Blind</label>
                                    <label><input type="checkbox" name="special[]" value="illiterate"> Illiterate</label>
                                    <label><input type="checkbox" name="special[]" value="others"> Others</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Marital Status:</label>
                                <div class="input-group">
                                    <label><input type="radio" name="marital" value="single"> Single</label>
                                    <label><input type="radio" name="marital" value="married" checked> Married</label>
                                    <label><input type="radio" name="marital" value="divorced"> Divorced</label>
                                    <label><input type="radio" name="marital" value="widowed"> Widowed</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Debt or Loans?</label>
                                <div class="input-group">
                                    <label><input type="checkbox" name="debts[]" value="car"> Car Loan</label>
                                    <label><input type="checkbox" name="debts[]" value="home"> Home Loan</label>
                                    <label><input type="checkbox" name="debts[]" value="personal"> Personal Loan</label>
                                    <label><input type="checkbox" name="debts[]" value="others"> Others</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>In Progress of:</label>
                                <div class="input-group">
                                    <label><input type="checkbox" name="in_progress[]" value="pregnant"> Pregnant</label>
                                    <label><input type="checkbox" name="in_progress[]" value="new_marriage"> New Marriage</label>
                                    <label><input type="checkbox" name="in_progress[]" value="others"> Others</label>
                                </div>
                            </div>
                            <div class="frow">
                                <label>Health Issues?</label>
                                <div class="input-group">
                                    <label><input type="radio" name="health" value="yes"> Yes</label>
                                    <label><input type="radio" name="health" value="no" checked> No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="btn-row">
                        <a href="../clients.php" class="btn btn-back"><i class="fas fa-arrow-left"></i> Back to Clients</a>
                        <a href="epchecklist.php?id=<?=$clientId?>" class="btn btn-save"><i class="fas fa-arrow-right"></i> Go to EP Checklist</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Referencing external JavaScript (after separation) -->
<script src="../../assets/js/global.js"></script>
<script src="../../assets/js/myassets.js"></script>
</body>
</html>