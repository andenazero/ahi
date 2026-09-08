<?php
include('../../assets/fn/session.php');
include("../../assets/fn/config.php");

// --- 1. DYNAMIC DASHBOARD COUNTS ---

// Computer Maintenance Count (Checks for desktop, laptop, maintenance, or computer)
$query_comp = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) IN ('desktop', 'laptop', 'maintenance', 'computer')";
$result_comp = mysqli_query($link, $query_comp);
$row_comp = mysqli_fetch_assoc($result_comp);
$count_computer = $row_comp['total'] ?? 0;

// Networking Count
$query_net = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) = 'networking'";
$result_net = mysqli_query($link, $query_net);
$row_net = mysqli_fetch_assoc($result_net);
$count_networking = $row_net['total'] ?? 0;

// System Support Count
$query_sys = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) IN ('mobile', 'system', 'software')";
$result_sys = mysqli_query($link, $query_sys);
$row_sys = mysqli_fetch_assoc($result_sys);
$count_system = $row_sys['total'] ?? 0;

// Other Requests Count
$query_other = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) NOT IN ('desktop', 'laptop', 'maintenance', 'computer', 'networking', 'mobile', 'system', 'software')";
$result_other = mysqli_query($link, $query_other);
$row_other = mysqli_fetch_assoc($result_other);
$count_other = $row_other['total'] ?? 0;

// --- 2. FETCH ALL REQUESTS FOR THE TABLE ---
$query_table = "SELECT * FROM ictform ORDER BY id DESC";
$result_table = mysqli_query($link, $query_table);

// include('../../assets/chqits/chqitsict.php');
$status = $_SESSION['login_user'];
$name = $_SESSION['fullName'];
if ($status != "ict") {
    header("location: ./../../assets/fn/logout.php");
}
?>

<?php
// Database configuration
$host = 'localhost';
$db   = 'db_ahi';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

// 1. Get current rows per page (Default: 10)
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? (int)$_GET['limit'] : 10;
// Ensure limit is a positive integer to prevent invalid queries
$limit = max(1, $limit); 

// 2. Get current page number (Default: 1)
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);

// 3. Calculate SQL OFFSET
$offset = ($page - 1) * $limit;

// 4. Get total number of records
$totalRowsStmt = $pdo->query("SELECT COUNT(*) FROM ictform");
$totalRows = $totalRowsStmt->fetchColumn();

// 5. Calculate total pages
$totalPages = ceil($totalRows / $limit);

// Ensure page doesn't exceed total pages
if ($page > $totalPages && $totalPages > 0) {
    $page = $totalPages;
    $offset = ($page - 1) * $limit;
}

// 6. Fetch records with LIMIT and OFFSET
$stmt = $pdo->prepare("SELECT * FROM ictform ORDER BY id DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$records = $stmt->fetchAll();
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
</head>
<style>
.container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
.controls { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
th { background-color: #007bff; color: white; }
tr:nth-child(even) { background-color: #f9f9f9; }
.pagination {
    display: flex;
    gap: 5px;
    list-style: none;
    padding: 0;
}

.pagination a,
.pagination span {
    padding: 8px 12px;
    border: 1px solid #ddd;
    text-decoration: none;
    color: #007bff;
    border-radius: 4px;
}

.pagination .active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

.pagination .disabled {
    color: #ccc;
    pointer-events: none;
}
</style>

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
                    <li class="nav-item"><a class="nav-link" href="./ict.php"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i
                                class="fas fa-table"></i><span>Table</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Related Pages</span></a></li> -->
                    <li class="nav-item"><a class="nav-link" href="register.php"><i
                                class="fas fa-user-circle"></i><span>Register</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                    placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i
                                        class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light border-0 form-control small"
                                                type="text" placeholder="Search for ..."><button class="btn btn-primary"
                                                type="button"><i class="fas fa-search"></i></button></div>
                                    </form>
                                </div>
                            </li>
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
                                                class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Weakly
                                            Service</a>
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
                </nav>
                <div class="container-fluid">

                    <!-- total report on ict service -->
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row g-0 align-items-center">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>PC
                                                    Mainenance</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span><?php echo $count_computer;?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row g-0 align-items-center">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                                <span>Networking</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span><?php echo $count_networking;?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-info py-2">
                                <div class="card-body">
                                    <div class="row g-0 align-items-center">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>System
                                                    Support</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3">
                                                        <span><?php echo $count_system;?></span></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-info" aria-valuenow="50"
                                                            aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                            <span class="visually-hidden">80</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-warning py-2">
                                <div class="card-body">
                                    <div class="row g-0 align-items-center">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Other
                                                    Requests</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span><?php echo $count_other;?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <!-- <h6 class="text-primary fw-bold m-0">Assign Techniciam for requested service</h6> -->
                                    <!-- <div class="dropdown show no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu show shadow dropdown-menu-end animated--fade-in" data-bs-popper="none">
                                            <p class="text-center dropdown-header">Team wise :</p>
                                                <a class="dropdown-item" href="#">Networking & Maintenance</a>
                                                <a class="dropdown-item" href="#">System & development</a>
                                            <div class="dropdown-divider"></div>
                                                <p class="text-center dropdown-header">Time wise :</p>
                                            <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Weakly&nbsp;</a>
                                                <a class="dropdown-item" href="#">Monthly&nbsp;</a>
                                                <a class="dropdown-item" href="#">Quarterly&nbsp;</a>
                                                <a class="dropdown-item" href="#">Semi-anually&nbsp;</a>
                                                <a class="dropdown-item" href="#">Anually&nbsp;</a>

                                        </div>
                                    </div> -->
                                </div>
                                <!-- <div class="card-body">
                                    <?php
                                    // include("./../../assets/fn/config.php");
                                    // SQL query to select data from database
                                    // $sqls = "SELECT * FROM ictform WHERE requesteddate BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()";
                                    $sqls = "SELECT * FROM ictform WHERE DATE(requesteddate) >= CURDATE() - INTERVAL 7 DAY";
;

                                    $res_data = mysqli_query($link, $sqls);
                                    ?>
                                    <div class="table-responsive table mt-2" id="dataTables" role="grid"
                                        aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTables">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="20%">Req. By</th>
                                                    <th width="15%">Req. Date</th>
                                                    <th width="20%">Rec. Date</th>
                                                    <th width="20%">Problem type</th>
                                                    <th width="20%">Maintained by</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                while ($rows = mysqli_fetch_array($res_data)) {
                                                    $i += 1;
                                                    ?>

                                                    <tr>
                                                        <td>
                                                            <?= $i; ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?= $rows['requestedby']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['requesteddate']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['receiveddate']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['equipmenttype']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['maintainedby']; ?>
                                                        </td>

                                                       
                                                    <?php } ?>
                                                    
                                        </table>
                                    </div>
                                </div> -->

                                <!-- begininng of new pagination -->
                                <div class="container">

                                    <!-- Controls Bar: Select Rows per Page -->
                                    <div class="controls">
                                        <form method="GET" action="">
                                            <label for="limit">Show rows per page: </label>
                                            <select name="limit" id="limit" onchange="this.form.submit()">
                                                <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                                                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                                                <option value="25" <?= $limit == 25 ? 'selected' : '' ?>>25</option>
                                                <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50</option>
                                                <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100</option>
                                            </select>
                                            <!-- Preserve page 1 when changing row limits -->
                                            <input type="hidden" name="page" value="1">
                                        </form>

                                        <div>
                                            Showing <strong><?= min($offset + 1, $totalRows) ?></strong> to
                                            <strong><?= min($offset + $limit, $totalRows) ?></strong> of
                                            <strong><?= $totalRows ?></strong> entries
                                        </div>
                                    </div>

                                    <!-- Data Table -->

                                    <table class="table my-0" id="dataTables">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="20%">Req. By</th>
                                                <th width="15%">Req. Date</th>
                                                <th width="20%">Rec. Date</th>
                                                <th width="20%">Problem type</th>
                                                <th width="20%">Maintained by</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php if (!empty($records)): ?>
                                            <?php foreach ($records as $row): ?>
                                            <tr>
                                                <td><?= number_format($i++) ?></td>
                                                <td><?= htmlspecialchars($row['requestedby']) ?></td>
                                                <td><?= htmlspecialchars($row['requesteddate']) ?></td>

                                                <td><?= htmlspecialchars($row['receiveddate']) ?></td>
                                                <td><?= htmlspecialchars($row['equipmenttype']) ?></td>
                                                <td><?= htmlspecialchars($row['maintainedby']) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="3">No records found.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                    <!-- Pagination Links -->
                                    <ul class="pagination">
                                        <!-- Previous Button -->
                                        <?php if ($page > 1): ?>
                                        <a href="?page=<?= $page - 1 ?>&limit=<?= $limit ?>">« Prev</a>
                                        <?php else: ?>
                                        <span class="disabled">« Prev</span>
                                        <?php endif; ?>

                                        <!-- Page Numbers -->
                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <?php if ($i == $page): ?>
                                        <span class="active"><?= $i ?></span>
                                        <?php else: ?>
                                        <a href="?page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                                        <?php endif; ?>
                                        <?php endfor; ?>

                                        <!-- Next Button -->
                                        <?php if ($page < $totalPages): ?>
                                        <a href="?page=<?= $page + 1 ?>&limit=<?= $limit ?>">Next »</a>
                                        <?php else: ?>
                                        <span class="disabled">Next »</span>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <!-- ending of new pagination -->

                            </div>
                        </div>
                    </div>




                </div>
            </div>
            <!-- here is the ICT maintenance form -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header
                        <div class="modal-header">
                            <h4 class="modal-title">ICT Maintenance Form</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div> -->

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" action="./../../assets/fn/ictmaintenance.php">
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <input name="fname" type="text" class="form-control" id="fname"
                                            placeholder="Requested by">
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="requesteddate" type="date" class="form-control" id="requesteddate"
                                            placeholder="Date">
                                    </div>
                                </div><br>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input name="type" type="text" class="form-control" id="type"
                                            placeholder="Equipment type">
                                    </div>

                                    <div class="col-sm-6">
                                        <input name="phone" type="text" class="form-control" id="phone"
                                            placeholder="Phone No.">
                                    </div>
                                </div><br>

                                <div class="form-group row">
                                    <div class="col-sm-12">

                                        <label for="exampleFormControlTextarea1" class="form-label">Specify the problem
                                            in less than 100 words</label>
                                        <textarea name="problem" class="form-control" id="problem" rows="3"></textarea>
                                    </div>
                                </div><br>

                                <!-- here is the button area -->
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="reset" class="btn btn-danger">Clear</button>
                                    </div>
                                </div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ends of the ict maintenance modal form -->

            <!-- Assign technician modal  -->
            <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="editmodalLabel">Assign Technician</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="./../../assets/fn/ictasignment.php">

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <input name="id" type="text" class="form-control" id="id"
                                            placeholder="Request id">
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-select" name="assignedto" type="text" class="form-control"
                                            id="type" placeholder="Tech. Name" required>

                                            <option value="Tewodros Alemu">Tewodros Alemu</option>
                                            <option value="Abdurekib Mohammed">Abdurekib Mohammed</option>
                                            <option value="Abebe Fenta">Abebe Fantaw</option>
                                            <option value="Bizunesh Alemu">Bizunesh Alemu</option>
                                            <option value="Sadat Zaid">Sadat Zaid</option>
                                            <option value="Other" selected>Others</option>
                                        </select>
                                    </div>


                                </div><br>
                                <!-- here is the button area -->
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input name="asigenddate" type="date" class="form-control" id="asigenddate"
                                            placeholder="Date Assigned">
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success">Assign technician</button>
                                    </div>
                                </div><br>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © AHI2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="./../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./../../assets/js/chart.min.js"></script>
    <script src="./../../assets/js/bs-init.js"></script>
    <script src="./../../assets/js/theme.js"></script>
</body>


</html>