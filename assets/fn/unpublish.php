<?php
require_once 'config.php';
session_start();
if(isset($_GET['id']))
{
$id = $_GET['id'];

// $status ="passive";
$sql = "UPDATE messenger SET status='passive' WHERE id=$id";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ../../admin.php');
   $_SESSION['response']="your Message is down from the board";
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
}
}
?>