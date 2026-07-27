<?php
session_start();

?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AIC</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/KStyle.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary"> <!--make this NAV a fixed overlay-->
        <div class="container-fluid">
            <a class="navbar-brand" href="./pages/src/control.php" target="_blank">
                <img src="./assets/img/logo/final 5.png" width="30" height="30" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- this is the menu section -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">AHI-Portal
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarLevel1">
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal">ICT
                                    Maintenance</a>
                            </li>

                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cardModal">Mobile
                                    Card Request</a>
                            </li>

                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reform">Customer
                                    Satisfaction</a>
                            </li>

                            <li class="dropdown-submenu">
                                <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MoA e-Service</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarLevel2">
                                    <li>
                                        <a class="dropdown-item" href="https://moa-portal.et/reform/login.php"
                                            target="_blank">Institutional Reform
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="http://silabfa.et:9001/silabfa"
                                    target="_blank">SILABFA</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Digital Library
                        </a>
                        <ul class="dropdown-menu">

                            <!-- Different forms-->
                            <li class="dropdown-submenu">
                                <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Forms</a>

                                <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                                    <!-- Finance department forms -->
                                    <li class="dropdown-submenu">
                                        <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Finance</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                                            <li>
                                                <a class="dropdown-item" href="./material/Finance/አበል የቡድንመሪ(ዴስክ).pdf"
                                                    target="_blank">አበል የቡድንመሪ(ዴስክ)
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="./material/Finance/አበል የቡድን መሪ(ዴስክ) የሌለው.pdf"
                                                    target="_blank">አበል የቡድንመሪ(ዴስክ) የሌለው
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="./material/Finance/የመኪና እጥበትና የቅባቶች ማዘዣ.pdf"
                                                    target="_blank">የመኪና እጥበትና ቅባቶች ማዘዣ
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="./material/Finance/የዕቃና የአገልግሎት ወጪ ቅድሚያ መክፈያ ቅጽ ግዢ.pdf"
                                                    target="_blank">የዕቃና የአገልግሎት ወጪ
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="./material/Finance/በመስክ ላይ ለሚፈፀም ክፍያ የሚሞላ ቅጽ.pdf"
                                                    target="_blank">በመስክ ላይ ለሚፈፀም ክፍያ
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <!-- purchasing department forms -->
                                    <li class="dropdown-submenu">
                                        <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Purchase</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                                            <li>
                                                <a class="dropdown-item" href="./material/Purchase/form6.pdf"
                                                    target="_blank">የዕቃ ግዥ መጠየቂያ
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="./material/Purchase/form5.pdf"
                                                    target="_blank">የዕቃ ወጪ መጠየቂያ
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="./material/Purchase/form7.pdf"
                                                    target="_blank">የነዳጅ ማሰራጯ
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="./material/Purchase/form4.pdf"
                                                    target="_blank">የበር መውጫ
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="./material/Purchase/form1.pdf"
                                                    target="_blank">wage form
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown-submenu">
                                        <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Reform</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                                            <li>
                                                <a class="dropdown-item" href="./material/reform/የቅሬጻ ማቅረቢያ ቅፃቅፆች.pdf"
                                                    target="_blank">Complain
                                                    form</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="./material/Transport Request Form.pdf"
                                                    target="_blank">Transport request</a>
                                            </li>
                                        </ul>
                                    </li>


                                    <!-- <li class="dropdown-submenu">
                                        <a id="navbarLevel3" class="dropdown-item dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Parent3
                                            Chield4</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarLevel3">
                                            <li>
                                                <a class="dropdown-item" href="#">Parent3 Chield4 Grandchild1</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Parent3 Chield4 Grandchild2</a>
                                            </li>
                                        </ul> -->
                                </ul>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                    </li>
                    <!-- Documents to read-->
                    <li class="dropdown-submenu">
                        <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Institutional</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                            <li>
                                <a class="dropdown-item"
                                    href="./material/reform/AHI-citizen Charter final  for Print.pdf"
                                    target="_blank">Citizen
                                    Charter</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./material/reform/የቅሬታና አቤቱታ መመሪያ.pdf"
                                    target="_blank">Complain
                                    procedures</a>
                            </li>

                            <!-- the forth pop up arrow
                                            <li class="dropdown-submenu">
                                        <a id="navbarLevel3" class="dropdown-item dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parent3 Chield4</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarLevel3">
                                            <li>
                                                <a class="dropdown-item" href="#">Parent3 Chield4 Grandchild1</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Parent3 Chield4 Grandchild2</a>
                                            </li>
                                        </ul> -->
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Competancy &HR</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                            <li>
                                <a class="dropdown-item"
                                    href="./material/Competency and HR/የመንግሥት ሠራተኞች የድልድል አፈጻጻም መመሪያ 859-2014.pdf"
                                    target="_blank">CS
                                    Procedure
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./material/Competency and HR/የተሸከርካሪ አጠቃቀም መመሪያ (1).pdf"
                                    target="_blank">Transport
                                    procedures</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Strategic
                            Affairs</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                            <li>
                                <a class="dropdown-item" href="./material/strategic affair/budget deldel.pdf"
                                    target="_blank">2017 Anual budget
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="./material/strategic affair/photo_2025-05-25_05-43-38.jpg" target="_blank">AHI
                                    Organogram
                                    procedures</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- END new lines  -->
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">E-Service
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://egp.mofed.gov.et/registration/login"
                                target="_blank">eGP</a></li>
<<<<<<< Updated upstream
                        <li><a class="dropdown-item" href="#" target="_blank">ICMIS</a></li>
=======
                        <li><a class="dropdown-item" href="https://icsmiscscp.ecsc.gov.et/icsmiscsc/portal/Login.aspx" target="_blank">ICMIS</a></li>
>>>>>>> Stashed changes
                        <li><a class="dropdown-item" href="https://fms.ppa.gov.et/m/SignIn" target="_blank">eFleet</a>
                        </li>
                        <li><a class="dropdown-item" href="https://www.eservices.gov.et/en" target="_blank">eService</a></li>
                        <!--make this to open from mozila firefox-->

                        <li><a class="dropdown-item" href="#" target="_blank">IFMIS</a></li>

                    </ul>
                </li>

                <li>
                    <?php if (isset($_SESSION['response'])) { ?>
                        <div class="alert alert-<?= $_SESSION['types']; ?> alert-dismissible">
                            <b class="text-center">
                                <?= $_SESSION['response']; ?>
                            </b>
                        <?php }
                    unset($_SESSION['response']); ?>
                    </div>
                </li>
                </ul>

                <form method="POST" action="./assets/fn/subscription.php" class="d-flex">
                    <input class="form-control me-2" type="text" name="fmail" placeholder="Full Name" required />
                    <input class="form-control me-2" type="email" name="email" placeholder="email" aria-label="email"
                        required />
                    <button class="btn btn-outline-danger" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </nav>
    <section class="p-3 text-center text-sm-start">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-label="Slide 1" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                    aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6"
                    aria-label="Slide 7"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7"
                    aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8"
                    aria-label="Slide 9"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9"
                    aria-label="Slide 10"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="10"
                    aria-label="Slide 11"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="11"
                    aria-label="Slide 12"></button>
            </div>
            <div class="carousel-inner">
                <!--  carousel 1-->
                <div class="carousel-item active" data-bs-interval="30000">
                    <div class="row">
                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <!-- <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px"> -->
                                        <!-- <div> -->
                                            <img class="rounded img-fluid alig-center fit-cover"
<<<<<<< Updated upstream
                                                src="./assets/img/banner/for portal.jpg">
=======
                                                src="./assets/img/banner/needcollector 2019.jpg">
>>>>>>> Stashed changes
                                            
                                        <!-- </div> -->

                                    <!-- </div> -->
<<<<<<< Updated upstream
=======
                        
>>>>>>> Stashed changes
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- carousel 2-->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <a href="https://www.eservices.gov.et/en">
                                        <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/eservice.jpg">  </a>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- carousel 3-->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
<<<<<<< Updated upstream

                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <a href="">
                                        <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/icmis.jpg">  </a>                                  
=======
                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <a href="https://icsmiscscp.ecsc.gov.et/icsmiscsc/Portal/Login.aspx">
                                        <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/icmis.jpg">  </a>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- carousel 4-->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <div class="container py-4 py-xl-5">
                            <div class="row gy-4 gy-md-0">
                                <div class=" d-md-flex align-items-md-center" style="height: 450px">
                                    <div class="card">
                                        <a href="https://pms.moa.gov.et/login">
                                            <img class="img-fluid"
                                                src="./assets/img/banner/MoA planning and performance.jpg">
                                        </a>
                                    </div>
>>>>>>> Stashed changes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<<<<<<< Updated upstream
                <!-- third carousel -->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <div class="container py-4 py-xl-5">
                            <div class="row gy-4 gy-md-0">
                                <div class=" d-md-flex align-items-md-center" style="height: 450px">
                                    <div class="card">
                                        <a href="https://pms.moa.gov.et/login">
                                            <img class="img-fluid"
                                                src="./assets/img/banner/MoA planning and performance.jpg">
                                        </a>
=======
                <!--  carousel 1-->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <!-- <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px"> -->
                                        <!-- <div> -->
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/for portal.jpg">
                                            
                                        <!-- </div> -->

                                    <!-- </div> -->
                        
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- carousel 5-->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <!-- message with image only -->
                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">
                                    <!-- <div class="col-md-8 d-md-flex align-items-md-center"> -->
                                        <div style="max-width: 100%;">
                                            <div style="text-align:center;">
                                                <h1 style="margin:10px">እንኳን ወደ እንስሳት ጤና ኢንስቲትዩት <br>የውስጥ መገናኛ ዘዴ በሰላም
                                                    መጡ!</h1>
                                            </div>
                                            <h4 style="text-align:center; margin:5%">በዚህ መረጃ መስጫ ገጽ፡ ከመረጃ መለዋወጥ ባሻገር
                                                የተለያዩ አገልግሎት መጠየቂያ
                                                ፎርሞችን፡ የመንግስትን ዲጂታል አሰራር ለውጥ ተከትሎ በተቋማችን የተተገበሩትን ሲስተም ማስፈንጠሪያዎችና፡ ግልፅ
                                                አሰራርን ለማስፈን የሚረዱ የተለያዩ መተዳደሪያ ደንቦችንና ህጎችን ከዲጂታል ላይብረሪ ማግኘት ይችላሉ፡፡</h4>
                                            <h4 style="text-align:center;">ለበለጠ ንባብ በሚከተሉት ማህበራዊ ሚዲያ ይከታተሉን</h4>
                                            <br>
                                            <hr>
                                        </div>
                                    <!-- </div> -->
                                    <div style="text-align:center;">
                                        <a href="https://web.facebook.com/MoANAHDIC">
                                            <i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i>
                                        </a> &nbsp;&nbsp;
                                        <!-- Twitter -->
                                        <a href="https://https://x.com/MoA_NAHDIC">
                                            <i class="fab fa-twitter fa-2x" style="color: #55acee;"></i>&nbsp;&nbsp;
                                        </a>

                                        <!-- Google -->
                                        <a href="https://www.youtube.com/@AnimalHealthInstitute">
                                            <i class="fab fa-youtube fa-2x" style="color: #dd4b39;"></i>
                                        </a>&nbsp;&nbsp;

                                        <!-- Linkedin -->
                                        <i class="fab fa-linkedin-in fa-2x" style="color: #0082ca;"></i>&nbsp;&nbsp;

                                        <!-- telegram -->
                                        <i class="fab fa-telegram fa-2x" style="color: #0082ca;"></i>
>>>>>>> Stashed changes
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <!-- carousel 6-->
                 <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <a href="https://fms.ppa.gov.et/m/SignIn">
                                        <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/e-fleet.jpg">  </a>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- carousel 7-->

                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
<<<<<<< Updated upstream
                        <!-- message with image only -->
=======
                        <div class="container py-4 py-xl-5">
                            <div class="row gy-4 gy-md-0">
                                <div class=" d-md-flex align-items-md-center" style="height: 450px">
                                    <div class="card">
                                        <a href="https://moa-portal.et/reform/login.php">
                                            <img class="img-fluid" src="./assets/img/banner/MoA reform2.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- carousel 8-->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <a href="https://feaccears.gov.et/EARS">
                                        <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/asset registration.jpg">  </a>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  carousel 1-->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-3 py-xl-4">
                                <div class="row gy-4 gy-md-0">
                                    <!-- <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px"> -->
                                        <!-- <div> -->
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/for portal.jpg">
                                            
                                        <!-- </div> -->

                                    <!-- </div> -->
                        
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- carousel 9-->
                <div class="carousel-item">
                    <div class="row">
>>>>>>> Stashed changes
                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">
<<<<<<< Updated upstream
                                    <!-- <div class="col-md-8 d-md-flex align-items-md-center"> -->
                                        <div style="max-width: 100%;">
                                            <div style="text-align:center;">
                                                <h1 style="margin:10px">እንኳን ወደ እንስሳት ጤና ኢንስቲትዩት <br>የውስጥ መገናኛ ዘዴ በሰላም
                                                    መጡ!</h1>
                                            </div>
                                            <h4 style="text-align:center; margin:5%">በዚህ መረጃ መስጫ ገጽ፡ ከመረጃ መለዋወጥ ባሻገር
                                                የተለያዩ አገልግሎት መጠየቂያ
                                                ፎርሞችን፡ የመንግስትን ዲጂታል አሰራር ለውጥ ተከትሎ በተቋማችን የተተገበሩትን ሲስተም ማስፈንጠሪያዎችና፡ ግልፅ
                                                አሰራርን ለማስፈን የሚረዱ የተለያዩ መተዳደሪያ ደንቦችንና ህጎችን ከዲጂታል ላይብረሪ ማግኘት ይችላሉ፡፡</h4>
                                            <h4 style="text-align:center;">ለበለጠ ንባብ በሚከተሉት ማህበራዊ ሚዲያ ይከታተሉን</h4>
                                            <br>
                                            <hr>
                                        </div>
                                    <!-- </div> -->
                                    <div style="text-align:center;">
                                        <a href="https://web.facebook.com/MoANAHDIC">
                                            <i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i>
                                        </a> &nbsp;&nbsp;
                                        <!-- Twitter -->
                                        <a href="https://https://x.com/MoA_NAHDIC">
                                            <i class="fab fa-twitter fa-2x" style="color: #55acee;"></i>&nbsp;&nbsp;
                                        </a>

                                        <!-- Google -->
                                        <a href="https://www.youtube.com/@AnimalHealthInstitute">
                                            <i class="fab fa-youtube fa-2x" style="color: #dd4b39;"></i>
                                        </a>&nbsp;&nbsp;

                                        <!-- Linkedin -->
                                        <i class="fab fa-linkedin-in fa-2x" style="color: #0082ca;"></i>&nbsp;&nbsp;

                                        <!-- telegram -->
                                        <i class="fab fa-telegram fa-2x" style="color: #0082ca;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fifth carousel -->

                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <div class="container py-4 py-xl-5">
                            <div class="row gy-4 gy-md-0">
                                <div class=" d-md-flex align-items-md-center" style="height: 450px">
                                    <div class="card">
                                        <a href="https://moa-portal.et/reform/login.php">
                                            <img class="img-fluid" src="./assets/img/banner/MoA reform2.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- six carousel -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">
                                    <div class="col-md-8 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -40px;">
                                                Greening the Grounds: How tree planting makes AHI's compound
                                                more
                                                stimulating!
=======
                                    <div class="col-md-4 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -40px;">
                                            Research and Innovation Week <br>
>>>>>>> Stashed changes
                                            </h2>
                                            <h5>Theme: Advancing Animal  Health Through Research and Innovation</h5>
                                            <hr>
                                            <p class="align-justify" style="align-content: justify;">
<<<<<<< Updated upstream
                                                In the heart of Ethiopia, a few kilometer from the downtown,
                                                Animal
                                                Health Institute. is taking a significant step towards
                                                environmental
                                                stewardship and campus beautification. Beyond the research and
                                                diagnosing from the labs, a quiet revolution is taking root,
                                                quite
                                                literally, as the institute embraces a robust tree-planting
                                                initiative
                                                aimed at transforming its grounds into a greener, more
                                                sustainable
                                                oasis.
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="#">Read
=======
                                                Day 1: Review of the progress of research activities conducted in 2018 E.C. Thursday, June 04, 2026 [ግንቦት 27/2018ዓ.ም]
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="./assets/img/banner/Day_1_Schedule.pdf" target="_blank">Read
>>>>>>> Stashed changes
                                                More</a>
                                            <a class="btn btn-outline-warning btn-lg" role="button"
                                                href="./assets/img/banner/Day_2_Schedule.pdf" target="_blank">pdf</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-md-flex align-items-md-center" style="height: 450px">
                                        <div>
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/day 1 schedules.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
<<<<<<< Updated upstream
=======

                <!-- carousel 10-->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">
                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">
                                    <div class="col-md-4 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -40px;">
                                            Research and Innovation Week <br>
                                            </h2>
                                            <h5>Theme: Advancing Animal  Health Through Research and Innovation</h5>
                                            <hr>
                                            <p class="align-justify" style="align-content: justify;">
                                                Day 2: Review of the progress of research activities conducted in 2018 E.C. Thursday, June 04, 2026 [ግንቦት 27/2018ዓ.ም]
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="./assets/img/banner/Day_1_Schedule.pdf" target="_blank">Read
                                                More</a>
                                            <a class="btn btn-outline-warning btn-lg" role="button"
                                                href="./assets/img/banner/Day_2_Schedule.pdf" target="_blank">pdf</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-md-flex align-items-md-center" style="height: 450px">
                                        <div>
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./assets/img/banner/day 2 schedules.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
>>>>>>> Stashed changes
            </div>
            <!-- Previous and Next button -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- here is the ICT maintenance form -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header
                        <div class="modal-header">
                            <h4 class="modal-title">ICT Maintenance Form</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div> -->
                <!-- ICT Modal body -->
                <div class="modal-body">
                    <form method="POST" action="./assets/fn/ictmaintenance.php">
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <input name="fname" type="text" class="form-control" id="fname"
                                    placeholder="Requested by" required>
                            </div>
                            <div class="col-sm-4">
                                <input name="requesteddate" type="date" class="form-control" id="requesteddate"
                                    placeholder="Date" required>
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <!-- <div class="col-sm-6">
                                <input name="type" type="text" class="form-control" id="type"
                                    placeholder="Service type" required>
                            </div> -->
                            <div class="col-sm-6">
                                <select class="form-select" name="type" type="text" class="form-control" id="type"
                                    placeholder="Service type" required>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Networking">Networking</option>
                                    <option value="system suport">System suport</option>
                                    <option value="eGP suport">eGP suport</option>
                                    <option value="e-service suport">eservice suport</option>
                                    <option value="IFMIS suport">IFMIS suport</option>
                                    <option value="ICMIS suport">ICMIS suport</option>
                                    <option value="SILABFA suport">SILAB system</option>
                                    <option value="Other Service">Other service</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                               
                                <input name="phone" type="text" class="form-control" id="phone"
                                    placeholder="phone No.">
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <div class="col-sm-12">

                                <label for="exampleFormControlTextarea1" class="form-label">Specify the problem
                                    in less than 100 words</label>
                                <textarea name="problem" class="form-control" id="problem" rows="3" required></textarea>
                            </div>
                        </div><br>

                        <!-- here is the button area -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Request</button>
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- here is the begining of CARD form -->
    <!-- <div class="modal" id="cardModal">
        <div class="modal-dialog">
            <div class="modal-content">
               
                <div class="modal-body">
                    <form method="POST" action="./assets/fn/cardrequesition.php">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <h2>Mobile CARD requesion form</h2>
                            </div>
                            <hr>  
                        </div><br>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input name="eid" type="text" class="form-control" id="eid" placeholder="Employee ID"
                                    >
                            </div>
                            <div class="col-sm-8">
                                <input name="fullName" type="text" class="form-control" id="fullName"
                                    placeholder="* Requested by" required>
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input name="rDate" type="date" class="form-control" id="rDate" placeholder="* Request Date"
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <input name="month" type="text" class="form-control" id="month" placeholder="* No of Months" 
                                    required>
                            </div>
                            
                        </div><br>

                        <div class="form-group row">
                            
                            <div class="col-sm-6">
                                <input name="ramount" type="text" class="form-control" id="ramount"
                                    placeholder="* Requested Amount" required>
                            </div>

                            <div class="col-sm-6">
                                <input name="allowed" type="text" class="form-control" id="allowed"
                                    placeholder="* Total allowed" required>
                            </div>
                        </div><br>
                        <br>

                        <!-- here is the button area 
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">CARD Request</button>
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- here is the end of CARD form  -->

    <!-- ends of the ict maintenance modal form -->

    <!-- here is the Reform survailance form -->
    <div class="modal" id="reform">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <form method="POST" action="./assets/fn/survailance.php">
                        <div class="form-group text-center color-primary">
                            <h4>Customer Satisfaction evaluation form</h4>
                            <hr><br>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <input name="dname" type="text" class="form-control" id="dname"
                                    placeholder="Department Name">
                            </div>
                            <div class="col-sm-4">
                                <input name="edate" type="date" class="form-control" id="edate" placeholder="Date">
                            </div>
                        </div><br>


                        <div class="form-group row">
                            <div class="col-sm-7 text-center">
                                <p>Description</p>
                            </div>
                            <div class="col-sm-3">
                                <p>Low High</p>
                            </div>
                            <hr>

                            <div class="col-sm-7">
                                <p>Your Satisfaction level</p>
                            </div>

                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="opt1" value="1"> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt1" value="2"> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt1" value="3"> 3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt1" value="4"> 4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt1" value="5"> 5
                                </label>
                            </div>
                            <div class="col-sm-7">
                                <p>Service Clarity</p>
                            </div>

                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="opt2" value="1"> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt2" value="2"> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt2" value="3"> 3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt2" value="4"> 4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt2" value="5"> 5
                                </label>
                            </div>
                            <div class="col-sm-7">
                                <p>Service time delivery</p>
                            </div>

                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="opt3" value="1"> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt3" value="2"> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt3" value="3"> 3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt3" value="4"> 4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt3" value="5"> 5
                                </label>
                            </div>
                            <div class="col-sm-7">
                                <p>Personel behaviour</p>
                            </div>

                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="opt4" value="1"> 1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt4" value="2"> 2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt4" value="3"> 3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt4" value="4"> 4
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opt4" value="5"> 5
                                </label>
                            </div>

                        </div><br>
                        <div class="form-group row">
                            <div class="col-sm-12">

                                <label for="exampleFormControlTextarea1" class="form-label">Any other comments or
                                    sugesions!
                                    in less than 100 words</label>
                                <textarea name="coments" class="form-control" id="coments" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- here is the button area -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success">Evaluet</button>
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ends of the reform servailance modal form -->
</body>
<script src="./assets/bootstrap/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    // integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js">
    // integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script src="./assets/bootstrap/js/script.js"></script>

</html>