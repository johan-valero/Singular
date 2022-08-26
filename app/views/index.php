<?php $this->view("header", $data); ?>
<?php $this->view("slider", $data); ?>

    <!-- Booking Search -->
    <?php if(isset($sliders)&& is_array($sliders)):?>
        <div class="booking-wrapper">
            <div class="container">
                <div class="booking-inner clearfix">
                    <form action="<?=ROOT."rooms"?>" class="form1 clearfix" method="GET">
                        <div class="col1 c1">
                            <div class="input1_wrapper">
                                <label>Arrivée</label>
                                <div class="input1_inner">
                                    <input type="date" class="form-control input" placeholder="Arrivée" name="checkin">
                                </div>
                            </div>
                        </div>
                        <div class="col1 c2">
                            <div class="input1_wrapper">
                                <label>Départ</label>
                                <div class="input1_inner">
                                    <input type="date" class="form-control" placeholder="départ" name="checkout">
                                </div>
                            </div>
                        </div>
                        <div class="col2 c3">
                            <div class="select1_wrapper">
                                <label>Nombre de personnes <span style="color:#CD701C;">*</span></label>
                                <div class="select1_inner">
                                    <select class="select2 select" style="width: 100%" name="persons">
                                        <?php for ($i = 0; $i <= 10; $i++): ?>
                                            <option value=<?=$i?> <?= isset($_POST['persons']) && $_POST['persons'] == $i ? 'selected = "selected"' : "" ;?> ><?=$i > 1 ? $i. ' personnes' : $i. ' personne' ?></option>
                                        }
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col2 c4">
                            <div class="select1_wrapper">
                                <label>Logements</label>
                                <div class="select1_inner">
                                    <select class="select2 select" style="width: 100%" name="category">
                                    <option>-- Catégorie --</option>
                                    <?php foreach($categories as $category):?>
                                        <option value="<?=$category->id_category?>" <?= isset($_GET['categories']) && $_GET['categories'] == $category->id_category ? 'selected = "selected"' : "" ;?> ><?=$category->name_category?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col3 c5">
                            <button type="submit" class="btn-form1-submit">Réserver</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <div class="section-subtitle"><span>Singular</span></div>
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
    <!-- Catégories -->
    <?php if(isset($categories) && is_array($categories)): ?>
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
                                            <div class="position-re o-hidden"> <img style="height:275px;object-fit:cover;" src="'.ROOT.$category->img_category.'" alt="Imga catégorie">
                                            </div>
                                            <div class="con"> <span class="category">
                                                    <a style="font-size:10px;line-height:14px;" href="'.ROOT.'rooms/category/'.$category->name_category.'">'.$category->description_category.'</a>
                                                </span>
                                                <h5><a href="'.ROOT.'rooms/'.$category->name_category.'"><i class="'.$category->icon_category.'" style="color:#cd701c;margin-right:10px;"></i>'. $category->name_category.'</a></h5>
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
    <?php endif; ?>
    <!-- Rooms -->
    <?php if(isset($rooms) && is_array($rooms)): ?>
        <section class="rooms1 section-padding bg-cream" data-scroll-index="1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-subtitle"><span>Logements</span></div>
                        <div class="section-title">Nos derniers hébergements</div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        foreach($rooms as $room){
                            echo'<div class="col-md-4">';
                            $this->view("rooms.inc", $room);
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Promo Video -->
    <?php if(isset($youtube)): ?>
        <section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="<?=ROOT?>uploads/hobbit3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 text-center">
                            <div class="section-subtitle"><span style="color:#cd701c;">Singular</span></div>
                            <div class="section-title"><span>Vidéo promotionnelle</span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center col-md-12">
                            <a class="vid" href="<?= $youtube->value ?>">
                            <div class="vid-butn">
                                <span class="icon">
                                    <i class="fa-brands fa-youtube" style="line-height:2.5;"></i>
                                </span>
                            </div>
                        </a>
                        </div>

                    </div>
                </div>
        </section>
    <?php endif; ?>
    <!-- Facilities -->
    <?php if(isset($facilities) && is_array($facilities)): ?>
        <section class="pricing section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-subtitle"><span>Nos services</span></div>
                        <div class="section-title"> Équipements des établissements</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            <?php foreach($facilities as $facility):?>
                                <div class="item" style="text-align:center;">
                                    <div class="position-re o-hidden">
                                        <div class="facilties">
                                            <div class="col-md-12">
                                                <div class="single-facility" style="height:200px;">
                                                    <span><i class="<?=$facility->icon_accomodation?>"></i></span>
                                                    <h5><?= $facility->name_accomodation?></h5>
                                                    <p><?= $facility->description_accomodation?></p>
                                                    <div class="facility-shape"><span><i class="<?= $facility->icon_accomodation?>"></i></span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Partenaires -->
    <?php if(isset($partners) && is_array($partners)):?>
        <section class="clients" style="background-color:#f8f5f0;padding:100px;">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-subtitle"><span>Partenariat </span></div>
                            <div class="section-title"> Tous nos partenaires</div>
                        </div>
                    </div>
                    <div class="col-md-12 owl-carousel owl-theme">
                        <?php foreach($partners as $partner): ?>
                            <div class="clients-logo" style="text-align:center;">
                                <a href="<?=$partner->link_partner?>"><img src="<?=$partner->img_partner?>" alt="" style="width:100%;height:80px;object-fit:contain;"><p style="text-align:center;"><?=$partner->name_partner?></p></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $this->view("footer", $data); ?>