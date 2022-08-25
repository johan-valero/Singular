<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <div class="logo">
            <a href="<?=ROOT?>" class="simple-text logo-normal" style="text-align:center;">
                <img src="<?=ASSETS?>img/logo/logo_admin_dark.png" style="width:80%;">
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li <?=(isset($current_page) && $current_page == "Tableau de bord") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin">
                    <i class="fa fa-dashboard"></i>
                    <p>Tableau de bord</p>
                    </a>
                </li>
                <li <?=(isset($current_page) && $current_page == "Logements") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin/rooms">
                    <i class="fa-solid fa-hotel"></i>
                    <p>Logements</p>
                    </a>
                </li>
                <li <?=(isset($current_page) && $current_page == "Catégories") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin/categories">
                    <i class="fa-solid fa-dungeon"></i>
                    <p>Catégories</p>
                    </a>
                </li>
                <li <?=(isset($current_page) && $current_page == "Litteries") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin/beddings">
                    <i class="fa-solid fa-bed"></i>
                    <p>Litteries</p>
                    </a>
                </li>
                <li <?=(isset($current_page) && $current_page == "Aménagements") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin/accomodations">
                    <i class="fa-solid fa-water-ladder"></i>
                    <p>Aménagements</p>
                    </a>
                </li>
                <li <?=(isset($current_page) && $current_page == "Réservations") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin/bookings">
                    <i class="fa-solid fa-book"></i>
                    <p>Réservations</p>
                    </a>
                </li>
                <li <?=(isset($current_page) && $current_page == "Messages") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin/messages">
                    <i class="fa-solid fa-message"></i>
                    <p>Messages</p>
                    </a>
                </li>
                <li <?=(isset($current_page) && ($current_page == "Partenaires" || $current_page == "Carousel" || $current_page == "Réseaux")) ? ' class="active" ' : ""; ?>>
                    <a data-toggle="collapse" href="#settings">
                        <i class="fa-solid fa-gear"></i>
                        <p>Paramètres <b class="caret"></b></p>
                    </a>
                    <div class="collapse " id="settings">
                        <ul class="nav">
                            <li>
                                <a href="<?=ROOT?>admin/sliders">
                                    <span class="sidebar-normal">Carousel</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=ROOT?>admin/socials">
                                    <span class="sidebar-normal">Réseaux sociaux</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=ROOT?>admin/partners">
                                    <span class="sidebar-normal">Partenaires</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li <?=(isset($current_page) && $current_page == "Clients") ? ' class="active" ' : ""; ?>>
                    <a href="<?=ROOT?>admin/clients">
                    <i class="fa-solid fa-users"></i>
                    <p>Clients</p>
                    </a>
                </li>
            </ul>
        </div>
        </div>
        <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                </div>
                <a class="navbar-brand" href="<?=ROOT?>admin"><i class="fa fa-dashboard"></i> <?= $current_page ?></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="now-ui-icons location_world"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Générales</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?=ROOT?>">Site Web</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Compte</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?=ROOT?>profil">Profil</a>
                            <a class="dropdown-item" href="<?=ROOT?>profil?edit">Paramètres du compte</a>
                            <a class="dropdown-item" href="<?=ROOT?>logout">Déconnexion</a>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- End Navbar -->