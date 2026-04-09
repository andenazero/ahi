<?php
$name = $_SESSION['login_user'];
if($name!="ted")
{
    header("location: ./../../assets/fn/logout.php");
}
?>