<?php
require_once('../../assets/fn/config.php');

$message = "";
$msg_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $userID         = mysqli_real_escape_string($link, $_POST['userID']);
    $fullName       = mysqli_real_escape_string($link, $_POST['fullName']);
    $userName       = mysqli_real_escape_string($link, $_POST['userName']);
    $email          = mysqli_real_escape_string($link, $_POST['email']);
    $password       = mysqli_real_escape_string($link, $_POST['password']);
    $contact        = mysqli_real_escape_string($link, $_POST['contact']);
    $registeredDate = mysqli_real_escape_string($link, $_POST['registeredDate']);
    $endDate        = mysqli_real_escape_string($link, $_POST['endDate']);
    $status         = mysqli_real_escape_string($link, $_POST['status']);

    // Check if userName or email already exists
    $check_user = mysqli_query($link, "SELECT id FROM profile WHERE userName = '$userName' OR email = '$email'");
    if (mysqli_num_rows($check_user) > 0) {
        $message = "Username or Email already exists!";
        $msg_type = "danger";
    } else {
        // Insert into profile table
        $sql = "INSERT INTO profile (userID, fullName, userName, email, password, contact, registeredDate, endDate, status) 
                VALUES ('$userID', '$fullName', '$userName', '$email', '$password', '$contact', '$registeredDate', '$endDate', '$status')";

        if (mysqli_query($link, $sql)) {
            $message = "User registered successfully!";
            $msg_type = "success";
        } else {
            $message = "Error: " . mysqli_error($link);
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
    <title>AHI - Register User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="font-weight-bold m-0"><i class="fas fa-user-plus mr-2"></i>AHI User Registration</h4>
                </div>
                <div class="card-body p-4">

                    <?php if (!empty($message)): ?>
                        <div class="alert alert-<?php echo $msg_type; ?> alert-dismissible fade show" role="alert">
                            <?php echo $message; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="register.php">
                        <div class="form-row">
                            <!-- User ID -->
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">User ID</label>
                                <input type="text" name="userID" class="form-control" placeholder="e.g. USR-001" required>
                            </div>
                            <!-- Full Name -->
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Full Name</label>
                                <input type="text" name="fullName" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Username -->
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Username</label>
                                <input type="text" name="userName" class="form-control" placeholder="Username" required>
                            </div>
                            <!-- Email -->
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Password -->
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <!-- Contact -->
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Contact / Phone</label>
                                <input type="text" name="contact" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Registered Date -->
                            <div class="form-group col-md-4">
                                <label class="font-weight-bold">Registered Date</label>
                                <input type="date" name="registeredDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <!-- End Date -->
                            <div class="form-group col-md-4">
                                <label class="font-weight-bold">End Date</label>
                                <input type="date" name="endDate" class="form-control">
                            </div>
                            <!-- Status -->
                            <div class="form-group col-md-4">
                                <label class="font-weight-bold">Status / Role</label>
                                <select name="status" class="form-control" required>
                                    <option value="ict">ICT Staff</option>
                                    <option value="user" selected>Standard User</option>
                                    <option value="admin">Administrator</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between">
                            <a href="ict.php" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i> Back to Dashboard</a>
                            <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-1"></i> Register User</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>