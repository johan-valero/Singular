<?php $this->view("header", $data); ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="<?=ROOT?>uploads/mountain2.jpg" style="background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center">Mot de passe oublié</h2>
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
                            <h3>Réinitialisation du mot de passe</h3>
							<p class="mb-0">Veuillez indiquez l'adresse email correspondant à votre compte et votre nouveaux mot de passe.</p>
							<p class="mb-0">(*) Champs obligatoires.</p>
							<span style="color:#cd701c;"><?php check_error() ?></span>
							<form method="POST">
							<div class="form-group first">
								<label for="email">Email <span style="color:#CD701C;">*</span></label>
								<input type="email" class="form-control" placeholder="Votre-email@gmail.com" name="email" required>
							</div>
							<div class="form-group last mb-3">
								<label for="password">Mot de passe <span style="color:#CD701C;">*</span></label>
								<input type="password" class="form-control" placeholder="Votre nouveau mot de passe"  name="password" required>
								<input type="password" class="form-control" placeholder="Vérifier votre mot de passe"  name="password2" required>
							</div>
							<input type="submit" value="Envoyer" class="btn btn-block btn-form1-submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $this->view("footer", $data); ?>