<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site de reservation de logement insolite">
    <meta name="keywords" content="Singular">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Titre page -->
    <title><?= $page_title ?> | <?= WEBSITE_TITLE ?></title>

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/a1dea6f958.js" crossorigin="anonymous"></script>
    
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Gilda+Display&display=swap" rel="stylesheet"> 

    <!-- Cookie -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">

    <!-- Css Styles -->
    <link rel="shortcut icon" href="<?=ASSETS?>img/logo/icon_singular.png">
    <link rel="stylesheet" href="<?=ASSETS?>css/plugins.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/style.css">
</head>
<body>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <div class="logo-wrapper navbar-brand valign">
                <a href="<?=ROOT?>">
                    <div class="logo">
                        <img src="<?=ASSETS?>img/logo/logo.png" class="logo-img" alt="logo_singular">
                    </div>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><i class="fa-solid fa-bars"></i></span> </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="<?= $page_title == "Accueil" ? "nav-link active" : "nav-link";?>" href="<?=ROOT?>home"> Accueil </a></li>
                    <li class="nav-item"><a class="<?= $page_title == "À propos" ? "nav-link active" : "nav-link";?>" href="<?=ROOT?>about">À propos</a></li>
                    <li class="nav-item"><a class="<?= $page_title == "Logements" ? "nav-link active" : "nav-link";?>" href="<?=ROOT?>rooms">Logements</a></li>
                    <li class="nav-item"><a class="<?= $page_title == "Contact" ? "nav-link active" : "nav-link";?>" href="<?=ROOT?>contact">Contact</a></li>
                    <?php if(!isset($data['user_data'])): ?>
                        <li class="nav-item dropdown"> <span class="<?= $page_title == "Inscription" || $page_title == "Connexion" ? "nav-link active" : "nav-link";?>">Compte <i class="ti-angle-down"></i></span>
                            <ul class="dropdown-menu last">
                                <li class="dropdown-item"><a href="<?=ROOT?>signup">Inscription</a></li>
                                <li class="dropdown-item"><a href="<?=ROOT?>login">Connexion</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown"> <span class="<?= $page_title == "Profil" ? "nav-link active" : "nav-link";?>"><?= ucwords($data["user_data"]->firstname_user)," ",ucwords($data["user_data"]->name_user)?><i class="ti-angle-down"></i></span>
                            <ul class="dropdown-menu last">
                                <?php if(isset($data['user_data']) && $data['user_data']->rank_user == "admin" ): ?>
                                    <li class="dropdown-item"><a href="<?=ROOT?>admin">Admin</a></li>
                                    <li class="dropdown-item"><a href="<?=ROOT?>profil">Profil</a></li>
                                    <li class="dropdown-item"><a href="<?=ROOT?>logout">Déconnexion</a></li>
                                <?php else: ?>
                                    <li class="dropdown-item"><a href="<?=ROOT?>profil">Profil</a></li>
                                    <li class="dropdown-item"><a href="<?=ROOT?>logout">Déconnexion</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>						
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>