<?php $this->view("header", $data); ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="<?=ROOT?>uploads/mountain2.jpg" style="background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center">Connexion</h2>
                    <h5 style="text-align:center;">À <span style="color:#cd701c;">Singular</span></h5>
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
                            <h3>Formulaire de connexion</h3>
							<p class="mb-0">Connectez vous pour accéder à vos réservations et aux fonctionnalités du site.</p>
							<p class="mb-0">(*) Champs obligatoires.</p>
							<span style="color:#cd701c;"><?php check_error() ?></span>
							<form method="POST">
							<div class="form-group first">
								<label for="email">Email <span style="color:#CD701C;">*</span></label>
								<input type="email" class="form-control" placeholder="Votre-email@gmail.com" value="<?= isset($_POST['email']) ?$_POST['email']: ""; ?>" name="email" required>
							</div>
							<div class="form-group last mb-3">
								<label for="password">Mot de passe <span style="color:#CD701C;">*</span></label>
								<input type="password" class="form-control" placeholder="Votre mot de passe"  name="password" required>
							</div>
							
							<div class="d-flex mb-4 align-items-center">
								<span class="ml-left"><a href="<?=ROOT?>signup" class="forgot-pass">Pas encore de compte ?</a></span> 
								</label>
								<span class="ml-auto"><a href="<?=ROOT?>forget" class="forgot-pass">Mot de passe oublié</a></span> 
							</div>
							<input type="submit" value="Connexion" class="btn btn-block btn-form1-submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $this->view("footer", $data); ?>