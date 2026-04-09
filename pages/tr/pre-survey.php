<?php
session_start();

?>
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
<!-- <style>
    /* Basic Reset and Typography */
    :root {
        --primary-color: #0056b3;
        --secondary-color: #f4f4f4;
        --dark-color: #333;
        --light-color: #fff;
        --accent-color: #28a745;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        line-height: 1.6;
        color: var(--dark-color);
        background-color: var(--light-color);
    }

    .container {
        max-width: 1100px;
        margin: auto;
        overflow: hidden;
        padding: 0 2rem;
    }

    h1,
    h2,
    h3 {
        margin-bottom: 1rem;
        font-weight: 600;
    }

    a {
        text-decoration: none;
        color: var(--primary-color);
    }

    ul {
        list-style: none;
    }

    /* Header and Navigation */
    header {
        background: var(--primary-color);
        color: var(--light-color);
        padding: 1rem 0;
    }

    header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header .logo {
        font-size: 1.8rem;


        display: flex;

    }

    .logo img {
        margin-right: 15px;
        /* border-radius: 2px solid #f4f4f4; */
    }

    header nav ul {
        display: flex;
    }

    header nav ul li {
        margin-left: 1.5rem;
    }

    header nav ul li a {
        color: var(--light-color);
        font-weight: 400;
        transition: color 0.3s ease;
    }

    header nav ul li a:hover {
        color: var(--secondary-color);
    }

    /* Hero Section */
    .hero {
        background: var(--primary-color);
        color: var(--light-color);
        text-align: center;
        padding: 6rem 0 4rem;

    }

    .hero h1 {
        font-size: 3rem;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .cta-button {
        display: inline-block;
        padding: 1rem 2rem;
        border-radius: 5px;
        font-weight: 600;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .cta-button.primary {
        background: var(--accent-color);
        color: var(--light-color);
    }

    .cta-button.primary:hover {
        background: #218838;
    }

    .cta-button.secondary {
        background: var(--light-color);
        color: var(--primary-color);
        border: 2px solid var(--light-color);
    }

    .cta-button.secondary.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Section Styling */
    .section {
        padding: 4rem 0;
    }

    .section h2 {
        text-align: center;
        margin-bottom: 3rem;
        font-size: 2.5rem;
    }

    .section.dark {
        background: var(--secondary-color);
    }

    .about-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        text-align: center;
    }

    .about-item {
        background: var(--light-color);
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Form Styling */
    form {
        max-width: 600px;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    form input,
    form textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
    }

    form button {
        cursor: pointer;
    }

    /* Footer */
    footer {
        background: var(--dark-color);
        color: var(--light-color);
        text-align: center;
        padding: 1.5rem 0;
    }

    /* Media Queries for Responsiveness */
    @media(max-width: 768px) {
        header .container {
            flex-direction: column;
        }

        header nav {
            margin-top: 1rem;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .about-grid {
            grid-template-columns: 1fr;
        }
    }
</style> -->

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
                    <form method="POST" action="./subscription.php" class="d-flex">
                        <input class="form-control me-3" type="text" name="name" placeholder="Full Name">
                        <input class="form-control me-3" type="email" name="email" placeholder="E-mail">
                        <button class="btn btn-danger" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>

        </nav>
        <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-<?= $_SESSION['types']; ?> alert-dismissible">
                <b class="text-center">
                    <?= $_SESSION['response']; ?>
                </b>
            <?php }
        unset($_SESSION['response']); ?>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="hero">
        <div>
            <!-- <p> here it </p> -->
        </div>
        <div class="container">
            <h1 style="text-align:center;">Welcome to Animal Health Institute TMS</h1>
            <h3 style="text-align:center;">Please answer the following quesion before training</h3>
            <div class="d-flex">

            </div>
        </div>

    </main>

    <div class="container">
        <!-- <h1>Quesion 1/10 </h1> -->
        <form action="./action.php">
            <table class="table">

                <tbody>
                    <tr>
                    <td><input class="form-control " type="text" name="uid" placeholder="uid" >
                        <td>
                            <input class="form-control " type="email" name="email" placeholder="E-mail" >
                        </td>
                        <td>
                            <input class="form-control " type="number" name="tele" placeholder="Telephone no" >
                        </td>
                        </td>
                    </tr>
                    <!-- First quesion -->
                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.1 How many UN hazard classes/categories are
                                    there?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt1" id="q11" value="A">
                                    <label class="form-check-label" for="q11">A. 5</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt1" id="q12" value="B">
                                    <label class="form-check-label" for="q12">B. 10</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt1" id="q13" value="C">
                                    <label class="form-check-label" for="q13">C. 9</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt1" id="q14" value="D">
                                    <label class="form-check-label" for="q14">D. 8</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt1" id="q15" value="E">
                                    <label class="form-check-label" for="q15">E. 6</label>
                                </div>
                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q1</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- Second quesion -->
                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.2 What does the dangerous goods classification under
                                    division 6.2
                                    address?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt2" id="q21" value="A">
                                    <label class="form-check-label" for="q21">A. Medical or clinical waste </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt2" id="q22" value="B">
                                    <label class="form-check-label" for="q22">B. Exempt specimen </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt2" id="q23" value="C">
                                    <label class="form-check-label" for="q23">C. Category A infectious substances
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt2" id="q24" value="D">
                                    <label class="form-check-label" for="q24">D. Category B biological substances
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt2" id="q25" value="E">
                                    <label class="form-check-label" for="q25">E. All except </label>
                                </div>


                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q2</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <!-- thir quesion  -->

                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.3 What is the UN number for Category A infectious
                                    substances?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt3" id="q31" value="A">
                                    <label class="form-check-label" for="q31">A. UN2814</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt3" id="q32" value="B">
                                    <label class="form-check-label" for="q32">B. UN 2900</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt3" id="q33" value="C">
                                    <label class="form-check-label" for="q33">C. 3373</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="opt3" id="q34" value="D">
                                    <label class="form-check-label" for="q34">D. UN1845</label>
                                </div>

                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q3</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <!-- forth quesion  -->
                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.4 Exempt substances don’t have UN number but have proper
                                    shipping name ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q41" name="opt4" value="A">
                                    <label class="form-check-label" for="q41">A. True </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q42" name="opt4" value="B">
                                    <label class="form-check-label" for="q42">B. False </label>
                                </div>

                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q4</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- fifth quesion  -->

                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.5 What is the proper shipping name for Category A infectious
                                    substances?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q51" name="opt5" value="A">
                                    <label class="form-check-label" for="q51">A. Infectious substances affecting humans
                                        only </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q52" name="opt5" value="B">
                                    <label class="form-check-label" for="q52">B. Infectious substances affecting animals
                                        only </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q53" name="opt5" value="C">
                                    <label class="form-check-label" for="q53">C. Infectious substances affecting humans
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q54" name="opt5" value="D">
                                    <label class="form-check-label" for="q54">D. B and C
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q55" name="opt5" value="E">
                                    <label class="form-check-label" for="q55">E. None </label>
                                </div>


                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q5</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- senario sectio -->

                    <tr>
                        <td></td>
                        <td>
                            <h2 style="text-align:center;">Senerio1: Mr Abraham collected swabs samples from cattle
                                affected with Anthrax and wants
                                to send to AHI for characterization: </h2>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- sixth quesion  -->
                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.6 Based on scenario 1, what do you say about the
                                    categorization for this specimen?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q61" name="opt6" value="A">
                                    <label class="form-check-label" for="q61">A. Category A </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q62" name="opt6" value="B">
                                    <label class="form-check-label" for="q62">B. Category B </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q63" name="opt6" value="C">
                                    <label class="form-check-label" for="q63">C. Exempt specimen
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q65" name="opt6" value="D">
                                    <label class="form-check-label" for="q64">D. A and B
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q1" name="opt6" value="E">
                                    <label class="form-check-label" for="q65">E. None </label>
                                </div>


                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q6</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- seventh quesion  -->

                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.7 Based on scenario 1, what is the UN number of this
                                    specimen ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q71" name="opt7" value="A">
                                    <label class="form-check-label" for="q71">A. UN 2814 </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q72" name="opt7" value="B">
                                    <label class="form-check-label" for="q72">B. UN 2900 </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q73" name="opt7" value="C">
                                    <label class="form-check-label" for="q73">C. 3373
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q74" name="opt7" value="D">
                                    <label class="form-check-label" for="q74">D. UN1845
                                    </label>
                                </div>

                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q7</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- eight quesion  -->
                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.8 Based on scenario 1, What is the proper shipping name of
                                    this specimen?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q81" name="opt8" value="A">
                                    <label class="form-check-label" for="q81">A. Infectious substances affecting humans
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q82" name="opt8" value="B">
                                    <label class="form-check-label" for="q82">B. Infectious substances affecting animals
                                        only </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q83" name="opt8" value="C">
                                    <label class="form-check-label" for="q83">C. Biological substances category
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q84" name="opt8" value="D">
                                    <label class="form-check-label" for="q84">D. All
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q85" name="opt8" value="E">
                                    <label class="form-check-label" for="q85">E. None </label>
                                </div>


                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q8</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- ninth quesion  -->
                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.9 Based on scenario1, What is the packaging instruction for
                                    this specimen?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q91" name="opt9" value="1">
                                    <label class="form-check-label" for="q91">A. PI620 </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q92" name="opt9" value="2">
                                    <label class="form-check-label" for="q92">B. PI650 </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q93" name="opt9" value="3">
                                    <label class="form-check-label" for="q93">C. All
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q94" name="opt9" value="4">
                                    <label class="form-check-label" for="q94">D. None
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q9</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                    <!-- tenth quesion  -->
                    <tr>
                        <td></td>
                        <td>
                            <div class="mb-3">
                                <label class="form-label">Q.10 One of the following is not shipper’s
                                    responsibility.</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q101" name="opt10" value="A">
                                    <label class="form-check-label" for="q101">A. Classifying infectious substances
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q102" name="opt10" value="B">
                                    <label class="form-check-label" for="q102">B. Identifying Proper Shipping Name and
                                        UN Number </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q103" name="opt10" value="C">
                                    <label class="form-check-label" for="q103">C. Packaging infectious substances
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q104" name="opt10" value="D">
                                    <label class="form-check-label" for="q104">D. Marking and labeling packages
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="q105" name="opt10" value="E">
                                    <label class="form-check-label" for="q105">E. None </label>
                                </div>
                            </div>

                        </td>
                        <td><button type="submit" class="btn btn-primary" disabled>Q10</button></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>




        <!-- here is the script for bootstrap -->
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>