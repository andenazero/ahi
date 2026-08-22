<?php
include('../../assets/fn/config.php');
session_start();
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // email and password sent from form 
    $myemail = mysqli_real_escape_string($link, $_POST['email']);
    $mypassword = mysqli_real_escape_string($link, $_POST['password']);
    // $mystatus = mysqli_real_escape_string($link, $_POST['status']);

    // $sql = "SELECT * FROM profile WHERE userName = '$myusername' AND password ='$mypassword' AND status='$mystatus'";

    $sql = "SELECT * FROM profile WHERE email = '$myemail' AND password ='$mypassword'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        if ($row["status"] == "admin") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: admin.php");
        } else if ($row["status"] == "executive") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./executive.php");
        } else if ($row["status"] == "user") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./user.php");
        } else if ($row["status"] == "ict") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./ict.php");
        } else if ($row["status"] == "tech") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./tech.php");
        } else if ($row["status"] == "gs") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./gs.php");
        } else if ($row["status"] == "store") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./store.php");
        } else if ($row["status"] == "property") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./property.php");
        } else if ($row["status"] == "purchaser") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./purchaser.php");
        } else if ($row["status"] == "fp") {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: ./fp.php");
        } else {
            $_SESSION['login_user'] = $row['status'];
            $_SESSION['fullName'] = $row["fullName"];
            header("location: reform.php");
        }
    } else {
        $error = "Your Login Name or Password is invalid";
    }

}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AHI - IC</title>
    <link rel="stylesheet" href="./../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="./../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="./../../assets/bootstrap/css/KStyle.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome to AHI's <br>Authentication section.</h4>
                                        <hr>
                                    </div> 
                                    <form class="user" action="" method="post">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter User Name please" name="email"></div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <select class="form-control form-control-user" name="status" type="text" class="form-control"
                                                id="status" placeholder="usermode">

                                                <option value="user">User employee</option>
                                                <option value="property">Property Manager</option>
                                                <option value="store">Store Manager</option>
                                                <option value="admin">General Service</option>

                                                <option value="tech">Ict technician</option>
                                                <option value="ict">ICT office E</option>

                                                <option value="purchaser">Purchaser</option>
                                                <option value="fp">Finance and purchase E</option>

                                                <option value="reform">Institutional Reform</option>
                                                <option value="executive">Executive office</option>

                                                
                                            </select>
                                        </div> -->
                                        <div class="mb-3">
                                            <div class="custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input" type="checkbox"
                                                        id="formCheck-1"><label class="form-check-label"
                                                        for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100"
                                            type="submit">Login</button>
                                        <!-- <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a>
                                        <hr> -->
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot
                                            Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an
                                            Account!</a></div>
                                </div>
                            </div>
                            <!-- <div style="margin:20px;"> -->
                            <div class="col-lg-7">
                                <div class="col-lg-11" style="margin: 0 0 0 0;">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-center align-items-center">
                                            <!-- <h6 class="text-primary fw-bold m-0">Short message</h6> -->
                                        </div>
                                        <div class="card-body" style="text-align:justify;">
                                            <p><br>
                                            <h1 class="text-center">About our service</h1><br>
                                            <strong><span style="color: rgb(0, 0, 0);">Animal Health Institute's
                                                    internal communication center
                                                </span>
                                            </strong>
                                            <span style="color: rgb(0, 0, 0);">&nbsp;
                                                This sections service provide an internal communication in Animal Health
                                                Institute.
                                                The service includes dailly information boared including different FORMS
                                                to request service and
                                                relevant links like eGP IFMIS and also SILABFA. To know more about our
                                                service; Please -
                                                visit our website <a href="https://ahi.gov.et">Animal Health
                                                    Institute</a> or one of our social media.
                                                <hr>
                                                <P>
                                                    <i class="fab fa-facebook-f fa-x" style="color: #3b5998;"></i>
                                                    &nbsp;&nbsp;

                                                    <!-- Twitter -->
                                                    <i class="fab fa-twitter fa-x"
                                                        style="color: #55acee;"></i>&nbsp;&nbsp;

                                                    <!-- Google -->
                                                    <a href="https://www.youtube.com/@AnimalHealthInstitute">
                                                        <i class="fab fa-youtube fa-x" style="color: #dd4b39;">

                                                        </i></a>&nbsp;&nbsp;

                                                    <!-- Linkedin -->
                                                    <i class="fab fa-linkedin-in" style="color: #0082ca;"></i>
                                                </P>
                                            </span><br><br></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/bs-init.js"></script>
    <script src="./assets/js/jstheme.js"></script>
</body>

</html>