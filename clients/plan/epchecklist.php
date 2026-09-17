<?php
$activePage = 'clients';
$clientId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$clientName = 'Zhang Wei';
$pageTitle = 'Estate Planning Checklist - SmartWills';
$assetBase = '../../assets';
$pageStyles = ['epchecklist.css'];
$pageScripts = ['epchecklist.js'];

include '../../layouts/header.php';
?>
<div class="wrapper">
    <?php include '../../layouts/sidebar.php'; ?>

    <main class="main-content">
        <?php include '../../layouts/topbar.php'; ?>

        <div class="content">
            <section class="checklist-wrapper" aria-labelledby="checklist-title">
                <div class="progress-steps" aria-label="Estate planning progress">
                    <div class="step">
                        <span class="circle">1</span>
                        <span class="label">My Assets</span>
                    </div>
                    <div class="step active">
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

                <header class="checklist-header">
                    <h1 id="checklist-title">
                        <i class="fas fa-clipboard-list"></i>
                        Estate Planning Checklist
                    </h1>
                    <div class="client-info">
                        <span class="avatar"><?php echo strtoupper(substr(trim($clientName), 0, 1)); ?></span>
                        <span class="client-name-text"><?php echo htmlspecialchars($clientName); ?></span>
                    </div>
                </header>

                <form id="checklistForm" method="POST" action="reviewresources.php">
                    <input type="hidden" name="client_id" value="<?php echo $clientId; ?>">

                    <div class="question-group">
                        <div class="question-text">
                            <span class="qnum">1</span>
                            Have you created an estate plan to ensure your assets are distributed according to your wishes and benefit your loved ones?
                        </div>
                        <div class="options-group">
                            <label><input type="radio" name="q1" value="Yes"> Yes</label>
                            <label><input type="radio" name="q1" value="No"> No</label>
                        </div>
                    </div>

                    <div class="question-group">
                        <div class="question-text">
                            <span class="qnum">2</span>
                            Do you know that your assets might be frozen whether or not you have a Will?
                        </div>
                        <div class="options-group">
                            <label><input type="radio" name="q2" value="Yes, I am aware"> Yes, I am aware</label>
                            <label><input type="radio" name="q2" value="No, I am not aware"> No, I am not aware</label>
                        </div>
                    </div>

                    <div class="question-group">
                        <div class="question-text">
                            <span class="qnum">3</span>
                            Have you written a Will as part of your estate planning?
                        </div>
                        <div class="options-group">
                            <label><input type="radio" name="q3" value="Yes" class="q3-radio"> Yes</label>
                            <label><input type="radio" name="q3" value="No" class="q3-radio"> No</label>
                        </div>

                        <div id="q3_yes_sub" hidden>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">3.1</span>
                                    Whom have you appointed as the executor in your Will?
                                </div>
                                <div class="options-group">
                                    <label><input type="radio" name="q3_1_yes" value="Spouse"> Spouse</label>
                                    <label><input type="radio" name="q3_1_yes" value="Parents"> Parents</label>
                                    <label><input type="radio" name="q3_1_yes" value="Children"> Children</label>
                                    <label><input type="radio" name="q3_1_yes" value="Siblings"> Siblings</label>
                                    <label><input type="radio" name="q3_1_yes" value="Lawyer"> Lawyer</label>
                                    <label><input type="radio" name="q3_1_yes" value="Others"> Others</label>
                                </div>
                            </div>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">3.2</span>
                                    Does the executor you have chosen have the ability to fulfil the below responsibilities?
                                </div>
                                <div class="options-group">
                                    <label><input type="radio" name="q3_2_yes" value="Yes"> Yes</label>
                                    <label><input type="radio" name="q3_2_yes" value="No"> No</label>
                                </div>
                                <div class="executor-info">
                                    &bull; Obtain Documents: Secure an extract of the Will and the Death Certificate.<br>
                                    &bull; Submit Will and Information: Present the original Will along with a list of assets and liabilities.<br>
                                    &bull; Apply for Probate: File for a Grant of Probate.<br>
                                    &bull; Attend Court Hearing: Participate in the court hearing for the probate application.<br>
                                    &bull; Manage Estate: Once probate is granted, collect all assets to settle debts and liabilities.<br>
                                    &bull; Distribute Assets: Allocate the remaining assets according to the Will.
                                </div>
                            </div>
                        </div>

                        <div id="q3_no_sub" hidden>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">3.1</span>
                                    Are you aware that if you don't have a Will, all legal beneficiaries (such as parents, spouses, and children) must reach a consensus to appoint a single representative, known as an administrator, to execute your estate?
                                </div>
                                <div class="options-group">
                                    <label><input type="radio" name="q3_1_no" value="Yes, I am aware"> Yes, I am aware</label>
                                    <label><input type="radio" name="q3_1_no" value="No, I have no idea"> No, I have no idea</label>
                                </div>
                            </div>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">3.2</span>
                                    Do you have any worries about whether the administrator is capable of effectively managing your estate and making necessary arrangements before distributing assets to your beneficiaries?
                                </div>
                                <div class="options-group">
                                    <label><input type="radio" name="q3_2_no" value="Yes"> Yes</label>
                                    <label><input type="radio" name="q3_2_no" value="No"> No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="question-group">
                        <div class="question-text">
                            <span class="qnum">4</span>
                            Are you aware that your executor or administrator will need to settle all outstanding debts and taxes before they can distribute the estate to your beneficiaries?
                        </div>
                        <div class="options-group">
                            <label><input type="radio" name="q4" value="I am aware"> I am aware</label>
                            <label><input type="radio" name="q4" value="I am not aware"> I am not aware</label>
                        </div>
                    </div>

                    <div class="question-group">
                        <div class="question-text">
                            <span class="qnum">5</span>
                            Have you allocated sufficient funds in the estate to cover the administration fees and other related expenses for the executor/administrator?
                        </div>
                        <div class="options-group">
                            <label><input type="radio" name="q5_funds" value="Yes" class="q5-radio"> Yes</label>
                            <label><input type="radio" name="q5_funds" value="No" class="q5-radio"> No</label>
                        </div>
                        <div class="sub-question" id="q5_1_group" hidden>
                            <div class="question-text">
                                <span class="qnum">5.1</span>
                                <span id="q5_1_label">Could you please specify the amount of funds you have set aside to cover the administration fees and related expenses for the executor / administrator?</span>
                            </div>
                            <div class="text-input">
                                <input type="text" name="q5_1_amount" placeholder="e.g. $50,000">
                                <span class="hint">USD</span>
                            </div>
                        </div>
                    </div>

                    <div class="question-group">
                        <div class="question-text">
                            <span class="qnum">6</span>
                            Do you have minor children?
                        </div>
                        <div class="options-group">
                            <label><input type="radio" name="q6" value="Yes" class="q6-radio"> Yes</label>
                            <label><input type="radio" name="q6" value="No" class="q6-radio"> No</label>
                        </div>

                        <div id="q6_sub" hidden>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">6.1</span>
                                    Are you aware that you need to appoint a guardian to take care of your minor children?
                                </div>
                                <div class="options-group">
                                    <label><input type="radio" name="q6_1" value="Yes"> Yes</label>
                                    <label><input type="radio" name="q6_1" value="No"> No</label>
                                </div>
                            </div>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">6.2</span>
                                    Whom would you choose to appoint as a guardian to care for your minor children in the event of an unexpected circumstance?
                                </div>
                                <div class="options-group">
                                    <label><input type="radio" name="q6_2" value="Spouse"> Spouse</label>
                                    <label><input type="radio" name="q6_2" value="Parents"> Parents</label>
                                    <label><input type="radio" name="q6_2" value="Siblings"> Siblings</label>
                                    <label><input type="radio" name="q6_2" value="Others"> Others</label>
                                </div>
                            </div>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">6.3</span>
                                    Is your potential guardian financially prepared and capable of providing for your children's needs?
                                </div>
                                <div class="options-group">
                                    <label><input type="radio" name="q6_3" value="Yes"> Yes</label>
                                    <label><input type="radio" name="q6_3" value="No"> No</label>
                                </div>
                            </div>
                            <div class="sub-question">
                                <div class="question-text">
                                    <span class="qnum">6.4</span>
                                    How much will you allocate to ensure your guardian can adequately cover the basic needs of your minor children?
                                </div>
                                <div class="text-input">
                                    <input type="text" name="q6_4_amount" placeholder="e.g. $100,000">
                                    <span class="hint">USD</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="question-group">
                        <div class="question-text">
                            <span class="qnum">7</span>
                            Would you like to understand how much funding is necessary to protect a family and estate in the event of someone's passing?
                        </div>
                        <div class="options-group">
                            <label><input type="radio" name="q7" value="Yes"> Yes</label>
                            <label><input type="radio" name="q7" value="No"> No</label>
                        </div>
                    </div>

                    <div class="btn-row">
                        <button
                            type="button"
                            class="btn btn-back"
                            data-back-url="myassets.php?id=<?php echo $clientId; ?>"
                        >
                            <i class="fas fa-arrow-left"></i>
                            Back to My Assets
                        </button>
                        <button type="submit" class="btn btn-next">
                            <i class="fas fa-arrow-right"></i>
                            Go to Estate Fund Need Analysis
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </main>
</div>
<?php include '../../layouts/footer.php'; ?>

