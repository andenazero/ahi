<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';
requireGuest();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($fullName === '') {
        $errors[] = 'Full name is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters.';
    }
    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        $stmt = mysqli_prepare($link, 'SELECT id FROM cybersec_users WHERE email = ?');
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = 'An account with this email already exists.';
        }
        mysqli_stmt_close($stmt);
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($link, 'INSERT INTO cybersec_users (full_name, email, password) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($stmt, 'sss', $fullName, $email, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            setFlash('success', 'Registration successful! Please log in.');
            header('Location: login.php');
            exit;
        }

        $errors[] = 'Registration failed. Please try again.';
        mysqli_stmt_close($stmt);
    }
}

$pageTitle = 'Register - CyberSec Portal';
$currentPage = 'register';
include 'includes/header.php';
?>

<div class="auth-wrapper">
    <div class="auth-card">
        <div class="text-center mb-4">
            <i class="bi bi-person-plus-fill text-success" style="font-size: 2.5rem;"></i>
            <h3 class="mt-2">Create Account</h3>
            <p class="text-muted">Join the cybersecurity awareness platform</p>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0 ps-3">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="register.php" id="registerForm">
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="full_name" name="full_name"
                           value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control" id="password" name="password"
                           minlength="6" required>
                </div>
                <div class="form-text text-muted">Minimum 6 characters</div>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary"><i class="bi bi-key-fill"></i></span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                           minlength="6" required>
                </div>
            </div>
            <button type="submit" class="btn btn-cyber w-100 mb-3">Create Account</button>
        </form>

        <p class="text-center text-muted mb-0">
            Already have an account? <a href="login.php" class="text-success">Sign in here</a>
        </p>
    </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', function (e) {
    const pw = document.getElementById('password').value;
    const cpw = document.getElementById('confirm_password').value;
    if (pw !== cpw) {
        e.preventDefault();
        alert('Passwords do not match.');
    }
});
</script>

<?php include 'includes/footer.php'; ?>
