<?php
$status = $_SESSION['login_user'];
$name = $_SESSION['fullName'];
if($status!="user")
{
    header("location: ./../../assets/fn/logout.php");
}
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AIC</title>
    <link rel="stylesheet" href="./../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="./../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="./../../assets/bootstrap/css/KStyle.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary"> <!--make this NAV a fixed overlay-->
        <div class="container-fluid">
            <a class="navbar-brand" href="./pages/src/control.php" target="_blank">
                <img src="./../../assets/img/logo/final 5.png" width="30" height="30" class="d-inline-block align-text-top">
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
                            aria-expanded="false">Forms
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarLevel1">
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal">ICT
                                    Maintenance</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="./material/Transport Request Form.pdf"
                                    target="_blank">Transport
                                    request</a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li class="dropdown-submenu">
                                <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reform</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                                    <li>
                                        <a class="dropdown-item" href="./material/reform/የቅሬጻ ማቅረቢያ ቅፃቅፆች.pdf"
                                            target="_blank">Complain
                                            form</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#reform">Customer Satisfaction</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Finance</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarLevel2">

                                    <li>
                                        <a class="dropdown-item" href="./material/Finance/አበል የቡድንመሪ(ዴስክ).pdf"
                                            target="_blank">አበል የቡድንመሪ(ዴስክ)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./material/Finance/አበል የቡድን መሪ(ዴስክ) የሌለው.pdf"
                                            target="_blank">አበል የቡድንመሪ(ዴስክ) የሌለው
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./material/Finance/የመኪና እጥበትና የቅባቶች ማዘዣ.pdf"
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
                                        <a class="dropdown-item" href="./material/Finance/በመስክ ላይ ለሚፈፀም ክፍያ የሚሞላ ቅጽ.pdf"
                                            target="_blank">በመስክ ላይ ለሚፈፀም ክፍያ
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- purchasing department forms -->
                            <li class="dropdown-submenu">
                                <a id="navbarLevel2" class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Purchase</a>
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

                            <!-- <li class="dropdown-submenu">
                            <a id="navbarLevel3" class="dropdown-item dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parent3 Chield4</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarLevel3">
                                <li>
                                    <a class="dropdown-item" href="#">Parent3 Chield4 Grandchild1</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Parent3 Chield4 Grandchild2</a>
                                </li>
                            </ul>
                        </li> -->
                        </ul>
                    </li>
                    <!-- END -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Digital Library
                        </a>
                        <ul class="dropdown-menu">

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

                            <!-- Begins here HR Executive-->

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
                                        <a class="dropdown-item"
                                            href="./material/Competency and HR/የተሸከርካሪ አጠቃቀም መመሪያ (1).pdf"
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
                                            href="./material/strategic affair/photo_2025-05-25_05-43-38.jpg"
                                            target="_blank">AHI
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
                            aria-expanded="false">System
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="http://egp.mofed.gov.et/registration/login"
                                    target="_blank">eGP</a></li>
                            <li><a class="dropdown-item" href="#" target="_blank">IFMIS</a></li>
                            <!--make this to open from mozila firefox-->
                            <li><a class="dropdown-item" href="#" target="_blank">ICMIS</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="http://172.27.60.6:9001/silabfa/"
                                    target="_blank">SILABFA</a></li>
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

                <form method="POST" action="./../../assets/fn/subscription.php" class="d-flex">
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
                    aria-current="true" aria-label="Slide 1"></button>
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
                    aria-label="Slide 7"></button>
            </div>
            <div class="carousel-inner">
                <!--  zero carousel -->
                <div class="carousel-item active" data-bs-interval="30000">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">

                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">
                                    <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px">
                                        <div>
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./../../assets/img/pic 06.JPG">
                                            <div
                                                style="text-align:center; background-color: rgba(226, 150, 8, 0.5); text-decoration: none;">
                                                Share our News & updates:
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=172.27.10.19/ahi/assets/uploads/የሪፎርም%20ዕቅድ%20አፈጻጸም%20ግምገማ.pdf"
                                                    target="_blank" rel="noopener">
                                                    <i class="fab fa-facebook-f fa-x"
                                                        style="color: #3b5998; padding-right:10px; text-decoration: none;"></i>
                                                </a>
                                                <!-- Twitter -->
                                                <a href="https://https://x.com/MoA_NAHDIC">
                                                    <i class="fab fa-twitter fa-x"
                                                        style="color: #55acee;padding-right:10px; text-decoration: none;"></i>
                                                </a>

                                                <!-- Google -->
                                                <a href="https://www.youtube.com/@AnimalHealthInstitute">
                                                    <i class="fab fa-youtube fa-x"
                                                        style="color: #dd4b39;padding-right:10px;text-decoration: none;"></i>
                                                </a>

                                                <!-- Linkedin -->
                                                <i class="fab fa-linkedin-in fa-x"
                                                    style="color: #0082ca;padding-right:10px;text-decoration: none;"></i>

                                                <!-- telegram -->
                                                <i class="fab fa-telegram fa-x"
                                                    style="color: #0082ca;padding-right:10px;text-decoration: none;"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -50px;">
                                                የዓለም አቀፉ የእንስሳት ጤና ድርጅት (WOAH) አፈጻጸም (PVS) የክትትልና
                                                ግምገማ ባለሙያዎች ቡድን ጉብኝት
                                            </h2>
                                            <p>ሰኔ 11 ቀን 2017 </p>
                                            <hr>
                                            <p class="align-justify" style="align-content: justify;">
                                                <b>በዓለም አቀፉ የእንስሳት ጤና ድርጅት (WOAH) አፈጻጸም (PVS) የክትትልና ግምገማ ባለሙያዎች ቡድን
                                                    በእንስሳት ጤና ኢንስቲትዩት በመገኘት አጠቃላይ የእንስሳት ጤና ላይ በሚደረገው የናሙና አወሳሰድ፣
                                                    የላብራቶሪ መሳሪያዎች ጥራትና ትክክለኛነት እና የእንስሳት ጤና አገልግሎት አፈጻጸም ለማየት ከግብርና
                                                    ሚኒስቴር የዘርፉ አመራሮች
                                                    ከእንስሳት ጤና ኢንስቲትዩት ተመራማሪዎች እና ከፍተኛ አመራሮች ጋር ውይይት አድርገዋል፡፡
                                                </b>
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="#">ሙሉውን ለማንበብ</a>
                                            <a class="btn btn-outline-warning btn-lg" role="button"
                                                href="./../../assets/uploads/የዓለም አቀፉ የእንስሳት ጤና ድርጅት.pdf">pdf ያውርዱ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- First carousel -->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">

                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">
                                    <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px">
                                        <div>
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./../../assets/img/pic 06.JPG">
                                            <div
                                                style="text-align:center; background-color: rgba(226, 150, 8, 0.5); text-decoration: none;">
                                                Share our News & updates:
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=172.27.10.19/ahi/assets/uploads/የሪፎርም%20ዕቅድ%20አፈጻጸም%20ግምገማ.pdf"
                                                    target="_blank" rel="noopener">
                                                    <i class="fab fa-facebook-f fa-x"
                                                        style="color: #3b5998; padding-right:10px; text-decoration: none;"></i>
                                                </a>
                                                <!-- Twitter -->
                                                <a href="https://https://x.com/MoA_NAHDIC">
                                                    <i class="fab fa-twitter fa-x"
                                                        style="color: #55acee;padding-right:10px; text-decoration: none;"></i>
                                                </a>

                                                <!-- Google -->
                                                <a href="https://www.youtube.com/@AnimalHealthInstitute">
                                                    <i class="fab fa-youtube fa-x"
                                                        style="color: #dd4b39;padding-right:10px;text-decoration: none;"></i>
                                                </a>

                                                <!-- Linkedin -->
                                                <i class="fab fa-linkedin-in fa-x"
                                                    style="color: #0082ca;padding-right:10px;text-decoration: none;"></i>

                                                <!-- telegram -->
                                                <i class="fab fa-telegram fa-x"
                                                    style="color: #0082ca;padding-right:10px;text-decoration: none;"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -50px;">
                                                የግብርና ሚኒስቴር እና ተጠሪ ተቋማት የሪፎርም እና
                                                ታስክ ፎርስ በለውጥ ስራ ሂደት ያለበትን ደረጃ ጎበኙ
                                            </h2>
                                            <p>ግንቦት 19 ቀን 2017</p>
                                            <hr>
                                            <p class="align-justify" style="align-content: justify;">
                                                <b>የግብርና ሚኒስቴር እና ተጠሪ ተቋማት የሪፎርም እና ታስክ ፎርስ: ተቋማችን ያለበትን ደረጃ
                                                    ለመገምገም በእንስሳት ጤና ኢንስቲትዩት ገምግሟል።
                                                    የሚኒስቴር መ/ቤቱ ተጠሪ ተቋማትና የሲቪል ሰርቪስ ኮሚሽን
                                                    በተገኙበት የእንስሳት ጤና ኢንስቲትዩት ም/ዋና ዳይሬክተር ዶ/ር ኃ/ማርያም ከፍያለው
                                                    የእንኳን ደህና መጣችሁ መልዕክት አስተላልፏል።
                                                </b>
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="#">ሙሉውን ለማንበብ</a>
                                            <a class="btn btn-outline-warning btn-lg" role="button"
                                                href="./../../assets/uploads/የሪፎርም ዕቅድ አፈጻጸም ግምገማ.pdf">ሙሉውን ያውርዱ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Second carousel -->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">

                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">
                                    <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px">
                                        <div>
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./../../assets/img/pic 04.JPG">
                                            <div
                                                style="text-align:center; background-color: rgba(226, 150, 8, 0.5); text-decoration: none;">
                                                Share our News & updates:
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=172.27.10.19/ahi/assets/uploads/የሪፎርም%20ዕቅድ%20አፈጻጸም%20ግምገማ.pdf"
                                                    target="_blank" rel="noopener">
                                                    <i class="fab fa-facebook-f fa-x"
                                                        style="color: #3b5998; padding-right:10px; text-decoration: none;"></i>
                                                </a>
                                                <!-- Twitter -->
                                                <a href="https://https://x.com/MoA_NAHDIC">
                                                    <i class="fab fa-twitter fa-x"
                                                        style="color: #55acee;padding-right:10px; text-decoration: none;"></i>
                                                </a>

                                                <!-- Google -->
                                                <a href="https://www.youtube.com/@AnimalHealthInstitute">
                                                    <i class="fab fa-youtube fa-x"
                                                        style="color: #dd4b39;padding-right:10px;text-decoration: none;"></i>
                                                </a>

                                                <!-- Linkedin -->
                                                <i class="fab fa-linkedin-in fa-x"
                                                    style="color: #0082ca;padding-right:10px;text-decoration: none;"></i>

                                                <!-- telegram -->
                                                <i class="fab fa-telegram fa-x"
                                                    style="color: #0082ca;padding-right:10px;text-decoration: none;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -50px;">
                                                ከአፋር ፣ ትግራይና አማራ ክልል ለመጡ የላብራቶሪ ሙያተኞች ከህዳር 30 እስከ ታህሳስ 05 2017 በእንስሳት ጤና
                                                ኢንስቲትዩት ስልጠና ተሰጠ!
                                            </h2>
                                            <hr>
                                            <p class="align-justify" style="align-content: justify;">
                                                <b>የእንስሳት ጤና ኢንስቲትዩት ከተባበሩተ መንግስታት የአለም ምግብና እርሻ ድርጅት (FAO) ጋር በመቀናጀት
                                                    ለክልል እንስሳት ጤና ላብራቶሪ ባለሙያዎች እንድሁም ከመቐለ እና ከጎንደር ዩኒቨርሲቲ ለመጡ የዘርፉ
                                                    ባለሙያዎች ስልጠና ከህዳር 30 እስከ ታህሳስ 05/2017 ሰበታ በሚገኘው የእ.ጤ.ኢ. ላቦራቶሪ ተሰጠ፡፡
                                                </b>
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="#">ሙሉውን ለማንበብ</a>
                                            <a class="btn btn-outline-warning btn-lg" role="button"
                                                href="./../../assets/uploads/አፋር፣ትግራይ፣አማራ_ክልሎች_የተሰጠ_ስልጠና.pdf">ሙሉውን ያውርዱ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- third carousel -->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <!-- message with image only -->

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img class="img-fluid" src="./../../assets/uploads/7.jpg">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img class="img-fluid" src="./../../assets/uploads/6.jpg">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img class="img-fluid" src="./../../assets/uploads/08.jpg">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Forth carousel -->
                <div class="carousel-item" data-bs-interval="30000">
                    <div class="row">
                        <!-- message with image only -->

                        <div class="col-md-8 mb-3"
                            style="background-color: rgba(255, 255, 255, 0.7); align-content: center;color:rgb(2, 30, 81);">
                            <div style="text-align:center;">
                                <h1 style="margin:10px">እንኳን ወደ እንስሳት ጤና ኢንስቲትዩት <br>የውስጥ መገናኛ ዘዴ በሰላም መጡ!</h1>
                            </div>
                            <h4 style="text-align:center; margin:5%">በዚህ መረጃ መስጫ ገጽ፡ ከመረጃ መለዋወጥ ባሻገር የተለያዩ አገልግሎት መጠየቂያ
                                ፎርሞችን፡ የመንግስትን ዲጂታል አሰራር ለውጥ ተከትሎ በተቋማችን የተተገበሩትን ሲስተም ማስፈንጠሪያዎችና፡ ግልፅ
                                አሰራርን ለማስፈን የሚረዱ የተለያዩ መተዳደሪያ ደንቦችንና ህጎችን ከዲጂታል ላይብረሪ ማግኘት ይችላሉ፡፡</h4>
                            <h4 style="text-align:center;">ለበለጠ ንባብ በሚከተሉት ማህበራዊ ሚዲያ ይከታተሉን</h4>
                            <br>
                            <hr>

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

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img class="img-fluid" src="./../../assets/uploads/05.jpg">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fifth carousel -->
                <div class="carousel-item" data-bs-title="Animal Health Institute" data-bs-interval="10000">
                    <div class="row">
                        <!-- message with image only -->
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img class="img-fluid" src="./../../assets/uploads/06.jpg">
                            </div>
                        </div>
                        <div class="col-md-8 mb-3"
                            style="background-color: rgba(255, 255, 255, 0.7); align-content: center;color:rgb(2, 30, 81);">
                            <video controls width="96%">
                                <source src="./../../assets/uploads/seg_eng.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>

                <!-- Fifth carousel -->
                <div class="carousel-item">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">

                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">

                                    <div class="col-md-8 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -40px;">
                                                Greening the Grounds: How tree planting makes AHI's compound more
                                                stimulating!
                                            </h2>
                                            <hr>
                                            <p class="align-justify" style="align-content: justify;">
                                                In the heart of Ethiopia, a few kilometer from the downtown, Animal
                                                Health Institute. is taking a significant step towards environmental
                                                stewardship and campus beautification. Beyond the research and
                                                diagnosing from the labs, a quiet revolution is taking root, quite
                                                literally, as the institute embraces a robust tree-planting initiative
                                                aimed at transforming its grounds into a greener, more sustainable
                                                oasis.
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="#">Read More</a>
                                            <a class="btn btn-outline-warning btn-lg" role="button"
                                                href="./../../assets/uploads/Greening the GroundsNEWS.pdf">pdf</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px">
                                        <div>
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./../../assets/img/pic03.JPG">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Six carousel -->
                <div class="carousel-item">
                    <div class="row">

                        <div class="col-md-12 mb-6"
                            style="background-color: rgba(52, 94, 140, 0.7); align-content: justify; color:azure;">

                            <div class="container py-4 py-xl-5">
                                <div class="row gy-4 gy-md-0">

                                    <div class="col-md-8 d-md-flex align-items-md-center">
                                        <div style="max-width: 100%;">
                                            <h2 class="text-uppercase fw-bold" style="margin-right: -40px;">
                                                የጥንቃቄ መልእክት
                                            </h2>
                                            <hr>
                                            <p class="align-justify" style="align-content: justify;">
                                            <div>
                                                የዝንጀሮ ፈንጣጣ በሽታ ሽፍታ ወይም ቁስሎች (ፖክስ)፣ አንዳንዴም በጉንፋን መሰል በሽታን ጨምሮ ሊያሳምም የሚችል
                                                በሽታ ነው።
                                                የሚተላለፍበትም መንገድ፡ ቫይረሱ ወደ ማንኛውም ሰው በመቀራረብ፣ በግል ወይም በቆዳ-ለቆዳ ንክኪ ሊሰራጭ ይችላል
                                                ከዚህም በተጨማሪም፡
                                            </div>
                                            <div>
                                                የዝንጀሮ ፈንጣጣ በሽታ መከላከያ ዘዴዎች
                                                <ul>
                                                    <li>የአካል ንክኪ መቀነስ</li>
                                                    <li>በጋራ የሚጠቀሟቸው እቃዎች ካሉ አለመጠቀም፣</li>
                                                    <li>የአፍና የአፍንጫ ማስክ መጠቀም፣</li>
                                                    <li>የግብረ ሥጋ ግንኙነት አለማድረግ፣ </li>
                                                    <li>ሰልባጅ ጨርቆች ሲገበያዩ ራሳቸውን መጠበቅ እንዳለባቸው አሳስበዋል፣</li>
                                                </ul>

                                            </div>
                                            </p>
                                            <br>
                                            <a class="btn btn-warning btn-lg" role="button" href="#">Read More</a>
                                            <a class="btn btn-outline-warning btn-lg" role="button" href="">pdf</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-md-flex align-items-md-center" style="height: 450px">
                                        <div>
                                            <img class="rounded img-fluid alig-center fit-cover"
                                                src="./../../assets/img/pic 09.jpeg">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

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
                    <form method="POST" action="./../../assets/fn/ictmaintenance.php">
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

                                    <option value="maintenance">Maintenance</option>
                                    <option value="networking">Networking</option>
                                    <option value="system suport">System suport</option>
                                    <option selected>Other service</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <input name="serial" type="text" class="form-control" id="serial"
                                    placeholder="Serial No.">
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
    <!-- ends of the ict maintenance modal form -->

    <!-- here is the Reform survailance form -->
    <div class="modal" id="reform">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header
                        <div class="modal-header">
                            <h4 class="modal-title">ICT Maintenance Form</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div> -->
                <!-- Reform Survailance -->
                <div class="modal-body">
                    <form method="POST" action="./../../assets/fn/survailance.php">
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
<script src="./../../assets/bootstrap/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    // integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js">
    // integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script src="./../../assets/bootstrap/js/script.js"></script>

</html>