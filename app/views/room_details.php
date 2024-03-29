<?php $this->view("header", $data); ?>

<!-- Room Page Slider -->
<?php if(isset($details)): ?>
    <header class="header slider">
            <div class="rooms-page owl-carousel owl-theme">
                <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
                <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= ROOT.$details->img_room?>"></div>
                <?php if(file_exists($details->img2_room)): ?>
                    <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= ROOT.$details->img2_room ?>"></div>
                <?php endif; ?>
                <?php if(file_exists($details->img3_room)): ?>
                    <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= ROOT.$details->img3_room ?>"></div>
                <?php endif; ?>
            </div>
            <!-- arrow down -->
            <div class="arrow bounce text-center">
                <a href="#" data-scroll-nav="1" class=""> <i class="fa-solid fa-arrow-down"></i> </a>
            </div>
        </header>
        <!-- Room Content -->
        <section class="rooms-page section-padding" data-scroll-index="1">
            <div class="container">
                <!-- project content -->
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="section-subtitle"><span>Logement</span></div>
                        <div class="section-title"><?= $details->name_room ?></div>
                    </div>
                    <div class="col-md-8">
                        <p class="mb-30"> <?= $details->description_room ?></p>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Instructions d'arrivée</h6>
                                <p>Les visiteurs recevront un email lors de la réservations contenant les instructions liées à leurs location. Pour plus de détails, veuillez <a href="<?=ROOT?>contact" style="font-weight:600;"> contacter le service client </a> avec vos informations de réservations.</p>
                            </div>
                            <div class="col-md-4">
                                <h6>Heure d'arrivée</h6>
                                <ul class="list-unstyled page-list mb-30">
                                    <li>
                                        <div class="page-list-icon"> <span class="fa-solid fa-hourglass-start"></span> </div>
                                        <div class="page-list-text">
                                            <p>À partir de <?=date("H\Hi",strtotime($details->hour_checkin))?></p>
                                        </div>
                                    </li>
                                </ul> 
                            </div>
                            <div class="col-md-4">
                                <h6>Heure de départ </h6>
                                <ul class="list-unstyled page-list mb-30">
                                    <li>
                                        <div class="page-list-icon"> <span class="fa-solid fa-hourglass-end"></span> </div>
                                        <div class="page-list-text">
                                            <p>Jusqu'à <?=date("H\Hi",strtotime($details->hour_checkout))?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h6>Date d'ouverture</h6>
                                <ul class="list-unstyled page-list mb-30">
                                    <li>
                                        <div class="page-list-icon"> <span class="fa-solid fa-calendar"></span> </div>
                                        <div class="page-list-text">
                                            <p>Du <?= fr_date($details->date_open)?> au <?= fr_date($details->date_close)?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <h6>Emplacement</h6>
                                <p><?= '<strong>'.$details->name_room.'</strong>, '.$details->address_room.' '.$details->zip_room.' '.$details->city_room?></p>
                                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?=$details->address_room.' '.$details->zip_room.' '.$details->city_room?>&output=embed"></iframe>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="butn-dark mt-15 mb-30"> <a href="<?=ROOT?>booking/<?= $details->slug?>"><span>Réserver maintenant</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <h6>Caractéristiques du logement</h6>
                        <ul class="list-unstyled page-list mb-30">
                            <li>
                                <div class="page-list-icon"><span><i class="<?= $details->icon_category?>"></i></span> </div>
                                <div class="page-list-text">
                                    <p><a href="<?=ROOT?>rooms/<?= $details->name_category?>"><?= $details->name_category?></a></p>
                                </div>
                            </li>  
                            <li>
                                <div class="page-list-icon"> <span><i class="fa-solid fa-people-group"></i></span> </div>
                                <div class="page-list-text">
                                    <?php
                                        if($details->persons > 1 ){
                                            echo '<p>1 - '.$details->persons. ' personnes</p>';
                                        }else{
                                            echo '<p>1 personne</p>';
                                        }
                                    ?>
                                </div>
                            </li>
                            <li>
                                <div class="page-list-icon"><span><i class="fa-solid fa-bed"></i></span> </div>
                                <div class="page-list-text">
                                    <p><?= $details->name_bedding?></p>
                                </div>
                            </li> 
                            <li>
                                <div class="page-list-icon"><span><i class="fa-solid fa-dog"></i></span> </div>
                                <div class="page-list-text">
                                    <p>Animaux <?= $details->name_animal?></p>
                                </div>
                            </li>  
                            <li>
                                <div class="page-list-icon"><span><i class="fa-solid fa-maximize"></i></span> </div>
                                <div class="page-list-text">
                                    <p><?= $details->area_room ?> m²</p>
                                </div>
                            </li>     
                            <li>
                                <div class="page-list-icon"><span><i class="fa-solid fa-money-bill"></i></span> </div>
                                <div class="page-list-text">
                                    <p><?= $details->price_room ?> € / nuits</p>
                                </div>
                            </li>            
                        </ul>
                        <h6>Options et services</h6>
                        <ul class="list-unstyled page-list mb-30">                   
                            <?php 
                                if(is_array($accom)){
                                    foreach($accom as $accomodation){
                                        echo '
                                            <li>
                                                <div class="page-list-icon"> <span><i class="'.$accomodation->icon_accomodation.'"></i></span></div>
                                                <div class="page-list-text">
                                                    <p>'.$accomodation->name_accomodation.'</p>
                                                </div>
                                            </li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Similiar Room -->
        <?php if(isset($similar_rooms) && !empty($similar_rooms)): ?>
            <section class="similar section-padding bg-black" style="padding: 20px 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-subtitle"><span>Logements</span></div>
                            <div class="section-title"><span>Similaire</span></div>
                            <p class="color-2">Nous vous proposons une liste d'hébergements similaires à votre recherche.</p>
                        </div>
                        <div class="col-md-8">
                            <div class="owl-carousel owl-theme">
                                <?php foreach($similar_rooms as $room): ?>
                                <div class="pricing-card">
                                    <img src="<?=ROOT.$room->img_room?>" alt="Logement" style="object-fit:cover;height:200px;">
                                    <div class="desc" style="padding:20px;text-align:center;">
                                        <div class="amount" style="text-align:center;"><?=$room->price_room?>€<span>/ nuits</span></div>
                                        <div class="name" style="height:50px;"><?=$room->name_room?></div>
                                        <div class="butn-dark mt-15" style="text-align:center;"> <a href="<?=ROOT?>room_details/<?=$room->slug?>"><span>Détails</span></a> </div>                                                                     
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        
<?php else: ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?=ROOT?>uploads/h1.jpg" style="background-position:bottom;">
        <div class="container">
            <div class="row">
				<div class="col-md-12 caption mt-90">
					<h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center;">Nos hébergements</h2>
                    <h5 style="text-align:center;"><span style="color:#cd701c;font-weight:600;">Insolite</span></h5>
				</div>
			</div>
        </div>
    </div>
    <section class="rooms-page section-padding" data-scroll-index="1">
            <div class="container">
                <!-- project content -->
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="section-subtitle">Singular</div>
                        <div class="section-title"><h5>Pas de détails disponibles pour cet hébergement.</h5>
                        </div>
                        <a href="<?=ROOT?>rooms">
                            <button class="btn-custom btn-primary-custom">Retour aux logements</button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>
<?php $this->view("footer", $data); ?>