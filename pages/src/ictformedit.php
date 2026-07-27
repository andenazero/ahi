<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../assets/fn/session.php');
require_once('../../assets/fn/config.php');

$id = $_GET['id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $req_id = mysqli_real_escape_string($link, $_POST['req_id']);
    $problem = mysqli_real_escape_string($link, $_POST['problem']);

    // Updated column name: 'problem'
    $update_query = "UPDATE ictform SET problem = '$problem' WHERE id = '$req_id'";
    if (mysqli_query($link, $update_query)) {
        header("Location: ict.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}

// Fetch current request details
$query = "SELECT * FROM ictform WHERE id = '$id'";
$result = mysqli_query($link, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Request</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    <div class="card mx-auto shadow-sm" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Edit Request #<?php echo htmlspecialchars($id); ?></h5>
        </div>
        <div class="card-body">
            <form method="POST" action="edit_request.php">
                <input type="hidden" name="req_id" value="<?php echo htmlspecialchars($id); ?>">
                
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Requested By</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['requestedby'] ?? ''); ?>" readonly>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Problem Specification</label>
                    <textarea name="problem" class="form-control" rows="3" required><?php echo htmlspecialchars($data['problem'] ?? ''); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Changes</button>
                <a href="ict.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>