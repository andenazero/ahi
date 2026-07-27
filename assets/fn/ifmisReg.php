<?php
require_once 'config.php';
session_start();
// if(isset($_POST['submit']))

$crid = $_POST['crid']; 
$totalAllowed = $_POST['totalAllowed'];
// $authorizeddate = $date = date('Y/m/d H:i:s');
$totalAllowed = $_POST['totalAllowed'];

$sql = "UPDATE card SET totalAllowed='$totalAllowed' WHERE crid=$crid";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ./../../pages/src/propertyf.php');
   $_SESSION['response']="Successfully and Total amount of allowed card is:" . $totalAllowed;
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
}

?>

 