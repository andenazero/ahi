<?php
require_once 'config.php';
session_start();
if(isset($_GET['id']))
{
$id = $_GET['id'];

// $status ="passive";
$sql = "UPDATE surveillance SET status='seen' WHERE id=$id";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ../../reform.php');
   $_SESSION['response']="Evaluation is seen";
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
}
} 
?>