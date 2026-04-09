<?php
require_once 'config.php';
session_start();
if(isset($_GET['id']))
{
$id = $_GET['id'];
$names = $_SESSION['fullName'];
$dates = $date = date('Y/m/d H:i:s');

// $status ="passive";
$sql = "UPDATE ictform SET maintaineddate='$dates' WHERE id=$id";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ./../../pages/src/ict.php');
   $_SESSION['response']="Maintenance is Done successfully";
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
}
} 
?>