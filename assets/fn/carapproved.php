<?php
require_once 'config.php';
session_start();
// if(isset($_POST['submit']))

$crid = $_POST['crid']; 
$approvedby = $_POST['approvedby'];
$approveddate = $date = date('Y/m/d H:i:s');
$totalAllowed = $_POST['totalAllowed'];

$sql = "UPDATE card SET approvedby='$approvedby', approveddate='$approveddate' WHERE crid=$crid";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ./../../pages/src/property.php');
   $_SESSION['response']="Approved Successfully";
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
} 

?>

 