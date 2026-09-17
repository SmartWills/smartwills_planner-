<?php 
$activePage = 'clients'; 

// Simulate customer data (keeping it in sync with clients.js)
$clients = [
    ['id' => 1, 'name' => 'Zhang Wei', 'phone' => '13812345678', 'status' => 'active', 'riskScore' => 8, 'updated' => '2026-06-15'],
    ['id' => 2, 'name' => 'Li Fang', 'phone' => '13987654321', 'status' => 'done', 'riskScore' => 3, 'updated' => '2026-06-10'],
    ['id' => 3, 'name' => 'Wang Qiang', 'phone' => '13755556666', 'status' => 'pending', 'riskScore' => 17, 'updated' => '2026-06-12']
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$client = null;
foreach ($clients as $c) {
    if ($c['id'] === $id) {
        $client = $c;
        break;
    }
}
// If not found, return to the list page
if (!$client) {
    header('Location: clients.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Edit Client · SmartWills</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/topbar.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../assets/css/clients.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="wrapper">
    <?php include '../layouts/sidebar.php'; ?>
    <div class="main-content">
        <?php include '../layouts/topbar.php'; ?>
        <div class="content">
            <!-- Page Title -->
            <div class="page-header">
                <h1><i class="fas fa-user-edit"></i> Edit Client</h1>
                <a href="clients.php" class="btn-primary" style="margin-left:auto; background:#6c757d;">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>

            <!-- Edit Form -->
            <div style="background: white; border-radius: 20px; border: 1px solid #eef2f8; padding: 24px 30px;">
                <form id="editForm" action="#" method="POST">
                    <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
                    
                    <div class="fsection">
                        <h3><i class="fas fa-info-circle"></i> General Information</h3>
                        <div class="frow">
                            <label>Full Name</label>
                            <input type="text" name="name" value="<?php echo htmlspecialchars($client['name']); ?>" required>
                        </div>
                        <div class="frow">
                            <label>IC / Passport</label>
                            <input type="text" name="ic" placeholder="Enter IC or passport number" value="SAMPLE-1234">
                        </div>
                        <div class="frow">
                            <label>Mobile Number</label>
                            <input type="text" name="phone" value="<?php echo htmlspecialchars($client['phone']); ?>" required>
                        </div>
                        <div class="frow">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="example@email.com" value="client@example.com">
                        </div>
                        <div class="frow">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Enter full address" value="123 Main St">
                        </div>
                        <div class="frow">
                            <label>Status</label>
                            <select name="status">
                                <option value="active" <?php echo $client['status'] === 'active' ? 'selected' : ''; ?>>Active</option>
                                <option value="done" <?php echo $client['status'] === 'done' ? 'selected' : ''; ?>>Completed</option>
                                <option value="pending" <?php echo $client['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                            </select>
                        </div>
                        <div class="frow">
                            <label>Risk Score</label>
                            <input type="number" name="riskScore" value="<?php echo $client['riskScore']; ?>" min="0" max="30">
                        </div>
                    </div>

                    <div class="modal-btns" style="justify-content: flex-start; margin-top: 20px;">
                        <button type="submit" class="btn btn-save"><i class="fas fa-save"></i> Save Changes</button>
                        <a href="clients.php" class="btn btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>

            <footer style="margin-top:30px;">© 2026 smartwillsplanner.com</footer>
        </div>
    </div>
</div>

<script src="../assets/js/global.js"></script>
<script src="../assets/js/clients.js"></script> <!-- Reusable, but not required on this page. -->
</body>
</html>