<?php
session_start();
include("../../assets/fn/config.php");

$message = '';
$message_type = '';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Registration
    if (isset($_POST['register'])) {
        $userID = trim($_POST['userID']);
        $fullName = trim($_POST['fullName']);
        $userName = trim($_POST['userName']);
        $email = trim($_POST['email']);
        $hashed = $_POST['password'];
        $confirm = $_POST['confirm_password'];
        $contact = trim($_POST['contact']);
        $rdate = $date = date('Y/m/d H:i:s');
        $status = trim($_POST['status']);

        // Validate input 
        if (empty($userName) || empty($email) || empty($userName) || empty($status)) {
            $message = "All fields are required.";
            $message_type = "danger";
        } 
        elseif ($hashed !== $confirm) {
            $message = "Passwords do not match.";
            $message_type = "danger";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email format.";
            $message_type = "danger";
        } else {
            // Check if username or email exists
            $stmt = $link->prepare("SELECT userID FROM profile WHERE userName = ? OR email = ?");
            $stmt->bind_param("ss", $userName, $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $message = "Username or email already taken.";
                $message_type = "danger";
            } else {
                // $hashed = password_hash($hashed, PASSWORD_DEFAULT);
                $stmt = $link->prepare("INSERT INTO profile (userID, fullName, userName, email, password, contact, registeredDate, status) VALUES (?, ?, ?, ?,?,?,?,?)");
                $stmt->bind_param("ssssssss", $userID, $fullName, $userName, $email, $hashed, $contact, $rdate, $status);
                if ($stmt->execute()) {
                    $message = "Registration successful! Please login.";
                    $message_type = "success";
                    header("location: ./control.php");
                } else {
                    $message = "Registration failed: " . $link->error;
                    $message_type = "danger";
                }
            }
        }
    }
}

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIC </title>
    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    body {
        background: #f0f4f8;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .card {
        border-radius: 1rem;
        border: none;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    }

    .card-header {
        background: white;
        border-bottom: 1px solid #eef2f6;
    }

    .nav-tabs .nav-link {
        color: #0a3d5e;
        font-weight: 500;
    }

    .nav-tabs .nav-link.active {
        background: #0a3d5e;
        color: white;
        border-color: #0a3d5e;
    }

    .btn-primary {
        background: #0a3d5e;
        border-color: #0a3d5e;
    }

    .btn-outline-primary {
        color: #0a3d5e;
        border-color: #0a3d5e;
    }

    .btn-outline-primary:hover {
        background: #0a3d5e;
        color: white;
    }

    footer {
        margin-top: auto;
        background: white;
        border-top: 1px solid #eef2f6;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="../../index.php">
                <i class="bi bi-person-circle me-2" style="color: #0a3d5e;"></i>
                Home
            </a>

        </div>
    </nav>

    <div class="container py-5 px-5">


        <!-- REGISTER TABS -->
         
        <form method="POST" id="registerForm">
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Full Name"
                        required>
                </div>
                <div class="col-sm-4">
                    <input name="userName" type="text" class="form-control" id="userName" placeholder="User Name"
                        required>
                </div>
                <div class="col-sm-3">
                    <input name="userID" type="text" class="form-control" id="userID" placeholder="Employee ID"
                        required>
                </div>
            </div><br>
            <div class="form-group row">
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Organization email"
                        required>
                </div>
                <div class="col-sm-4">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password"
                        required>
                </div>
                <div class="col-sm-4">
                    <input name="confirm_password" type="password" class="form-control" id="confirm_password"
                        placeholder="Confirm password" required>
                </div>
            </div><br>
            <div class="form-group row">
                <div class="col-sm-4">
                    <input type="text" name="contact" class="form-control" id="contact" placeholder="Phone No."
                        required>
                </div>
                <div class="col-sm-4">
                    <input name="status" type="text" class="form-control" id="status" placeholder="Your department"
                        required>
                </div>
                <div class="col-sm-4">
                    <input name="endDate" type="date" class="form-control" id="endDate" placeholder="Profile End Date"
                        required>
                </div>
            </div><br>



            <button type="submit" name="register" class="btn btn-success w-30"><i
                    class="bi bi-person-plus me-1"></i>Register</button>
            <button type="reset" name="cancil" class="btn btn-warning w-30"><i
                    class="bi bi-person-plus me-1"></i>Cancil</button>
        </form>
    </div>

    </div>

    <footer class="py-3 text-center text-muted">
        <small>&copy; 2026 Animal Health Institute</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>