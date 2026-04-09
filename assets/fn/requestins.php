<?php
require_once 'config.php';

$param_fname = $_POST['fname'];
$param_inpitems = $_POST['items'];
$param_inpdate = $_POST['requesteddate'];
$param_inpuom = $_POST['uom'];
$param_inpdept = $_POST['dept'];
$param_inpamount = $_POST['amount'];

  if($stmt = $link->prepare('INSERT INTO request(requestedby, description, requesteddate, uom, amount, department) VALUES (?,?,?,?,?,?)'))
        {
            $stmt->bind_param('ssssss', $param_fname, $param_inpitems, $param_inpdate, $param_inpuom, $param_inpamount, $param_inpdept);
            $stmt->execute();
            echo 'your request is successfully submited';
        }
        else
        {
            echo 'ERROR: happen';
        }
        header('location: ../../user.php');
       
?>
