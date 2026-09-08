<?php
session_start();

// Load employee data from file
$dataFile = __DIR__ . '/employees.json';
$employees = [];

if (file_exists($dataFile)) {
    $employees = json_decode(file_get_contents($dataFile), true) ?? [];
} else {
    die("<p style='color:red;'>Error: Employee data file missing.</p>");
}

// 1. Handle Login Switching (For testing purposes)
if (isset($_GET['login_as']) && array_key_exists($_GET['login_as'], $employees)) {
    $_SESSION['username'] = $_GET['login_as'];
} elseif (!isset($_SESSION['username'])) {
    // Default initial login for demonstration
    $_SESSION['username'] = 'johndoe';
}

// 2. Identify Logged-In User and Retrieve Allowed Cards
$currentUsername = $_SESSION['username'];
$currentUserData = $employees[$currentUsername] ?? null;

// Auto-fill value default
$autoAllowedCards = $currentUserData ? $currentUserData['allowed_cards'] : 0;
$employeeFullName = $currentUserData ? $currentUserData['name'] : 'Unknown User';

// 3. Process Form Submission
$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestedCards = intval($_POST['total_cards'] ?? 0);
    $cardType = htmlspecialchars($_POST['card_type'] ?? '');
    
    // Logic for card issuance processing
    $successMessage = "Successfully submitted request for {$requestedCards} '{$cardType}' card(s) for {$employeeFullName}.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card Issuance Form</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 40px; }
        .card-box { background: #fff; padding: 24px; border-radius: 8px; max-width: 450px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; font-weight: bold; color: #333; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[readonly] { background-color: #e9ecef; color: #495057; cursor: not-allowed; }
        button { background: #2e7d32; color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-weight: bold; font-size: 1rem; }
        button:hover { background: #256127; }
        .switch-user { background: #f8f9fa; padding: 10px; border-radius: 4px; border: 1px solid #ddd; margin-bottom: 20px; font-size: 0.9em; }
        .alert { background: #e8f5e9; color: #2e7d32; padding: 12px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="card-box">
    <!-- Quick Switcher to simulate all 5 employee logins -->
    <div class="switch-user">
        <label for="user_switch"><strong>Simulate Login As:</strong></label>
        <select id="user_switch" onchange="location = this.value;">
            <?php foreach ($employees as $userKey => $userVal): ?>
                <option value="?login_as=<?= $userKey ?>" <?= $userKey === $currentUsername ? 'selected' : '' ?>>
                    <?= htmlspecialchars($userVal['name']) ?> (<?= $userVal['allowed_cards'] ?> cards)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <h2>Card Issue Form</h2>

    <?php if ($successMessage): ?>
        <div class="alert"><?= $successMessage ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Employee Name:</label>
            <input type="text" value="<?= htmlspecialchars($employeeFullName) ?>" readonly>
        </div>

        <!-- <div class="form-group">
            <label for="card_type">Card Type:</label>
            <select name="card_type" id="card_type" required>
                <option value="Fuel Allowance Card">Fuel Allowance Card</option>
                <option value="Meal Allowance Card">Meal Allowance Card</option>
                <option value="Corporate Gift Card">Corporate Gift Card</option>
            </select>
        </div> -->

        <div class="form-group">
            <label for="total_cards">Total Cards Allowed:</label>
            <!-- Automatically filled based on session login name -->
            <input 
                type="number" 
                id="total_cards" 
                name="total_cards" 
                value="<?= $autoAllowedCards ?>" 
                readonly
            >
        </div>

        <button type="submit">Process Card Issue</button>
    </form>
</div>

</body>
</html>