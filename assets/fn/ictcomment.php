<?php
require_once 'config.php';
session_start();
$param_impfname = $_POST['fname'];
$param_inpemail = $_POST['email'];
$param_inpdate = $_POST['date'];
$param_inpdept = $_POST['dept'];
$param_inpcategory = $_POST['cat'];
$param_inprel = $_POST['rel'];
$param_inpcomment = $_POST['comment'];

  if($stmt = $link->prepare('INSERT INTO ictcomment(name, email, dept, category, issue, comment, date) VALUES (?,?,?,?,?,?,?)'))
        {
            $stmt->bind_param('sssssss', $param_impfname, $param_inpemail, $param_inpdept, $param_inpcategory, $param_inprel, $param_inpcomment, $param_inpdate);
            $stmt->execute();
           
            header('location: ../../index.php');
            $_SESSION['response']="THANK YOU, Feedback is submitted!";
            $_SESSION['types']="success";
        }
        else
        {
            echo 'ERROR: happen';
        }
?>
