
<?php
session_start();
require './assets/fn/config.php';

// 1. Security Check: Only logged-in users
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

// 2. Fetch Summary Data
// Get total pending requests
// $pending_count = $pdo->query("SELECT COUNT(*) FROM db_ahi WHERE rdate != ''")->fetchColumn();

// Get count of items below threshold (using our View)
// $low_stock_count = $pdo->query("SELECT COUNT(*) FROM vw_low_stock_alerts")->fetchColumn();

// Get total items issued today
// $today_issued = $pdo->query("SELECT SUM(quantity_requested) FROM requests 
                            //  WHERE status = 'Issued' 
                            //  AND DATE(request_date) = CURDATE()")->fetchColumn() ?: 0;

// 3. Fetch detailed low-stock items for the table
// $low_stock_items = $pdo->query("SELECT * FROM vw_low_stock_alerts LIMIT 5")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Store Dashboard</title>
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Store Management System</a>
        <div class="text-white">
            Welcome, <?= htmlspecialchars($_SESSION['name']) ?> | 
            <a href="logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">Pending Requests</h5>
                    <h2 class="display-4"><?= $pending_count ?></h2>
                    <a href="admin.php" class="btn btn-primary btn-sm">Review All</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-success">Issued Today</h5>
                    <h2 class="display-4"><?= $today_issued ?></h2>
                    <p class="text-muted small">Units dispensed</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-danger shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">Stock Alerts</h5>
                    <h2 class="display-4"><?= $low_stock_count ?></h2>
                    <p class="text-muted small">Items needing refill</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white"><strong>Critical Stock List</strong></div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Item Name</th>
                                <th>Current Stock</th>
                                <th>Urgency</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($low_stock_items as $item): ?>
                            <tr>
                                <td><?= $item['item_name'] ?></td>
                                <td><?= $item['stock_quantity'] ?> <?= $item['unit_measure'] ?></td>
                                <td>
                                    <span class="badge <?= $item['urgency_level'] == 'CRITICAL' ? 'bg-danger' : 'bg-warning' ?>">
                                        <?= $item['urgency_level'] ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
