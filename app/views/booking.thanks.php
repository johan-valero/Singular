<?php $this->view("header", $data); ?>
    <section>
        <!-- <div class="container"> -->
            <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" style="background-color:#222;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left caption mt-90">
                            <h5>Singular</h5>
                            <h1>Réservation</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align:center;margin: 200px 0px 200px 0px;">
                <h5>Merci pour votre réservation.</h5>
                <h8>Vous recevrez un email sous 48h avec tous les détails de votre séjour.</h8>
                <div style="text-align:center;"><br>
                    <a style="padding:15px;" class="btn-primary-custom" href="<?=ROOT?>">
                        Accueil
                    </a>
                    <a style="padding:15px;" class="btn-primary-custom" href="<?=ROOT?>profil">
                        Voir vos réservations
                    </a>
                </div>
            </div>
        <!-- </div> -->
    </section>
<?php $this->view("footer", $data); ?>