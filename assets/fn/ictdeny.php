<?php
require_once 'config.php';
session_start();
if(isset($_GET['id']))
{
$id = $_GET['id'];
$names = $_SESSION['login_user'];
$reason = $_GET['reason'];

// $status ="passive";
$sql = "UPDATE ictform SET maintainedby='$names', followups='$reason' WHERE id=$id";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ../../ict.php');
   $_SESSION['response']="Maintenance is postponed becasuse of '$reason'";
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
}
} 
?> 