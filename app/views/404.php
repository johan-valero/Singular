<?php $this->view("header", $data); ?>
<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2>Oops! Page introuvable</h2>
			<p>La page que vous tentez d'afficher n'existe pas ou une autre erreur s'est produite. <a href="<?=ROOT?>">Revenir à la page d'accueil.</a></p>
			<div class="notfound-social">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
			</div>
		</div>
	</div>
</body>
<?php $this->view("footer", $data); ?>