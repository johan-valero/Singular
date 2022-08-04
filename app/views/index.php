<?php $this->view("header", $data); ?>
<?php $this->view("slider", $data); ?>

    <!-- Booking Search -->
    <div class="booking-wrapper">
            <div class="container">
                <div class="booking-inner clearfix">
                    <form action="rooms.html" class="form1 clearfix">
                        <div class="col1 c1">
                            <div class="input1_wrapper">
                                <label>Arrivée</label>
                                <div class="input1_inner">
                                    <input type="text" class="form-control input datepicker" placeholder="Arrivée">
                                </div>
                            </div>
                        </div>
                        <div class="col1 c2">
                            <div class="input1_wrapper">
                                <label>Départ</label>
                                <div class="input1_inner">
                                    <input type="text" class="form-control input datepicker" placeholder="Départ">
                                </div>
                            </div>
                        </div>
                        <div class="col2 c3">
                            <div class="select1_wrapper">
                                <label>Adultes</label>
                                <div class="select1_inner">
                                    <select class="select2 select" style="width: 100%">
                                        <option value="1">1 Adulte</option>
                                        <option value="2">2 Adultes</option>
                                        <option value="3">3 Adultes</option>
                                        <option value="4">4 Adultes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col2 c4">
                            <div class="select1_wrapper">
                                <label>Enfants</label>
                                <div class="select1_inner">
                                    <select class="select2 select" style="width: 100%">
                                        <option value="1">Enfant</option>
                                        <option value="1">1 Enfant</option>
                                        <option value="2">2 Enfants</option>
                                        <option value="3">3 Enfants</option>
                                        <option value="4">4 Enfants</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col2 c5">
                            <div class="select1_wrapper">
                                <label>Logements</label>
                                <div class="select1_inner">
                                    <select class="select2 select" style="width: 100%">
                                        <option value="1">1 Chambre</option>
                                        <option value="2">2 Chambres</option>
                                        <option value="3">3 Chambres</option>
                                        <option value="4">4 Chambres</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col3 c6">
                            <button type="submit" class="btn-form1-submit">Réserver</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <span>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                    </span>
                    <div class="section-subtitle">Singular</div>
                    <div class="section-title">Vivez une expérience hors du commun</div>
                    <p>
                        Nous sélectionnons pour vous des hébergements insolites partout en France !  Découvrez des endroits atypiques au cœur de nos belles régions françaises.
                        Singular vous garantit un séjour unique hors des sentiers battus ! Défiez le vertige dans une cabane à 12 mètres de hauteur, laissez-vous flotter sur une cabane au milieu d’un lac, observez les étoiles depuis votre lit dans une bulle ou expérimentez la vie de bohème dans une roulotte…
                        Réservez instantanément votre coup de cœur directement en ligne depuis smartphone, tablette ou ordinateur. Sélectionnez une date, un type d'hébergement, une thématique et offrez-vous la magie d’une nuit insolite ! 
                    </p>
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                    <img src="<?=ROOT?>uploads/c1.jpg" alt="" class="mt-90 mb-30" style="height:340px;object-fit:cover;">
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp" >
                    <img src="<?=ROOT?>uploads/c5.jpg" alt="" style="height:340px;object-fit:cover;">
                </div>
            </div>
        </div>
    </section>
    <!-- News -->
    <section class="news section-padding bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle"><span>Catégories</span></div>
                    <div class="section-title"><span>Types de logements</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <?php
                            foreach($categories as $category){
                                echo'
                                    <div class="item" style="text-align:center;">
                                        <div class="position-re o-hidden"> <img style="height:275px;object-fit:cover;" src="'.ROOT.$category->img_category.'" alt="">
                                            <div class="date" style="background-color:#fff;">
                                                <span><i style="color:#cd701c;">'.$category->id_category.'</i></span> 
                                            </div>
                                        </div>
                                        <div class="con"> <span class="category">
                                                <a style="font-size:10px;line-height:14px;" href="'.ROOT.'rooms/category/'.$category->name_category.'">'.$category->description_category.'</a>
                                            </span>
                                            <h5><a href="'.ROOT.'rooms/category/'.$category->name_category.'">'.$category->name_category.'</a></h5>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms -->
    <section class="rooms1 section-padding bg-cream" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Logements</div>
                    <div class="section-title">Nos derniers hébergements</div>
                </div>
            </div>
            <div class="row">
                <?php
                if($rooms){
                    foreach($rooms as $room){
                        echo'<div class="col-md-4">';
                        $this->view("rooms.inc", $room);
                        echo '</div>';
                    }
                }else{
                    echo '<div class="section-subtitle">Pas de logements disponibles.</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Promo Video -->
    <section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="<?=ROOT?>uploads/hobbit3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                        <div class="section-subtitle"><span>Singular</span></div>
                        <div class="section-title"><span>Vidéo promotionnelle</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center col-md-12">
                        <a class="vid" href="https://youtu.be/gbbLm5qgWU8">
                        <div class="vid-butn">
                            <span class="icon">
                                <i class="ti-control-play" style="line-height:0;"></i>
                            </span>
                        </div>
                    </a>
                    </div>

                </div>
            </div>
    </section>
    <!-- Facilties -->
    <section class="facilties section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Nos services</div>
                    <div class="section-title"> Équipements des établissements</div>
                </div>
            </div>
            <div class="row">
                <?php foreach($facilities as $facility){
                    echo '
                        <div class="col-md-4">
                            <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                                <span><i class="'.$facility->icon_accomodation.'"></i></span>
                                <h5>'.$facility->name_accomodation.'</h5>
                                <p>'.$facility->description_accomodation.'</p>
                                <div class="facility-shape"><span><i class="'.$facility->icon_accomodation.'"></i></span> </div>
                            </div>
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Services -->
    <section class="services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                    <div class="img left">
                        <a href="restaurant.html"><img src="<?=ASSETS?>img/restaurant/1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                    <div class="content">
                        <div class="cont text-left">
                            <div class="info">
                                <h6>Discover</h6>
                            </div>
                            <h4>The Restaurant</h4>
                            <p>Restaurant inilla duiman at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                            <div class="butn-dark"> <a href="restaurant.html"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 bg-cream p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                    <div class="content">
                        <div class="cont text-left">
                            <div class="info">
                                <h6>Experiences</h6>
                            </div>
                            <h4>Spa Center</h4>
                            <p>Spa center inilla duiman at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                            <div class="butn-dark"> <a href="spa-wellness.html"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                    <div class="img">
                        <a href="spa-wellness.html"><img src="<?=ASSETS?>img/spa/3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                    <div class="img left">
                        <a href="spa-wellness.html"><img src="<?=ASSETS?>img/spa/2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                    <div class="content">
                        <div class="cont text-left">
                            <div class="info">
                                <h6>Modern</h6>
                            </div>
                            <h4>Fitness Center</h4>
                            <p>Restaurant inilla duiman at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                            <div class="butn-dark"> <a href="spa-wellness.html"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 bg-cream p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                    <div class="content">
                        <div class="cont text-left">
                            <div class="info">
                                <h6>Experiences</h6>
                            </div>
                            <h4>The Health Club & Pool</h4>
                            <p>The health club & pool at elit finibus viverra nec a lacus themo the nesudea seneoice misuscipit non sagie the fermen ziverra tristiue duru the ivite dianne onen nivami acsestion augue artine.</p>
                            <div class="butn-dark"> <a href="spa-wellness.html"><span>Learn More</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                    <div class="img">
                        <a href="spa-wellness.html"><img src="<?=ASSETS?>img/spa/1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Reservation & Booking Form -->
    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="<?=ASSETS?>img/slider/2.jpg" data-overlay-dark="2">
            <div class="container">
                <div class="row">
                    <!-- Reservation -->
                    <div class="col-md-5 mb-30 mt-30">
                        <p><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></p>
                        <h5>Chacun de nos logements garantit une expérience hors du commun.</h5>
                        <div class="reservations mb-30">
                            <div class="icon color-1"><span style="color:#cd701c;" class="fa-solid fa-phone"></span></div>
                            <div class="text">
                                <p class="color-1">Réservation</p><a class="color-1" href="tel:855-100-4444">06 27 89 02 54</a>
                            </div>
                        </div>
                        <div class="reservations mb-30">
                            <div class="icon color-1"><span style="color:#cd701c;" class="fa-solid fa-envelope"></span></div>
                            <div class="text">
                                <p class="color-1">Réservation</p> <a class="color-1" href="">contact.singular.jv@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <!-- Booking From -->
                    <div class="col-md-5 offset-md-2">
                        <div class="booking-box">
                            <div class="head-box">
                                <h6>Logements et suites</h6>
                                <h4>Formulaire de réservation</h4>
                            </div>
                            <div class="booking-inner clearfix">
                                <form action="rooms2.html" class="form1 clearfix">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input1_wrapper">
                                                <label>Arrivée</label>
                                                <div class="input1_inner">
                                                    <input type="text" class="form-control input datepicker" placeholder="Arrivée">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input1_wrapper">
                                                <label>Départ</label>
                                                <div class="input1_inner">
                                                    <input type="text" class="form-control input datepicker" placeholder="Départ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Adultes</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Adultes</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Enfants</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Enfants</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn-form1-submit mt-15">Disponibilité</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients -->
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-7 owl-carousel owl-theme">
                    <div class="clients-logo">
                        <a href="#0"><img src="<?=ASSETS?>img/clients/1.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="<?=ASSETS?>img/clients/2.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="<?=ASSETS?>img/clients/3.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="<?=ASSETS?>img/clients/4.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="<?=ASSETS?>img/clients/5.png" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="<?=ASSETS?>img/clients/6.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->view("footer", $data); ?>