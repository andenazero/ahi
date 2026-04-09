<?php
require_once 'config.php';
session_start();
$param_fname = $_POST['fmail'];
$param_ename = $_POST['email'];

  if($stmt = $link->prepare('INSERT INTO subscription(fullname, email) VALUES (?,?)'))
        {
            $stmt->bind_param('ss', $param_fname, $param_ename);
            $stmt->execute();
           
            header('location: ../../index.php');
            $_SESSION['response']="successfully subscribed!";
            $_SESSION['types']="success";
        }
        else
        {
            echo 'ERROR: happen';
        }
    
       
?>
