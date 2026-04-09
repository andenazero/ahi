<?php
require_once 'config.php';
session_start();
$param_dname = $_POST['dname']; 
$param_edate = $_POST['edate'];
$param_opt1 = $_POST['opt1'];
$param_opt2 = $_POST['opt2'];
$param_opt3 = $_POST['opt3'];
$param_opt4 = $_POST['opt4'];
$param_coments = $_POST['coments']; 

  if($stmt = $link->prepare('INSERT INTO surveillance(dname, edate, opt1, opt2, opt3, opt4, comments) VALUES (?,?,?,?,?,?,?)'))
        {
            $stmt->bind_param('sssssss', $param_dname,$param_edate,$param_opt1,$param_opt2,$param_opt3,$param_opt4,$param_coments);
            $stmt->execute();
           
            header('location: ../../index.php');
            $_SESSION['response']="your Evaluation submited successfully!";
            $_SESSION['types']="success";
        }
        else
        {
            echo 'ERROR: happen';
        }
    
       
?>
