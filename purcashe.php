<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['request_data'] = [
        'requesterName' => htmlspecialchars(trim($_POST['requesterName'] ?? '')),
        'requesterSig' => htmlspecialchars(trim($_POST['requesterSig'] ?? '')),
        'requestDate' => htmlspecialchars(trim($_POST['requestDate'] ?? '')),
        'description' => $_POST['description'] ?? [],
        'unit' => $_POST['unit'] ?? [],
        'requestedQty' => $_POST['requestedQty'] ?? [],
        'allowedQty' => $_POST['allowedQty'] ?? [],
        'cancelledQty' => $_POST['cancelledQty'] ?? [],
        'heldQty' => $_POST['heldQty'] ?? [],
        'unitPrice' => $_POST['unitPrice'] ?? [],
        'totalPrice' => $_POST['totalPrice'] ?? [],
        'remarks' => $_POST['remarks'] ?? []
    ];
    header("Location: allowed.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for Issue of Materials - Animal Health Institute</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-custom th, .table-custom td {
            vertical-align: middle;
            text-align: center;
            font-size: 0.85rem;
        }
        .table-custom input {
            font-size: 0.85rem;
            padding: 0.25rem 0.5rem;
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
                <h4 class="fw-bold text-primary border-bottom pb-2">የዕቃ ወጪ መጠየቂያ<br><small class="fs-6 text-muted">REQUEST FOR ISSUE OF MATERIALS[cite: 1]</small></h4>
            </div>

            <form action="purcashe.php" method="POST" novalidate>
                <!-- Materials Table -->
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-custom">
                        <thead class="table-light">
                            <tr>
                                <th>የዕቃው ዝርዝር<br><small>Description of material issue</small>[cite: 1]</th>
                                <th style="width: 100px;">መስፈሪያ<br><small>Unit of issue</small>[cite: 1]</th>
                                <th style="width: 90px;">የተጠየቀ<br><small>Request</small>[cite: 1]</th>
                                <th style="width: 90px;">የተፈቀደ<br><small>Allowed</small>[cite: 1]</th>
                                <th style="width: 90px;">የተሰረዘ<br><small>Cancelled</small>[cite: 1]</th>
                                <th style="width: 100px;">በቆይታ የተያዘ<br><small>Held in stay</small>[cite: 1]</th>
                                <th style="width: 100px;">የአንዱ ዋጋ<br><small>Unit Price</small>[cite: 1]</th>
                                <th style="width: 100px;">ጠቅላላ ዋጋ<br><small>Total Price</small>[cite: 1]</th>
                                <th>ምርመራ<br><small>Remarks</small>[cite: 1]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i = 0; $i < 3; $i++): ?>
                            <tr>
                                <td><input type="text" class="form-control" name="description[]"></td>
                                <td><input type="text" class="form-control" name="unit[]"></td>
                                <td><input type="number" class="form-control" name="requestedQty[]" step="any"></td>
                                <td><input type="number" class="form-control" name="allowedQty[]" step="any"></td>
                                <td><input type="number" class="form-control" name="cancelledQty[]" step="any"></td>
                                <td><input type="number" class="form-control" name="heldQty[]" step="any"></td>
                                <td><input type="number" class="form-control" name="unitPrice[]" step="any"></td>
                                <td><input type="text" class="form-control bg-white" name="totalPrice[]"></td>
                                <td><input type="text" class="form-control" name="remarks[]"></td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Requester Section -->
                <div class="row g-3 border-top pt-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="p-3 border bg-white rounded">
                            <h6 class="fw-bold text-muted mb-3">የጠያቂው[cite: 1] (Requester)</h6>
                            <div class="mb-2">
                                <label class="form-label small">ስም[cite: 1] (Name)</label>
                                <input type="text" class="form-control form-control-sm" name="requesterName" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label small">ፊርማ[cite: 1] (Signature)</label>
                                <input type="text" class="form-control form-control-sm" name="requesterSig">
                            </div>
                            <div class="mb-0">
                                <label class="form-label small">ቀን[cite: 1] (Date)</label>
                                <input type="date" class="form-control form-control-sm" name="requestDate">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Proceed to Approval Page</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>