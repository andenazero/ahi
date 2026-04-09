<?php
require_once 'config.php';
session_start();
// if(isset($_POST['submit']))

$id = $_POST['id'];
//$tnames = $_SESSION['login_user'];
$assignedto = $_POST['assignedto'];
$asigenddate = $date = date('Y/m/d H:i:s');

$sql = "UPDATE ictform SET maintainedby='$assignedto', maintaineddate='$asigenddate', followups='tech assigned' WHERE id=$id";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ./../../pages/src/ict.php');
   $_SESSION['response']="Service is assigned to:" . $assignedto;
//    $_SESSION['response']="your Message is successfully Published";
}else{
    echo 'error';
}

?>

 