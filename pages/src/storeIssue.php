<?php
include('../../assets/fn/session.php');
// include('../../assets/chqits/chqitsict.php');
$status = $_SESSION['login_user'];
$name = $_SESSION['fullName'];
if($status!="user")
{
    header("location: ./../../assets/fn/logout.php");
}
?>

<?php

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
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AHI ERP</title>
    <link rel="stylesheet" href="./../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="./../../assets/fonts/fontawesome-all.min.css">

    <style>
    :root {
        --primary: #2563eb;
        --bg: #f8fafc;
        --text: #1e293b;
    }

    .conts {
        font-family: 'Inter', system-ui, sans-serif;
        background-color: var(--bg);
        color: var(--text);
        display: flex;
        justify-content: center;
        align-items: center;
        /* min-height: 100vh; */
        margin: 0;
    }

    .form-card {
        background: white;
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    .form-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .form-header h1 {
        font-size: 1.5rem;
        margin: 0;
        color: #0f172a;
    }

    .form-header p {
        font-size: 0.875rem;
        color: #64748b;
    }



    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: var(--primary);
        /* ring: 2px solid #bfdbfe; */
    }

    .btn-submit {
        width: 100%;
        background-color: var(--primary);
        color: white;
        padding: 0.75rem;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        margin-top: 1rem;
        transition: background 0.2s;
    }

    .btn-submit:hover {
        background-color: #1d4ed8;
    }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.5rem;
        background: #e2e8f0;
        border-radius: 4px;
        font-size: 0.75rem;
        margin-top: 0.5rem;
    }
    </style>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
    }

    .card-box {
        background: #fff;
        padding: 24px;
        border-radius: 8px;
        max-width: 450px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[readonly] {
        background-color: #e9ecef;
        color: #495057;
        cursor: not-allowed;
    }

    button {
        background: #2e7d32;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-weight: bold;
        font-size: 1rem;
    }

    button:hover {
        background: #256127;
    }

    .switch-user {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
        font-size: 0.9em;
    }

    .alert {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 15px;
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="#"><img class="border rounded-circle img-profile"
                        src="./../../assets/img/avatars/final%205.png" width="41" height="41">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><small>Animal Health</small>
                        <div><small>Institute - AHI</small></div>
                    </div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="./user.php"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-table"></i><span>Table</span></a>
                    </li>
                    <!-- <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Related Pages</span></a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#"><i
                                class="fas fa-user-circle"></i><span>Register</span></a></li>
                </ul>


                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>

            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar">
                    <div class="container-fluid">
                        <div class="switch-user">
                            <select id="user_switch" onchange="location = this.value;">
                                <?php foreach ($employees as $userKey => $userVal): ?>
                                <option value="?login_as=<?= $userKey ?>"
                                    <?= $userKey === $currentUsername ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($userVal['name']) ?>
                                    (<?= $userVal['allowed_cards'] ?> cards)
                                </option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                    </div>
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>

                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="badge bg-danger badge-counter">3+</span><i
                                            class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i
                                                        class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i
                                                        class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i
                                                        class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your
                                                    account.</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="badge bg-danger badge-counter">7</span><i
                                            class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                    src="./../../assets/img/avatars/girl profile.jpg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can
                                                        help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Tigist - 58m</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle"
                                                    src="./../../assets/img/avatars/boy profile.jpg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last
                                                        month!</span></div>
                                                <p class="small text-gray-500 mb-0">Abebe - 1d</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                                    aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown"
                                        href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">
                                            <?php echo 'Welcome | ' . $name; ?>
                                        </span><img class="border rounded-circle img-profile"
                                            src="./../../assets/img/avatars/boy%20profile.jpg" width="41"
                                            height="41"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal"><i
                                                class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;ICT
                                            Maintenance</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="./../../assets/fn/logout.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="d-sm-flex justify-content-between align-items-center mb-12">
                        <?php if (isset($_SESSION['response'])) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <b class="text-center">
                                <?= $_SESSION['response']; ?>
                            </b>
                        </div>
                        <?php 
                        }
                        unset($_SESSION['response']); 
                        ?>
                    </div>
                </nav>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="conts">

                            <?php if ($successMessage): ?>
                            <div class="alert"><?= $successMessage ?></div>
                            <?php endif; ?>

                            <form method="POST" action="../../assets/fn/cardrequesition.php">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <input name="eid" type="text" class="form-control" id="eid" placeholder="E-ID">
                                    </div>
                                    <div class="col-sm-7">
                                        <input name="fullName" type="text" class="form-control" id="fname"
                                            value="<?= $name; ?>" readonly>
                                    </div>

                                </div><br>

                                <div class="form-group row">

                                    <div class="col-sm-3">
                                        <select class="form-select" name="uom" type="text" class="form-control" id="uom"
                                            disabled>

                                            <option value="">Pcs</option>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Role">Role</option>
                                            <option value="Pack">Pack</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="ramount" type="text" class="form-control" id="ramount"
                                            value="<?= $autoAllowedCards ?>" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <input name="totalMonth" type="text" class="form-control" id="totalMonth"
                                            placeholder="Total Month" required>
                                    </div>

                                </div><br>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input name="description" type="text" class="form-control" id="description">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="lastMonth" type="text" class="form-control"
                                            id="lastMonth" placeholder="Service type" required>
                                            <option value="">--Month--</option>
                                            <option value="Meskerem">Meskerem</option>
                                            <option value="Tikimt">Tikimt</option>
                                            <option value="Hidar">Hidar</option>
                                            <option value="Tahisas">Tahisas</option>
                                            <option value="Tir">Tir</option>
                                            <option value="Yekatit">Yekatit</option>
                                            <option value="Megabit">Megabit</option>
                                            <option value="Miazia">Miazia</option>
                                            <option value="Ginbot">Ginbot</option>
                                            <option value="Sene">Sene</option>
                                            <option value="Hamle">Hamle</option>
                                            <option value="Nehase">Nehase</option>

                                        </select>
                                    </div>
                                </div><br>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <!-- <label for="exampleFormControlTextarea1" class="form-label">Notice in less than 100 words</label> -->
                                        <textarea name="note" class="form-control" id="note" rows="3" placeholder="Note"
                                            disabled></textarea>
                                    </div>
                                </div><br>

                                <!-- here is the button area -->
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Request</button>
                                    </div>
                                </div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © AHI2024</span></div>
        </div>
    </footer>
    <script src="./../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./../../assets/js/chart.min.js"></script>
    <script src="./../../assets/js/bs-init.js"></script>
    <script src="./../../assets/js/theme.js"></script>
</body>

</html>