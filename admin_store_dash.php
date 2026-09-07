<?php
session_start();
if (!isset($_SESSION['request_data']) || !isset($_SESSION['approval_data']) || !isset($_SESSION['store_data'])) {
    header("Location: purcashe.php");
    exit();
}

$data = $_SESSION['request_data'];
$approval = $_SESSION['approval_data'];
$store = $_SESSION['store_data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Admin Dashboard - Animal Health Institute</title>
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
                <h4 class="fw-bold text-danger border-bottom pb-2">የመጋዘን አስተዳዳሪ ዳሽቦርድ (Store Admin Stock Ledger)<br><small class="fs-6 text-muted">Inflow & Outflow Tracking System</small></h4>
            </div>

            <div class="alert alert-success">
                ዕቃዎቹ በመጋዘን ተመዝግበዋል! አሁን የገባውን ዕቃ (Inflow) እና የተጠየቀውን/የወጣውን (Outflow) ማየት ይቻላል።
            </div>

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="p-3 border bg-white rounded">
                        <small class="text-muted">መጋዘኑን የረከበው (Store Keeper):</small>
                        <h6 class="fw-bold mb-0 text-primary"><?php echo htmlspecialchars($store['storeKeeper']); ?></h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border bg-white rounded">
                        <small class="text-muted">የተረከበበት ቀን (Date):</small>
                        <h6 class="fw-bold mb-0"><?php echo htmlspecialchars($store['storeDate']); ?></h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border bg-white rounded">
                        <small class="text-muted">የመጋዘን ሁኔታ (Status):</small>
                        <h6 class="fw-bold mb-0 text-success">ገቢ ሆኗል (Active in Stock)</h6>
                    </div>
                </div>
            </div>

            <!-- Stock Inflow / Outflow Table -->
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-custom">
                    <thead class="table-dark">
                        <tr>
                            <th>የዕቃው ዝርዝር<br><small>Description</small>[cite: 1]</th>
                            <th>መስፈሪያ<br><small>Unit</small>[cite: 1]</th>
                            <th>የተጠየቀ ብዛት<br><small>Requested</small>[cite: 1]</th>
                            <th>የተፈቀደ/የገባ (Inflow)<br><small>Received Qty</small></th>
                            <th>የወጣው (Outflow)<br><small>Issued Qty</small></th>
                            <th class="table-warning text-dark">ቀሪ እቃ (Balance)<br><small>Stock Balance</small></th>
                            <th>የአንዱ ዋጋ<br><small>Unit Price</small>[cite: 1]</th>
                            <th>ጠቅላላ ዋጋ<br><small>Total Price</small>[cite: 1]</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $descriptions = $data['description'] ?? [];
                        $allowedQtys = $approval['allowedQty'] ?? [];

                        for ($i = 0; $i < count($descriptions); $i++) {
                            if (!empty($descriptions[$i])) {
                                $receivedQty = floatval($allowedQtys[$i] ?? 0);
                                // ለጊዜው የወጣው ብዛት (Outflow) እንደተጠየቀው ወይም እንደተፈቀደው ሊሆን ስለሚችል እዚህ እናስተካክለዋለን
                                $issuedQty = $receivedQty; // ለምሳሌ ያህል ሙሉውን የወሰደ ከሆነ
                                $balance = $receivedQty - $issuedQty; // ቀሪ
                                $price = floatval($data['unitPrice'][$i] ?? 0);
                                $total = $receivedQty * $price;

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($data['description'][$i]) . "</td>";
                                echo "<td>" . htmlspecialchars($data['unit'][$i]) . "</td>";
                                echo "<td>" . htmlspecialchars($data['requestedQty'][$i] ?? 0) . "</td>";
                                echo "<td class='fw-bold text-success'>+" . htmlspecialchars($receivedQty) . "</td>";
                                echo "<td class='fw-bold text-danger'>-" . htmlspecialchars($issuedQty) . "</td>";
                                echo "<td class='table-warning fw-bold'>" . htmlspecialchars($balance) . "</td>";
                                echo "<td>" . htmlspecialchars($data['unitPrice'][$i]) . "</td>";
                                echo "<td>" . number_format($total, 2) . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="store.php" class="btn btn-outline-secondary">← ወደ መጋዘን መቀበያ መመለስ</a>
                <div>
                    <button type="button" class="btn btn-outline-primary me-2" onclick="window.print()">የስቶክ ሪፖርት አትም (Print Report)</button>
                    <a href="purcashe.php" class="btn btn-dark">አዲስ ግዥ ጀምር (Start New Request)</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>