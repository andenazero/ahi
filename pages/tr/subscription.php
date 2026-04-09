<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_ahi');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();

$param_fname = $_POST['name'];
$param_ename = $_POST['email'];

  if($stmt = $link->prepare('INSERT INTO subscription(fullname, email) VALUES (?,?)'))
        {
            $stmt->bind_param('ss', $param_fname, $param_ename);
            $stmt->execute();
           
            header('location: pre-survey.php');
            $_SESSION['response']="successfully subscribed!";
            $_SESSION['types']="success";
        }
        else 
        {
            echo 'ERROR: happen';
        }
?>
