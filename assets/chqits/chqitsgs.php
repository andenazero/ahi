<?php
$name = $_SESSION['login_user'];
if($name!="haymanot")
{
    header("location: ./../../assets/fn/logout.php");
}
?>