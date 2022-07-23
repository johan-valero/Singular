<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site de reservation de logement insolite">
    <meta name="keywords" content="Singular">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page_title ?> | <?= WEBSITE_TITLE ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=ASSETS?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=ASSETS?>css/style.css" type="text/css">
</head>
<body>
    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="<?=ASSETS?>img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Réserver</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="<?=ROOT?>home">Accueil</a></li>
                <li><a href="./rooms.html">Logements</a></li>
                <li><a href="./about-us.html">A propos</a></li>
                <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i>06 27 89 02 54</li>
                            <li><i class="fa fa-envelope"></i> <?= EMAIL_WEBSITE?></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="#" class="bk-btn">Réserver</a>
                            <div class="language-option">
                                <?php
                                    if (!isset($data['user_data'])){
                                        echo '
                                            <i class="fa fa-user"></i>
                                            <span> Compte <i class="fa fa-angle-down"></i></span>
                                            <div class="flag-dropdown">
                                                <ul>
                                                    <li><a href="'.ROOT.'signup">Inscription</a></li>
                                                    <li><a href="'.ROOT.'login">Connexion</a></li>
                                                </ul>
                                            </div>
                                            ';}
                                    else{
                                        echo '
                                        <i class="fa fa-user"></i>
                                        <span> '. ucwords($data["user_data"]->firstname)," ",ucwords($data["user_data"]->name).' <i class="fa fa-angle-down"></i></span>
                                        <div class="flag-dropdown">
                                            <ul>
                                                <li><a href="'.ROOT.'profil">Profil</a></li>
                                                <li><a href="'.ROOT.'logout">Déconnexion</a></li>
                                            </ul>
                                        </div>
                                        ';}       
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="<?=ROOT?>home">
                                <img style="margin-top:-25px;height:80px;" src="<?=ASSETS?>img/logo/logow.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="./index.html">Accueil</a></li>
                                    <li><a href="./rooms.html">Logements</a></li>
                                    <li><a href="./about-us.html">A propos</a></li>
                                    <li><a href="./blog.html">Blog</a></li>
                                    <li><a href="./contact.html">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->