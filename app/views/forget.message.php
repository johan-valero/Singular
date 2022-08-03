<?php $this->view("header", $data); ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="<?=ROOT?>uploads/mountain2.jpg" style="background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center">Changement de mot de passe</h2>
                    <h5 style="text-align:center;"><span style="color:#cd701c;">Singular</span></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- login -->
    <section>
		<div class="d-lg-flex half">
			<div class="contents order-4 order-md-2">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-7" style="background-color:#fff;padding:25px;border-radius:10px;">
                            <h4 style="text-align:center;">Votre mot de passe à bien était modifié.</h4>
                            <p style="text-align:center;">Vous recevrez sous peu un email confirmant votre modification de mot de passe.</p>
                            <div style="display:flex;justify-content:center;padding:5px;">
                                <a class="col-md-4" href="<?=ROOT?>" style="text-decoration:none;">
                                    <button type="button" class="btn-form1-submit">Accueil</button>
                                </a>
                                <a class="col-md-4" href="<?=ROOT?>login" style="text-decoration:none;">
                                    <button type="button" class="btn-form1-submit">Connexion</button>
                                </a>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $this->view("footer", $data); ?>