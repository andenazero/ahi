<?php
session_start();
if (!isset($_SESSION['request_data'])) {
    header("Location: purcashe.php");
    exit();
}

$data = $_SESSION['request_data'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $approverName = htmlspecialchars(trim($_POST['approverName'] ?? ''));
    
    if (!empty($approverName)) {
        // የፈቀደውን (Approver) መረጃ እና የተፈቀዱትን ብዛቶች በሴክሽን እንይዛለን
        $_SESSION['approval_data'] = [
            'approverName' => $approverName,
            'approverSig' => htmlspecialchars(trim($_POST['approverSig'] ?? '')),
            'approverDate' => htmlspecialchars(trim($_POST['approverDate'] ?? '')),
            'allowedQty' => $_POST['allowedQty'] ?? []
        ];
        
        // ወደ ፋይናንስ ክፍል ገጽ እንመራዋለን
        header("Location: finance.php");
        exit();
    } else {
        $error = "<div class='alert alert-danger mt-3'>እባክዎ የፈቀደውን ሰው ስም ያስገቡ።</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allowed / Review Form - Animal Health Institute</title>
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
                <h4 class="fw-bold text-primary border-bottom pb-2">የዕቃ ወጪ ማጽደቂያ / የፈቀደው ገጽ<br><small class="fs-6 text-muted">Review & Approve User Request</small></h4>
            </div>

            <?php if(isset($error)) echo $error; ?>

            <!-- Requester Information Summary -->
            <div class="card bg-light border-0 mb-4 p-3">
                <h6 class="fw-bold text-secondary mb-2">የጠያቂው መረጃ (Requester Details):</h6>
                <div class="row">
                    <div class="col-md-4"><strong>ስም (Name):</strong> <?php echo htmlspecialchars($data['requesterName'] ?? ''); ?></div>
                    <div class="col-md-4"><strong>ፊርማ (Signature):</strong> <?php echo htmlspecialchars($data['requesterSig'] ?? ''); ?></div>
                    <div class="col-md-4"><strong>ቀን (Date):</strong> <?php echo htmlspecialchars($data['requestDate'] ?? ''); ?></div>
                </div>
            </div>

            <!-- Review Form containing user's submitted list -->
            <form action="allowed.php" method="POST" novalidate>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-custom">
                        <thead class="table-light">
                            <tr>
                                <th>የዕቃው ዝርዝር<br><small>Description</small>[cite: 1]</th>
                                <th style="width: 90px;">መስፈሪያ<br><small>Unit</small>[cite: 1]</th>
                                <th style="width: 80px;">የተጠየቀ<br><small>Requested</small>[cite: 1]</th>
                                <th style="width: 90px;" class="table-warning">የተፈቀደ<br><small>Allowed</small>[cite: 1]</th>
                                <th style="width: 80px;">የተሰረዘ<br><small>Cancelled</small>[cite: 1]</th>
                                <th style="width: 90px;">በቆይታ የተያዘ<br><small>Held</small>[cite: 1]</th>
                                <th style="width: 90px;">የአንዱ ዋጋ<br><small>Unit Price</small>[cite: 1]</th>
                                <th style="width: 90px;">ጠቅላላ ዋጋ<br><small>Total Price</small>[cite: 1]</th>
                                <th>ምርመራ<br><small>Remarks</small>[cite: 1]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $descriptions = $data['description'] ?? [];
                            for ($i = 0; $i < count($descriptions); $i++) {
                                if (!empty($descriptions[$i])) {
                                    echo "<tr>";
                                    echo "<td><input type='text' class='form-control' value='" . htmlspecialchars($data['description'][$i] ?? '') . "' readonly></td>";
                                    echo "<td><input type='text' class='form-control' value='" . htmlspecialchars($data['unit'][$i] ?? '') . "' readonly></td>";
                                    echo "<td><input type='number' class='form-control' value='" . htmlspecialchars($data['requestedQty'][$i] ?? '') . "' readonly></td>";
                                    echo "<td class='table-warning'><input type='number' class='form-control' name='allowedQty[]' value='" . htmlspecialchars($data['allowedQty'][$i] ?? '') . "' step='any'></td>";
                                    echo "<td><input type='number' class='form-control' value='" . htmlspecialchars($data['cancelledQty'][$i] ?? '') . "' readonly></td>";
                                    echo "<td><input type='number' class='form-control' value='" . htmlspecialchars($data['heldQty'][$i] ?? '') . "' readonly></td>";
                                    echo "<td><input type='number' class='form-control' value='" . htmlspecialchars($data['unitPrice'][$i] ?? '') . "' readonly></td>";
                                    echo "<td><input type='text' class='form-control bg-white' value='" . htmlspecialchars($data['totalPrice'][$i] ?? '') . "' readonly></td>";
                                    echo "<td><input type='text' class='form-control' value='" . htmlspecialchars($data['remarks'][$i] ?? '') . "' readonly></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Approver Sign-off Section -->
                <div class="row g-3 border-top pt-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="p-3 border bg-white rounded">
                            <h6 class="fw-bold text-muted mb-3">የፈቀደው (Allowed By)</h6>
                            <div class="mb-2">
                                <label class="form-label small">ስም (Name)</label>
                                <input type="text" class="form-control form-control-sm" name="approverName" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label small">ፊርማ (Signature)</label>
                                <input type="text" class="form-control form-control-sm" name="approverSig">
                            </div>
                            <div class="mb-0">
                                <label class="form-label small">ቀን (Date)</label>
                                <input type="date" class="form-control form-control-sm" name="approverDate">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="purcashe.php" class="btn btn-outline-secondary">← ወደ ጠያቂው ገጽ መመለስ</a>
                    <button type="submit" class="btn btn-success btn-lg">አጽድቆ ወደ ፋይናንስ መላክ →</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>