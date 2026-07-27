<?php
include('../../assets/fn/session.php');
// include('../../assets/chqits/chqitsict.php');
$status = $_SESSION['login_user'];
$name = $_SESSION['fullName'];
if ($status != "ict") {
    header("location: ./../../assets/fn/logout.php");
}
?>