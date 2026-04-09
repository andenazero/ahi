<?php
require_once 'config.php';
session_start();
$param_eid = $_POST['eid'];
$param_fullName = $_POST['fullName'];
$param_rDate = date('Y/m/d H:i:s');
$param_month = $_POST['totalMonth'];
$param_ramount = $_POST['ramount'];
$param_lMonth = $_POST['lastMonth'];

  if($stmt = $link->prepare('INSERT INTO card(eid, FullName, rdate, totalMonth, allowed, lastMonth) VALUES (?,?,?,?,?,?)'))
        {
            $stmt->bind_param('ssssss', $param_eid, $param_fullName, $param_rDate, $param_month, $param_ramount,$param_lMonth);
            $stmt->execute();
           
            header('location: ../../index.php');
            $_SESSION['response']="Mobile card request submited successfully";
            $_SESSION['types']="success";
        }
        else
        {
            echo 'ERROR: Request is not submited';
        }
    
       
?>
