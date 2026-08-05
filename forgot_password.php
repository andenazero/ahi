<?php
require_once('../../assets/fn/config.php');

$message = "";
$msg_type = "";

// Set local timezone so token expiry matches local system time
date_default_timezone_set('Africa/Addis_Ababa');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim(mysqli_real_escape_string($link, $_POST['email']));

    // Check if the email exists in the profile table
    $query = "SELECT id, userName FROM profile WHERE email = '$email'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Generate a secure token and set expiry to 1 hour from now
        $token = bin2hex(random_bytes(16)); // 32 characters long
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Save token and expiry into database
        $update_query = "UPDATE profile SET reset_token = '$token', token_expiry = '$expiry' WHERE email = '$email'";
        
        if (mysqli_query($link, $update_query)) {
            // Build direct link to reset_password.php
            $reset_link = "reset_password.php?token=" . $token;

            $message = "<strong>Reset token generated!</strong><br><br>
                        Click here to reset your password:<br>
                        <a href='$reset_link' class='btn btn-success btn-sm mt-2'>Reset Password Now</a>";
            $msg_type = "success";
        } else {
            $message = "Database Update Error: " . mysqli_error($link);
            $msg_type = "danger";
        }
    } else {
        $message = "No account found with email: <strong>" . htmlspecialchars($email) . "</strong>. Please check the spelling.";
        $msg_type = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHI - Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-warning text-dark text-center">
                    <h5 class="font-weight-bold m-0"><i class="fas fa-key mr-2"></i>Forgot Password</h5>
                </div>
                <div class="card-body p-4">

                    <?php if (!empty($message)): ?>
                        <div class="alert alert-<?php echo $msg_type; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="forgot_password.php">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Enter your registered Email</label>
                            <input type="email" name="email" class="form-control" placeholder="e.g. user@gmail.com" required>
                        </div>

                        <button type="submit" class="btn btn-warning btn-block font-weight-bold">Request Reset Link</button>
                    </form>

                    <hr class="my-3">
                    <div class="text-center">
                        <a href="login.php" class="text-secondary small"><i class="fas fa-arrow-left mr-1"></i>Back to Login</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>