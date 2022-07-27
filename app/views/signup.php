<?php $this->view("header", $data); ?>	
		<section id="form" style="margin-top:5px;"><!--form-->
			<div class="container" style="display:flex; justify-content:center;">
				<div class="card" style="display:flex; justify-content:center; align-items:center; text-align:center; margin-top:50px; margin-bottom:15px; width:500px; padding:15px;">
					<div class="col-lg-8 col-md-6">

						<span><?php check_error() ?></span>

						<!-- <div style="float:none;display:inline-block;" > -->
							<div class="signup-form"><!--sign up form-->
							<div class="card-header" style="text-align:center;">  
								<h6>Inscription</h6>
							</div>	
								<form method="post" style="display:flex;flex-direction:column;">
									<div class="checkout__input" style="margin-bottom:0;">
										<p style="margin-bottom: 2px;">Nom<span>*</span></p>
										<input name="name" value="<?= isset($_POST['name']) ?$_POST['name']: ""; ?>" type="text" placeholder="Nom"/>
									</div>
									<div class="checkout__input" style="margin-bottom:0;">
										<p style="margin-bottom: 2px;">Prénom<span>*</span></p>
										<input value="<?= isset($_POST['firstname']) ?$_POST['firstname']: ""; ?>" type="text" name="firstname" placeholder="Prénom" required>
									</div>
									<div class="checkout__input" style="margin-bottom:0;">
										<p style="margin-bottom: 2px;">Adresse email<span>*</span></p>
										<input name="email" value="<?= isset($_POST['email']) ?$_POST['email']: ""; ?>" type="email" placeholder="Email"/>
									</div>
									<div class="checkout__input" style="margin-bottom:0;">
										<p style="margin-bottom: 2px;">Téléphone<span>*</span></p>
										<input value="<?= isset($_POST['phone']) ?$_POST['phone']: ""; ?>" type="text" name="phone" placeholder="Téléphone" required>
									</div>
									<div class="checkout__input" style="margin-bottom:0;">
										<p style="margin-bottom: 2px;">Mot de passe<span>*</span></p>
										<input name="password" type="password" placeholder="Mot de passe"/>
									</div>
									<div class="checkout__input" style="margin-bottom:0;">
										<input name="password2" type="password" placeholder="Retaper mot de passe"/>
									</div>
									<button class="primary-btn" type="submit">Inscription</button>
								</form>
							</div><!--/sign up form-->
						<!-- </div> -->
					</div>
				</div>
			</div>
		</section><!--/form-->
<?php $this->view("footer", $data); ?>	