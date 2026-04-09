<?php
require_once 'config.php';
session_start();
// if(isset($_POST['submit']))

$crid = $_POST['crid']; 
$issuedby = $_POST['issuedby'];
$issueddate = $date = date('Y/m/d H:i:s');

$sql = "UPDATE card SET issuedby='$issuedby', issueddate='$issueddate' WHERE crid=$crid";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ./../../pages/src/store.php');
   $_SESSION['response']="Issued Successfully";
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
} 

?>

  