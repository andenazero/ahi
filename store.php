<?php
session_start();
if (!isset($_SESSION['request_data']) || !isset($_SESSION['approval_data'])) {
    header("Location: purcashe.php");
    exit();
}

$data = $_SESSION['request_data'];
$approval = $_SESSION['approval_data'];
$storeStatus = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $storeKeeper = htmlspecialchars(trim($_POST['storeKeeper'] ?? ''));
    if (!empty($storeKeeper)) {
        // የመጋዘኑን መረጃ በ Session እንይዛለን
        $_SESSION['store_data'] = [
            'storeKeeper' => $storeKeeper,
            'storeSig' => htmlspecialchars(trim($_POST['storeSig'] ?? '')),
            'storeDate' => htmlspecialchars(trim($_POST['storeDate'] ?? ''))
        ];
        
        // ወደ መጋዘን አስተዳዳሪ ዳሽቦርድ እንመራዋለን
        header("Location: admin_store_dash.php");
        exit();
    } else {
        $storeStatus = "<div class='alert alert-danger mt-3'>እባክዎ መጋዘኑ የሚረከበውን ሰው ስም ያስገቡ።</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Receiving - Animal Health Institute</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-custom th, .table-custom td {
            vertical-align: middle;
            text-align: center;
            font-size: 0.85rem;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <!-- Header Section -->
            <div class="text-center mb-4">
                <h4 class="fw-bold text-dark mb-1">እንስሳት ጤና ኢንሰቲትዩት[cite: 1]</h4>
                <h5 class="text-secondary fw-bold mb-2">ANIMAL HEALTH INSTITUTE[cite: 1]</h5>
                <h4 class="fw-bold text-warning text-dark border-bottom pb-2">የመጋዘን (Store) ዕቃ መቀበያ ገጽ<br><small class="fs-6 text-muted">Store Material Receiving & Registration</small></h4>
            </div>

            <?php echo $storeStatus; ?>

            <div class="alert alert-warning">
                ግዥው ተፈጽሞ እና ፋይናንስ አልፎ የመጣው ዕቃ ወደ መጋዘን (Store) ገቢ የሚደረግበት ቅጽ።
            </div>

            <!-- Items Form to Store -->
            <form action="store.php" method="POST">
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-custom">
                        <thead class="table-light">
                            <tr>
                                <th>የዕቃው ዝርዝር<br><small>Description</small>[cite: 1]</th>
                                <th>መስፈሪያ<br><small>Unit</small>[cite: 1]</th>
                                <th class="table-success">የገባው ብዛት<br><small>Received Qty</small></th>
                                <th>የአንዱ ዋጋ<br><small>Unit Price</small>[cite: 1]</th>
                                <th>ጠቅላላ ዋጋ<br><small>Total Price</small>[cite: 1]</th>
                                <th>ምርመራ<br><small>Remarks</small>[cite: 1]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $descriptions = $data['description'] ?? [];
                            $allowedQtys = $approval['allowedQty'] ?? [];
                            $grandTotal = 0;

                            for ($i = 0; $i < count($descriptions); $i++) {
                                if (!empty($descriptions[$i])) {
                                    $qty = floatval($allowedQtys[$i] ?? 0);
                                    $price = floatval($data['unitPrice'][$i] ?? 0);
                                    $total = $qty * $price;
                                    $grandTotal += $total;

                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($data['description'][$i]) . "</td>";
                                    echo "<td>" . htmlspecialchars($data['unit'][$i]) . "</td>";
                                    echo "<td class='table-success fw-bold'>" . htmlspecialchars($qty) . "</td>";
                                    echo "<td>" . htmlspecialchars($data['unitPrice'][$i]) . "</td>";
                                    echo "<td>" . number_format($total, 2) . "</td>";
                                    echo "<td>" . htmlspecialchars($data['remarks'][$i]) . "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Store Receiver Sign-off -->
                <div class="row g-3 border-top pt-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="p-3 border bg-white rounded">
                            <h6 class="fw-bold text-muted mb-3">ዕቃውን የተረከበው መጋዘን ሰራተኛ (Store Keeper)</h6>
                            <div class="mb-2">
                                <label class="form-label small">ስም (Name)</label>
                                <input type="text" class="form-control form-control-sm" name="storeKeeper" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label small">ፊርማ (Signature)</label>
                                <input type="text" class="form-control form-control-sm" name="storeSig">
                            </div>
                            <div class="mb-0">
                                <label class="form-label small">ቀን (Date)</label>
                                <input type="date" class="form-control form-control-sm" name="storeDate">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="finance.php" class="btn btn-outline-secondary">← ወደ ፋይናንስ ገጽ መመለስ</a>
                    <button type="submit" class="btn btn-success btn-lg">ዕቃውን መጋዘን ውስጥ ገቢ አድርግ (Confirm & View Stock) →</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>