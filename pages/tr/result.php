<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHI Training Survey System</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Header and Navigation -->
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/logo/final 5.png" alt="Avatar Logo" style="width:50px;"
                        class="rounded-pill">
                    <!-- <h1>AHI</h1> -->
                </a>
            </div>
            <div class="btn-group">
                <a href="https://ahi.gov.et">
                    <button type="button" class="btn btn-primary">Website</button></a>
                <!-- <button type="button" class="btn btn-primary">AHI </button> -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">About
                        Us</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">About AHI</a></li>
                        <li><a class="dropdown-item" href="#">About Program</a></li>
                        <li><a class="dropdown-item" href="#">About Developer</a></li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <!-- <ul class="navbar-nav me-auto">
                        
                    </ul> -->
                    <form class="d-flex">
                        <input class="form-control me-2" type="email" placeholder="E-mail">
                        <button class="btn btn-danger" type="button">Subscribe</button>
                    </form>
                </div>
            </div>

        </nav>
    </header>
    <div class="container mt-3">
        <h2>Thank you for finishing the quesion</h2>
        <p>Based on your responce the following table generated your result:</p>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th width="10%">#</th>
                    <th width="60%">Quesions</th>
                    <th width="10%">Answer</th>
                    <th width="10%">Yours</th>
                    <th width="10%">Result</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                
            </tbody>
        </table>
    </div>

        <!-- here is the script for bootstrap -->
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>