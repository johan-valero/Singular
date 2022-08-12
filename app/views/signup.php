<?php $this->view("header", $data); ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="<?=ASSETS?>img/pages/mountain1.jpg" style="background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center">Inscription</h2>
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
					<div class="row align-items-center justify-content-center" style="padding:40px 0px 40px 0px; ">
						<div class="col-md-7" style="background-color:#fff;padding:25px;border-radius:10px;">
                            <h3>Formulaire d'inscription</h3>
							<p class="mb-0">Veuillez remplir les champs avec vos informations pour vous inscrire. Les champs marqués d'un (<span style="color:#cd701c;">*</span>) sont obligatoires.</p>
							<span style="color:#cd701c;"><?php check_error() ?></span>
							<form method="POST">
								<div class="row">
									<div class="col-md-6">
										<label for="name">Nom <span style="color:#CD701C;">*</span></label>
										<input type="text" class="form-control" placeholder="Nom" name="name" value="<?= isset($_POST['name']) ?$_POST['name']: ""; ?>" required>
									</div>
									<div class="col-md-6">
										<label for="firstname">Prénom <span style="color:#CD701C;">*</span></label>
										<input type="text" class="form-control" placeholder="Prénom" name="firstname" value="<?= isset($_POST['firstname']) ?$_POST['firstname']: ""; ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label for="email">Adresse email <span style="color:#CD701C;">*</span></label>
										<input type="email" class="form-control" placeholder="Votre-email@gmail.com" name="email" value="<?= isset($_POST['email']) ?$_POST['email']: ""; ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="phone">Téléphone <span style="color:#CD701C;">*</span></label>
										<input type="phone" class="form-control" placeholder="Téléphone" name="phone" value="<?= isset($_POST['phone']) ?$_POST['phone']: ""; ?>" required>
									</div>
									<div class="col-md-6">
										<label for="phone">Date de naissance <span style="color:#CD701C;">*</span></label>
										<input type="date" class="form-control" name="birthday" value="<?= isset($_POST['birthday']) ?$_POST['birthday']: ""; ?>" required>
									</div>
								</div>
								<div class="form-group last mb-3">
									<label for="password">Mot de passe <span style="color:#CD701C;">*</span></label>
									<input type="password" class="form-control" placeholder="Votre mot de passe"  name="password" required>
									<input type="password" class="form-control" placeholder="Vérifier votre mot de passe"  name="password2" required>
								</div>
								<div class="d-flex mb-4 align-items-center">
									<span class="ml-center"><a href="<?=ROOT?>login" class="forgot-pass">Vous êtes déjà inscrit ?</a></span> 
								</div>
								<input type="submit" value="Inscription" class="btn btn-block btn-form1-submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $this->view("footer", $data); ?>