<?php
require_once 'config.php';
session_start();
$param_fname = $_POST['fname'];
$param_inptype = $_POST['type'];
$param_inpdate = $_POST['requesteddate'];
$param_inpserial = $_POST['serial'];
$param_inpproblem = $_POST['problem'];

  if($stmt = $link->prepare('INSERT INTO ictform(requestedby, requesteddate, equipmenttype, serialno, problem) VALUES (?,?,?,?,?)'))
        {
            $stmt->bind_param('sssss', $param_fname, $param_inpdate, $param_inptype, $param_inpserial, $param_inpproblem);
            $stmt->execute();
           
            header('location: ../../index.php');
            $_SESSION['response']="your request is successfully submited";
            $_SESSION['types']="success";
        }
        else
        {
            echo 'ERROR: happen';
        }
    
       
?>
