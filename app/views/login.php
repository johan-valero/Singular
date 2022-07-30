<?php $this->view("header", $data); ?>	
	<section>
		<div class="d-lg-flex half">
			<div class="bg order-1 order-md-2" style="background-image: url('<?=ASSETS?>img/slider/1.jpg');"></div>
			<div class="contents order-2 order-md-1">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-7">
							<h3>Connexion à <strong>Singular</strong></h3>
							<p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
							<span style="color:#cd701c;"><?php check_error() ?></span>
							<form method="POST">
							<div class="form-group first">
								<label for="email">Email <span style="color:#CD701C;">*</span></label>
								<input type="email" class="form-control" placeholder="Votre-email@gmail.com" name="email">
							</div>
							<div class="form-group last mb-3">
								<label for="password">Mot de passe <span style="color:#CD701C;">*</span></label>
								<input type="password" class="form-control" placeholder="Votre mot de passe"  name="password">
							</div>
							
							<div class="d-flex mb-5 align-items-center">
								<span class="ml-left"><a href="<?=ROOT?>signup" class="forgot-pass">Pas encore de compte ?</a></span> 
								</label>
								<span class="ml-auto"><a href="#" class="forgot-pass">Mot de passe oublié</a></span> 
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