<?php $this->view("header", $data); ?>	
	<section><!--form-->
		<div class="container" style="display:flex; justify-content:center; text-align:center;">
			<div class="checkout__form"><!--login form-->
			<span><?php check_error() ?></span>
				<form method="POST">
					<div class="card" style="display:flex; justify-content:center; align-items:center; text-align:center; margin-top:50px; margin-bottom:15px; width:500px; padding:15px;">
						<div class="col-lg-8 col-md-6">
							<div class="card-header" style="text-align:center;">  
								<h6>Se connecter</h6>
							</div>	
							<div class="checkout__input" style="width=200px;">
								<p>Adresse email<span>*</span></p>
								<input name="email" value="<?= isset($_POST['email']) ?$_POST['email']: ""; ?>" type="email" placeholder="Adresse email"/>
							</div>
							<div class="checkout__input">
								<p>Mot de passe<span>*</span></p>
								<input  style="margin-bottom:0px;" name="password" value="<?= isset($_POST['password']) ?$_POST['password']: ""; ?>" type="password" placeholder="Mot de passe"/>
								<a href="<?= ROOT ?>forget" style="margin-bottom:20px important!;color:#000;font-size:15px;" class="a_hov"><i>Mot de passe oublié</i></a>
							</div>
						</div>
						<button class="primary-btn" type="submit">Connexion</button>
						<a href="<?= ROOT ?>signup" style="margin-bottom:20px important!;color:#000;font-size:15px;" class="a_hov"> Pas encore de compte ? Inscrivez-vous ici !</a>
					</div>
				</form>
			</div>
		</div>
		<style>
			.a_hov:hover{
				color: #000000a3 !important;
			}
		</style>
	</section><!--/form-->
<?php $this->view("footer", $data); ?>	