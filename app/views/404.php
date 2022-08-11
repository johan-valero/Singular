<?php $this->view("header", $data); ?>
	<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?=ROOT?>uploads/hobbit3.jpg" style="background-position:center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-left caption mt-90">
					<div id="notfound">
						<div class="notfound">
							<div class="notfound-404">
								<h1>404</h1>
							</div>
							<h2>Oops! Page introuvable</h2>
							<p>La page que vous tentez d'afficher n'existe pas ou une autre erreur s'est produite. <a href="<?=ROOT?>">Revenir à la page d'accueil.</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->view("footer", $data); ?>