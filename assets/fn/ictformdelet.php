<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../assets/fn/session.php');
require_once('../../assets/fn/config.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);

    $query = "DELETE FROM ictform WHERE id = '$id'";
    if (mysqli_query($link, $query)) {
        header("Location: ./../../pages/src/ict.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
} else {
    header("Location: ./../../pages/src/ict.php");
    exit();
}
?>