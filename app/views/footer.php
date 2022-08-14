
<!-- Footer -->
<footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-column footer-about">
                            <!-- <h3 class="footer-title">À propos de Singular</h3> -->
                            <img class="logo-img" src="<?=ASSETS?>img/logo/logo.png" alt="logo Singular">
                            <br><br>
                            <p class="footer-about-text">Nous sélectionnons pour vous des hébergements insolites partout en France ! Découvrez des endroits atypiques au cœur de nos belles régions françaises. Offrez-vous la magie d’une nuit insolite !</p>
                            <br>
                            <div class="butn-dark"><a href="<?=ROOT?>about" style="font-size:13px;"><span>En savoir plus</span></a></div>
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <div class="footer-column footer-explore clearfix">
                            <h3 class="footer-title">Navigation</h3>
                            <ul class="footer-explore-list list-unstyled">
                                <li><a href="<?=ROOT?>home">Accueil</a></li>
                                <li><a href="<?=ROOT?>rooms">Logements</a></li>
                                <li><a href="<?=ROOT?>about">À propos</a></li>
                                <li><a href="<?=ROOT?>contact">Contact</a></li>
                                <li><a href="<?=ROOT?>profil">Compte</a></li>
                                <?php
                                    if(isset($data['user_data']) && $data['user_data']->rank_user == "admin" ){
                                            echo '<li><a href="'.ROOT.'admin">Admin</a></li>'
                                        ;}
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-column footer-contact">
                            <h3 class="footer-title">Contact</h3>
                            <p class="footer-contact-text" style="padding-bottom: 0px;">11 avenue de l'Europe, 31520 <br>Ramonville-Saint-Agne</p>
                            <div class="footer-contact-info">
                                <p class="footer-contact-text" style="padding-bottom: 0px;"><span><i class="fa-solid fa-phone"></i></span> 06 27 89 02 54</p>
                                <p class="footer-contact-text" style="padding-bottom: 0px;"><span><i class="fa-solid fa-envelope"></i></span> contact.singular.jv@gmail.com</p>
                            </div>
                            <div class="footer-about-social-list">
                                <a href="#"><i class="ti-instagram"></i></a>
                                <a href="#"><i class="ti-github"></i></a>
                                <a href="#"><i class="ti-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bottom-inner" style="text-align:center;">
                            <ul style="display:flex;justify-content:center;" class="footer-bottom-copy-right">
                                <li style="padding:0px 10px 0px 0px;"><a target="_blank" href="<?=ASSETS?>documents/mentions-légales.pdf">Mentions légales</a></li>
                                <li style="padding:0px 10px 0px 0px;"><b>|</b></li>
                                <li style="padding:0px 10px 0px 0px;"><a target="_blank" href="<?=ASSETS?>documents/Politique-de-confidentialité.pdf">Confidentialité</a></li>
                                <li style="padding:0px 10px 0px 0px;"><b>|</b></li>
                                <li style="padding:0px 10px 0px 0px;"><a href="<?=ROOT?>contact">Contactez-nous</a></li>
                            </ul>
                        </div>
                        <div class="footer-bottom-inner">
                            <p class="footer-bottom-copy-right">© 2021 - 2022 Singular Tous droits réservés. Projet de fin de formation de l'ADRAR.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="<?=ASSETS?>js/jquery-3.6.0.min.js"></script>
    <script src="<?=ASSETS?>js/jquery-migrate-3.0.0.min.js"></script>
    <script src="<?=ASSETS?>js/modernizr-2.6.2.min.js"></script>
    <script src="<?=ASSETS?>js/imagesloaded.pkgd.min.js"></script>
    <script src="<?=ASSETS?>js/jquery.isotope.v3.0.2.js"></script>
    <script src="<?=ASSETS?>js/pace.js"></script>
    <script src="<?=ASSETS?>js/popper.min.js"></script>
    <script src="<?=ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?=ASSETS?>js/scrollIt.min.js"></script>
    <script src="<?=ASSETS?>js/jquery.waypoints.min.js"></script>
    <script src="<?=ASSETS?>js/owl.carousel.min.js"></script>
    <script src="<?=ASSETS?>js/jquery.stellar.min.js"></script>
    <script src="<?=ASSETS?>js/jquery.magnific-popup.js"></script>
    <script src="<?=ASSETS?>js/YouTubePopUp.js"></script>
    <script src="<?=ASSETS?>js/select2.js"></script>
    <script src="<?=ASSETS?>js/datepicker.js"></script>
    <script src="<?=ASSETS?>js/smooth-scroll.min.js"></script>
    <script src="<?=ASSETS?>js/custom.js"></script>
</body>
</html>