<?php
session_start();
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
// if(isset($_POST['submit'])){
// session_start();
$param_uid = $_POST['tele'];
$param_opt1 = $_POST['opt1'];
$param_opt2 = $_POST['opt2'];
$param_opt3 = $_POST['op3'];
$param_opt4 = $_POST['op4'];
$param_opt5 = $_POST['opt5'];
$param_opt6 = $_POST['op6'];
$param_opt7 = $_POST['op7'];
$param_opt8 = $_POST['opt8'];
$param_opt9 = $_POST['opt9'];
$param_opt10 = $_POST['opt10'];

// $q1 = "C";
// $q2 = "D";
// $q3 = "A";
// $q4 = "B";
// $q5 = "D";
// $q6 = "B";
// $q7 = "B";
// $q8 = "C";
// $q9 = "B";
// $q10 = "E";
// $score = "";
// $counter = 0;
  if($stmt = $link->prepare('INSERT INTO answers(uid,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10) VALUES (?,?,?,?,?,?,?,?,?,?,?)'))
        {
            $stmt->bind_param('sssssssssss', $param_uid, $param_opt1, $param_opt2, $param_opt3, $param_opt4, $param_opt5, $param_opt6, $param_opt7, $param_opt8, $param_opt9, $param_opt10);
            $stmt->execute();
       
                     
            header('location: pre-survey.php');
            $_SESSION['response']="your pre-training quiz submited successfully";
            $_SESSION['types']="success";
        }
        else
        {
            echo 'ERROR: happen';
        }
// }
       
?>