<?php
require_once 'config.php';

$tid = $_POST['id'];
$uom = $_POST['uom'];
$amount = $_POST['amounts'];
$authorize = $_POST['authorizedby'];
$authodate = $_POST['authorizedate'];

$sql = "UPDATE request SET uom='$uom', amount='$amount', authorizedby='$authorize',
        authorizeddate='$authodate' 
        WHERE id=$tid";
$result = mysqli_query($link, $sql);
if($result){
   header('location: ../../admin.php');
}else{
    echo 'error';
}
?>
