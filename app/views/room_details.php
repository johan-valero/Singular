<?php $this->view("header", $data); ?>
<!-- Room Page Slider -->
<?php if($details): ?>
    <header class="header slider">
            <div class="owl-carousel owl-theme">
                <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
                <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= ROOT.$details->img_room?>"></div>
                <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= ROOT.$details->img2_room ?>"></div>
                <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= ROOT.$details->img3_room ?>"></div>
            </div>
            <!-- arrow down -->
            <div class="arrow bounce text-center">
                <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
            </div>
        </header>
        <!-- Room Content -->
        <section class="rooms-page section-padding" data-scroll-index="1">
            <div class="container">
                <!-- project content -->
                <div class="row">
                    <div class="col-md-12"> 
                        <span>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                        </span>
                        <div class="section-subtitle">Singular</div>
                        <div class="section-title"><?= $details->name_room ?></div>
                    </div>
                    <div class="col-md-8">
                        <p class="mb-30"> <?= $details->description_room ?></p>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Instructions d'arrivée</h6>
                                <p>Les visiteurs recevront un email lors de la réservations contenant les instructions liées à leurs location. Pour plus de détails, veuillez contacter le service client avec vos informations de réservations.</p>
                            </div>
                            <div class="col-md-12">
                                <h6>Animaux</h6>
                                <?php 
                                    if($details->animals == "yes"){
                                        echo '<p>Animaux autorisés</p>';
                                    }else{
                                        echo '<p>Animaux non-autorisés</p>';
                                    }
                                ?>
                            </div>
                            <div class="col-md-12">
                                <div class="butn-dark mt-15 mb-30"> <a href="rooms2.html"><span>Réserver maintenant</span></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <h6>Options</h6>
                        <ul class="list-unstyled page-list mb-30">
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
                                <div class="page-list-icon"> <span><i class="fa-solid fa-bed"></i></span> </div>
                                <div class="page-list-text">
                                    <p><?= $details->name_bedding?></p>
                                </div>
                            </li>                    
                            <?php 
                                foreach($accom as $accomodation){
                                    echo '
                                        <li>
                                            <div class="page-list-icon"> <span><i class="'.$accomodation->icon_accomodation.'"></i></span></div>
                                            <div class="page-list-text">
                                                <p>'.$accomodation->name_accomodation.'</p>
                                            </div>
                                        </li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing -->
        <section class="pricing section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="section-subtitle"><span>Best Prices</span></div>
                        <div class="section-title">Extra Services</div>
                        <p>The best prices for your relaxing vacation. The utanislen quam nestibulum ac quame odion elementum sceisue the aucan.</p>
                        <p>Orci varius natoque penatibus et magnis disney parturient monte nascete ridiculus mus nellen etesque habitant morbine.</p>
                        <div class="reservations mb-30">
                            <div class="icon"><span class="flaticon-call"></span></div>
                            <div class="text">
                                <p>For information</p> <a href="tel:855-100-4444">855 100 4444</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="owl-carousel owl-theme">
                            <div class="pricing-card">
                                <img src="img/pricing/1.jpg" alt="">
                                <div class="desc">
                                    <div class="name">Room cleaning</div>
                                    <div class="amount">$50<span>/ month</span></div>
                                    <ul class="list-unstyled list">
                                        <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                        <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                        <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pricing-card">
                                <img src="img/pricing/2.jpg" alt="">
                                <div class="desc">
                                    <div class="name">Drinks included</div>
                                    <div class="amount">$30<span>/ daily</span></div>
                                    <ul class="list-unstyled list">
                                        <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                        <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                        <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pricing-card">
                                <img src="img/pricing/3.jpg" alt="">
                                <div class="desc">
                                    <div class="name">Room Breakfast</div>
                                    <div class="amount">$30<span>/ daily</span></div>
                                    <ul class="list-unstyled list">
                                        <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                        <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                        <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pricing-card">
                                <img src="img/pricing/4.jpg" alt="">
                                <div class="desc">
                                    <div class="name">Safe & Secure</div>
                                    <div class="amount">$15<span>/ daily</span></div>
                                    <ul class="list-unstyled list">
                                        <li><i class="ti-check"></i> Hotel ut nisan the duru</li>
                                        <li><i class="ti-check"></i> Orci miss natoque vasa ince</li>
                                        <li><i class="ti-close unavailable"></i>Clean sorem ipsum morbin</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endif; ?>
<?php $this->view("footer", $data); ?>