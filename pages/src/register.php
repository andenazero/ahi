<?php
session_start();
include("../../assets/fn/config.php");
 
// Database configuration
/*$host = 'localhost';
$dbname = 'user_profile_db';
$username = 'root';
$password = '';

// Create connection and database if needed
$conn = new mysqli($host, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
// $conn->select_db($dbname);

// Create users table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");*/

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
                $hashed = password_hash($hashed, PASSWORD_DEFAULT);
                $stmt = $link->prepare("INSERT INTO profile (userID, fullName, userName, email, password, contact, registeredDate, status) VALUES (?, ?, ?, ?,?,?,?,?)");
                $stmt->bind_param("ssssssss", $userID, $fullName, $userName, $email, $hashed, $contact, $rdate, $status);
                if ($stmt->execute()) {
                    $message = "Registration successful! Please login.";
                    $message_type = "success";
                } else {
                    $message = "Registration failed: " . $link->error;
                    $message_type = "danger";
                }
            }
        }
    }

    // Login
    // if (isset($_POST['login'])) {
        // $username = trim($_POST['login_username']);
        // $password = $_POST['login_password'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // email and password sent from form 
    $userName = mysqli_real_escape_string($link, $_POST['login_username']);
    $password = mysqli_real_escape_string($link, $_POST['login_password']);
    // $mystatus = mysqli_real_escape_string($link, $_POST['status']);

    // $sql = "SELECT * FROM profile WHERE userName = '$myusername' AND password ='$mypassword' AND status='$mystatus'";

    $sql = "SELECT * FROM profile WHERE userName = '$userName' AND password ='$password'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        if ($row["status"] == "admin") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ../src/admin.php");
        } else if ($row["status"] == "executive") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ../src/executive.php");
        } else if ($row["status"] == "user") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ../src/user.php");
        } else if ($row["status"] == "ict") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ../src/ict.php");
        } else if ($row["status"] == "tech") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ../src/tech.php");
        } else if ($row["status"] == "gs") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ../src/gs.php");
        } else if ($row["status"] == "store") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./../src/store.php");
        } else if ($row["status"] == "property") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./../src/property.php");
        } else if ($row["status"] == "purchaser") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./../src/purchaser.php");
        } else if ($row["status"] == "fp") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./../src/fp.php");
        } else {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ../src/reform.php");
        }
    } else {
        $error = "Your Login Name or Password is invalid";
    }

        // if (empty($username) || empty($password)) {
        //     $message = "Please enter username and password.";
        //     $message_type = "danger";
        // } else {
        //     $stmt = $link->prepare("SELECT userID, userName, email, fullName, password_hash FROM profile WHERE username = ? OR email = ?");
        //     $stmt->bind_param("ss", $username, $userName);
        //     $stmt->execute();
        //     $result = $stmt->get_result();
        //     if ($result->num_rows === 1) {
        //         $user = $result->fetch_assoc();
        //         if (password_verify($password, $user['password_hash'])) {
        //             $_SESSION['user_id'] = $user['id'];
        //             $_SESSION['username'] = $user['username'];
        //             $_SESSION['email'] = $user['email'];
        //             $_SESSION['full_name'] = $user['full_name'];
        //             $message = "Login successful!";
        //             $message_type = "success";
        //             // Redirect to refresh page (avoid form resubmission)
        //             header("Location: " . index.php);
        //             exit;
        //         } else {
        //             $message = "Invalid password.";
        //             $message_type = "danger";
        //         }
        //     } 
            
        //     else {
        //         $message = "User not found.";
        //         $message_type = "danger";
        //     }
        // }
    }

    // Update profile
    if (isset($_POST['update_profile']) && isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $full_name = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $new_password = $_POST['new_password'];
        $confirm_new = $_POST['confirm_new_password'];

        // Validate
        $errors = [];
        if (empty($full_name)) $errors[] = "Full name is required.";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
        // Check if email is already used by another user
        if (!empty($email)) {
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $stmt->bind_param("si", $email, $user_id);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $errors[] = "Email already used by another account.";
            }
        }
        if (!empty($new_password) && $new_password !== $confirm_new) {
            $errors[] = "New passwords do not match.";
        }
        if (!empty($new_password) && strlen($new_password) < 6) {
            $errors[] = "Password must be at least 6 characters.";
        }

        if (empty($errors)) {
            // Update query
            $sql = "UPDATE users SET full_name = ?, email = ?";
            $params = [$full_name, $email];
            $types = "ss";
            if (!empty($new_password)) {
                $hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $sql .= ", password_hash = ?";
                $params[] = $hashed;
                $types .= "s";
            }
            $sql .= " WHERE id = ?";
            $params[] = $user_id;
            $types .= "i";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param($types, ...$params);
            if ($stmt->execute()) {
                $_SESSION['full_name'] = $full_name;
                $_SESSION['email'] = $email;
                $message = "Profile updated successfully!";
                $message_type = "success";
            } else {
                $message = "Update failed: " . $conn->error;
                $message_type = "danger";
            }
        } else {
            $message = implode("<br>", $errors);
            $message_type = "danger";
        }
    }

    // Logout
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile · Register · Login · Edit</title>
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
            <a class="navbar-brand" href="#">
                <i class="bi bi-person-circle me-2" style="color: #0a3d5e;"></i>
                User Profile Management
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['id'])): ?>
                    <li class="nav-item"><span class="navbar-text me-3">Welcome,
                            <?= htmlspecialchars($_SESSION['fullName']) ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="?logout=1"><i class="bi bi-box-arrow-right"></i>
                            Logout</a></li>
                    <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="#login-register">Login / Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-3">
        <?php if ($message): ?>
        <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['id'])): ?>

        <!-- PROFILE EDIT SECTION -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="profileForm">
                            <div class="form-control me-2">
                                <!-- <label class="form-label fw-semibold">Username (read-only)</label> -->
                                <input type="text" class="form-control" placeholder="User Name"
                                    value="<?= htmlspecialchars($_SESSION['username']) ?>" disabled>
                            </div>
                            <div class="form-control me-2">
                                <!-- <label class="form-label fw-semibold">Full Name</label> -->
                                <input type="text" class="form-control" name="full_name"
                                    value="<?= htmlspecialchars($_SESSION['full_name']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <!-- <label class="form-label fw-semibold">Email</label> -->
                                <input type="email" class="form-control" name="email"
                                    value="<?= htmlspecialchars($_SESSION['email']) ?>" required>
                            </div>
                            <hr>
                            <h6 class="fw-semibold">Change Password (leave blank to keep current)</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <!-- <label class="form-label">New Password</label> -->
                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <!-- <label class="form-label">Confirm New Password</label> -->
                                    <input type="password" class="form-control" name="confirm_new_password"
                                        id="confirm_new_password">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" name="update_profile" class="btn btn-primary"><i
                                        class="bi bi-save me-1"></i>Update Profile</button>
                                <a href="?logout=1" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i>
                                    Logout</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            
        <!-- LOGIN / REGISTER TABS -->
        <div class="row justify-content-center" id="login-register">
            <div class="col-md-8">
                <div class="card">
                    <!-- login and registration button control -->
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="login-tab" data-bs-toggle="tab"
                                    data-bs-target="#login" type="button" role="tab">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="register-tab" data-bs-toggle="tab"
                                    data-bs-target="#register" type="button" role="tab">Register</button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">

                            <!-- Login Form -->
                            <div class="tab-pane fade show active" id="login" role="tabpanel">
                                <form method="POST" id="loginForm">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Username or Email</label>
                                        <input type="text" class="form-control" name="login_username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Password</label>
                                        <input type="password" class="form-control" name="login_password" required>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary w-30"><i
                                            class="bi bi-box-arrow-in-right me-1"></i>Login</button>
                                </form>
                            </div>
                        </div>

                        <!-- Register -->
                        <div class="tab-pane fade" id="register" role="tabpanel">
                            <form method="POST" id="registerForm">
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <input type="text" name="fullName" class="form-control" id="fullName"
                                            placeholder="Full Name" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="userName" type="text" class="form-control" id="userName"
                                            placeholder="User Name" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input name="userID" type="text" class="form-control" id="userID"
                                            placeholder="Employee ID" required>
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Organization email" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="confirm_password" type="password" class="form-control" id="confirm_password"
                                            placeholder="Confirm password" required>
                                    </div>
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" name="contact" class="form-control" id="contact"
                                            placeholder="Phone No." required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="status" type="text" class="form-control" id="status"
                                            placeholder="Your department" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="endDate" type="date" class="form-control" id="endDate"
                                            placeholder="Profile End Date" required>
                                    </div>
                                </div><br>
                             
                                
                               
                                <button type="submit" name="register" class="btn btn-success w-30"><i
                                        class="bi bi-person-plus me-1"></i>Register</button>
                                <button type="reset" name="cancil" class="btn btn-warning w-30"><i
                                        class="bi bi-person-plus me-1"></i>Cancil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    </div>

    <footer class="py-3 text-center text-muted">
        <small>&copy; 2026 Animal Health Institute</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript validation and interactivity -->
    <script>
    (function() {
        'use strict';

        // Registration form validation
        const regForm = document.getElementById('registerForm');
        if (regForm) {
            regForm.addEventListener('submit', function(e) {
                const password = document.getElementById('reg_password').value;
                const confirm = document.getElementById('reg_confirm').value;
                const username = document.getElementById('reg_username').value.trim();
                const email = document.getElementById('reg_email').value.trim();

                let error = '';
                if (username.length < 3) {
                    error = 'Username must be at least 3 characters.';
                } else if (!email.includes('@') || !email.includes('.')) {
                    error = 'Please enter a valid email address.';
                } else if (password.length < 6) {
                    error = 'Password must be at least 6 characters.';
                } else if (password !== confirm) {
                    error = 'Passwords do not match.';
                }

                if (error) {
                    e.preventDefault();
                    alert(error);
                }
            });
        }

        // Profile form: validate password match if new password is filled
        const profileForm = document.getElementById('profileForm');
        if (profileForm) {
            profileForm.addEventListener('submit', function(e) {
                const newPw = document.getElementById('new_password').value;
                const confirmPw = document.getElementById('confirm_new_password').value;
                if (newPw || confirmPw) {
                    if (newPw.length < 6) {
                        e.preventDefault();
                        alert('New password must be at least 6 characters.');
                        return;
                    }
                    if (newPw !== confirmPw) {
                        e.preventDefault();
                        alert('New passwords do not match.');
                    }
                }
            });
        }

        // Optional: auto-switch tab if URL hash
        if (window.location.hash === '#register') {
            const registerTab = document.querySelector('#register-tab');
            if (registerTab) registerTab.click();
        }
    })();
    </script>
</body>

</html>