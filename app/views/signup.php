<?php $this->view("header", $data); ?>	
	<section>
		<div class="d-lg-flex half">
			<div class="bg order-1 order-md-2" style="background-image: url('<?=ASSETS?>img/slider/2.jpg');"></div>
			<div class="contents order-2 order-md-1">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-7">
							<h3 style="margin: 0 0 0 0;">Inscription à <strong>Singular</strong></h3>
							<span style="color:#cd701c;line-height:17px;"><?php check_error() ?></span>
							<form method="POST">
							<div class="form-group first">
								<label for="name">Nom <span style="color:#CD701C;">*</span></label>
								<input type="text" class="form-control" placeholder="Nom" name="name">
							</div>
							<div class="form-group first">
								<label for="firstname">Prénom <span style="color:#CD701C;">*</span></label>
								<input type="text" class="form-control" placeholder="Prénom" name="firstname">
							</div>
							<div class="form-group first">
								<label for="email">Adresse email <span style="color:#CD701C;">*</span></label>
								<input type="email" class="form-control" placeholder="votre-email@gmail.com" name="email">
							</div>
							<div class="form-group first">
								<label for="phone">Téléphone <span style="color:#CD701C;">*</span></label>
								<input type="pho,e" class="form-control" placeholder="Téléphone" name="phone">
							</div>
							<div class="form-group last mb-3">
								<label for="password">Mot de passe <span style="color:#CD701C;">*</span></label>
								<input type="password" class="form-control" placeholder="Votre mot de passe"  name="password">
								<input type="password" class="form-control" placeholder="Vérifier votre mot de passe"  name="password2">
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