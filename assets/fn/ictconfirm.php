<?php
require_once 'config.php';

$rid = $_POST['rid'];
$rname = $_POST['rname'];
$asigenddate = $_POST['asigenddate'];

$asignedby = $_POST['asignedby'];
// $assignedto = $_POST['assignedto'];


$sql = "UPDATE ictform SET officehead='$asignedby', officedate='$asigenddate' 
        WHERE id=$rid";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ../../ict.php');
}else{
    echo 'error';
}
?>
 