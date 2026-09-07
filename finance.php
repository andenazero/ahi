<?php
session_start();
if (!isset($_SESSION['request_data']) || !isset($_SESSION['approval_data'])) {
    header("Location: purcashe.php");
    exit();
}

$data = $_SESSION['request_data'];
$approval = $_SESSION['approval_data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Department - Animal Health Institute</title>
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
                <h4 class="fw-bold text-success border-bottom pb-2">የፋይናንስ ክፍል ማስተላለፊያ ገጽ<br><small class="fs-6 text-muted">Finance Department Processing Page</small></h4>
            </div>

            <div class="alert alert-info">
                ይህ ጥያቄ በማጽደቁ ክፍል ተረጋግጦ ወደ ፋይናንስ ክፍል መጥቷል።
            </div>

            <!-- Requester & Approver Summary -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card bg-white p-3 border h-100">
                        <h6 class="fw-bold text-secondary mb-2">የጠያቂው መረጃ (Requester):</h6>
                        <p class="mb-1"><strong>ስም:</strong> <?php echo htmlspecialchars($data['requesterName']); ?></p>
                        <p class="mb-1"><strong>ፊርማ:</strong> <?php echo htmlspecialchars($data['requesterSig']); ?></p>
                        <p class="mb-0"><strong>ቀን:</strong> <?php echo htmlspecialchars($data['requestDate']); ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-white p-3 border h-100">
                        <h6 class="fw-bold text-success mb-2">ያጸደቀው አካል (Allowed/Approved By):</h6>
                        <p class="mb-1"><strong>ስም:</strong> <?php echo htmlspecialchars($approval['approverName']); ?></p>
                        <p class="mb-1"><strong>ፊርማ:</strong> <?php echo htmlspecialchars($approval['approverSig']); ?></p>
                        <p class="mb-0"><strong>ቀን:</strong> <?php echo htmlspecialchars($approval['approverDate']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-custom">
                    <thead class="table-light">
                        <tr>
                            <th>የዕቃው ዝርዝር<br><small>Description</small>[cite: 1]</th>
                            <th>መስፈሪያ<br><small>Unit</small>[cite: 1]</th>
                            <th>የተጠየቀ<br><small>Requested</small>[cite: 1]</th>
                            <th class="table-success">የተፈቀደ<br><small>Allowed</small>[cite: 1]</th>
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
                                echo "<td>" . htmlspecialchars($data['requestedQty'][$i]) . "</td>";
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
                <div class="text-end fw-bold fs-5 mt-2">
                    አጠቃላይ ድምር (Grand Total): <span class="text-primary"><?php echo number_format($grandTotal, 2); ?> Birr</span>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="allowed.php" class="btn btn-outline-secondary">← ወደ ማጽደቂያው ገጽ መመለስ</a>
                <div>
                    <button type="button" class="btn btn-outline-primary me-2" onclick="window.print()">አትም (Print)</button>
                    <a href="store.php" class="btn btn-success btn-lg">ዕቃውን ወደ መጋዘን አስገባ (Send to Store) →</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>