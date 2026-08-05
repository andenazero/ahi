<?php
require_once('../../assets/fn/config.php');

$message = "";
$msg_type = "";
$token = $_GET['token'] ?? $_POST['token'] ?? '';
$valid_token = false;

// Check if token exists and is not expired
if (!empty($token)) {
    $token_escaped = mysqli_real_escape_string($link, $token);
    $check_query = "SELECT id FROM profile WHERE reset_token = '$token_escaped' AND token_expiry > NOW()";
    $check_result = mysqli_query($link, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $valid_token = true;
    } else {
        $message = "Invalid or expired password reset token.";
        $msg_type = "danger";
    }
}

// Handle new password submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && $valid_token) {
    $new_password     = mysqli_real_escape_string($link, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($link, $_POST['confirm_password']);

    if ($new_password !== $confirm_password) {
        $message = "Passwords do not match!";
        $msg_type = "danger";
    } else {
      // Update password and clear reset token
$update_sql = "UPDATE profile SET password = '$new_password', reset_token = NULL, token_expiry = NULL WHERE reset_token = '$token_escaped'";

if (mysqli_query($link, $update_sql)) {
    // REDIRECT DIRECTLY TO CONTROL.PHP
    header("Location: control.php");
    exit();
} else {
    $message = "Error resetting password: " . mysqli_error($link);
    $msg_type = "danger";
}
        
        if (mysqli_query($link, $update_sql)) {
            $message = "Password updated successfully! <a href='login.php' class='alert-link'>Click here to login</a>";
            $msg_type = "success";
            $valid_token = false;
        } else {
            $message = "Error resetting password: " . mysqli_error($link);
            $msg_type = "danger";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHI - Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="font-weight-bold m-0"><i class="fas fa-lock mr-2"></i>Reset Password</h5>
                </div>
                <div class="card-body p-4">

                    <?php if (!empty($message)): ?>
                        <div class="alert alert-<?php echo $msg_type; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($valid_token): ?>
                        <form method="POST" action="reset_password.php">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">New Password</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" required>
                            </div>

                            <button type="submit" class="btn btn-success btn-block font-weight-bold">Update Password</button>
                        </form>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>