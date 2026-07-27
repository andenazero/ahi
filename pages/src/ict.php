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
                    <li class="nav-item"><a class="nav-link" href="index.php"><i
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
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
                        <!-- </div> -->
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row g-0 align-items-center">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>PC
                                                    Mainenance</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $count_computer;?></span></div>
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
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $count_networking;?></span></div>
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
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo $count_system;?></span></div>
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
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $count_other;?></span></div>
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
                                    <h6 class="text-primary fw-bold m-0">Assign Techniciam for requested service</h6>
                                    <!-- <div class="dropdown show no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu show shadow dropdown-menu-end animated--fade-in" data-bs-popper="none">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">View primary</a><a class="dropdown-item" href="#">Hide Message</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete Message&nbsp;</a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <?php
                                    // include("./../../assets/fn/config.php");
                                    // SQL query to select data from database
                                    $sql = "SELECT * FROM ictform WHERE maintainedby='' ORDER BY requesteddate ASC";
                                    $res_data = mysqli_query($link, $sql);
                                    ?>
                                    <div class="table-responsive table mt-2" id="dataTables" role="grid"
                                        aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTables">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="5%">R.ID</th>
                                                    <th width="20%">Req. By</th>
                                                    <th width="15%">Req. Date</th>
                                                    <th width="25%">Problem Specification</th>
                                                    <th width="10%">Progress</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                while ($rows = mysqli_fetch_array($res_data)) {
                                                    $i += 1;
                                                    ?>

                                                    <tr>
                                                        <!-- <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td> -->
                                                        <td>
                                                            <?= $i; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['id']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['requestedby']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['requesteddate']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['problem']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['followups']; ?>
                                                        </td>

                                                        <td>
                                                            <!-- <a
                                                                href="./../../assets/fn/ictanswered.php?id=<?= $rows['id'] ?>">
                                                                <i class="fas fa-check text-success"></i></a>&nbsp; -->

                                                            <a href="./../../assets/fn/ictasignment?id<?= $rows['id']; ?>"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#editmodal">
                                                                <i class="fas fa-pen text-primary"></i></a>&nbsp;

                                                            <a href="#?id=<?= $rows['id'] ?>">
                                                                <i class="fas fa-list"></i></a>&nbsp;

                                                            <a href="./../../assets/fn/ictformdelet.php?id=<?= $rows['id']; ?>">
                                                                <i class="fas fa-recycle text-danger" onclick="return confirm('Are you sure you want to delete this item?');"></i></a>

                                                        


                                                        </td>
                                                    <?php } ?>
                                                    <!-- <tfoot>
                                                <tr>
                                                    <td><strong>Name</strong></td>
                                                    <td><strong>Position</strong></td>
                                                    <td><strong>Office</strong></td>
                                                    <td><strong>Age</strong></td>
                                                    <td><strong>Start date</strong></td>
                                                    <td><strong>Salary</strong></td>
                                                </tr>
                                            </tfoot> -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- begining of the second list -->
                    <div class="row">
                        <div class="col-lg-7 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">My service to deliver</h6>
                                    <!-- <div class="dropdown show no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="true" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu show shadow dropdown-menu-end animated--fade-in" data-bs-popper="none">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">View primary</a><a class="dropdown-item" href="#">Hide Message</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete Message&nbsp;</a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <?php
                                    // include("./../../assets/fn/config.php");
                                    // SQL query to select data from database
                                    $sqls = "SELECT * FROM ictform WHERE maintainedby='$name' AND followups!='Done' ORDER BY requesteddate ASC";
                                    $res_datas = mysqli_query($link, $sqls);
                                    ?>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                        aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th width="3%">#</th>
                                                    <th width="12%">Req. By</th>
                                                    <th width="15%">Req. Date</th>
                                                    <th width="25%">Problem Specification</th>
                                                    <th width="15%">Progress</th>
                                                    <th width="20%">Return To</th>
                                                    <!-- <th width="10%">Return Date</th> -->
                                                    <th width="8%">Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                while ($rows = mysqli_fetch_array($res_datas)) {
                                                    $i += 1;
                                                    ?>

                                                    <tr>
                                                        <!-- <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td> -->
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
                                                            <?= $rows['problem']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['followups']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $rows['recivedby']; ?>
                                                        </td>
                                                      
                                                        <td>
                                                            <a
                                                                href="./../../assets/fn/ictanswered.php?id=<?= $rows['id'] ?>">
                                                                <i class="fas fa-check text-success"></i></a>
                                                            

                                                            <a href="./ictformedit.php?id=<?= $rows['id'] ?>">
                                                                <i class="fas fa-pen text-danger"></i></a>&nbsp;
                                                        </td>
                                                    <?php } ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of the second list  -->


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
                                        <input name="serial" type="text" class="form-control" id="serial"
                                            placeholder="Serial No.">
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
                                            <option value="Abebe Fantaw">Abebe Fantaw</option>
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