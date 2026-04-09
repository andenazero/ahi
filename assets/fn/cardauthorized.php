<?php
require_once 'config.php';
session_start();
// if(isset($_POST['submit']))

$crid = $_POST['crid']; 
$authorizedby = $_POST['authorizedby'];
$authorizeddate = $date = date('Y/m/d H:i:s');
$totalAllowed = $_POST['totalAllowed'];

$sql = "UPDATE card SET authorizedby='$authorizedby', totalAllowed='$totalAllowed', authorizeddate='$authorizeddate' WHERE crid=$crid";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ./../../pages/src/gs.php');
   $_SESSION['response']="Total amount of allowed card is:" . $totalAllowed;
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
}

?>

 