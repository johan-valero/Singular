<?php $this->view("header", $data); ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="uploads/c5.jpg" style="background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center">Contactez-nous</h2>
                    <h5 style="text-align:center;">Gardons le <span style="color:#cd701c;">contact</span></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->
    <section class="contact section-padding">
        <div class="container">
            <div class="row mb-90">
                <div class="col-md-6 mb-60">
                    <!-- <h3>Singular</h3> -->
                    <div class="logo" style="text-align:left;">
                        <img src="<?=ASSETS?>img/logo_dark.png" class="logo-img" alt="logo_singular">
                    </div>
                    <br>
                    <p>Hotel ut nisl quam nestibulum ac quam nec odio elementum sceisue the aucan ligula. Orci varius natoque penatibus et magnis dis parturient monte nascete ridiculus mus nellentesque habitant morbine.</p>
                    <div class="reservations mb-30" style="margin-bottom:12px !important;">
                        <div class="icon"><span class="fa-solid fa-phone"></span></div>
                        <div class="text">
                            <p>Numéro</p> <a  style="font-size:20px;" href="tel:06-27-89-02-54">06 27 89 02 54</a>
                        </div>
                    </div>
                    <div class="reservations mb-30" style="margin-bottom:12px !important;">
                        <div class="icon"><span class="fa-solid fa-envelope"></span></div>
                        <div class="text">
                            <p>Email</p> <a  style="font-size:20px;" href="mailto:contact.singular.jv@gmail.com">contact.singular.jv@gmail.com</a>
                        </div>
                    </div>
                    <div class="reservations mb-30">
                        <div class="icon"><span style="width:35px;height:35px;" class="fa-solid fa-location-dot"></span></div>
                        <div class="text">
                            <p>Adresse</p><a style="font-size:20px;" >11 avenue de l'Europe, 31520 
                            <br>Ramonville-Saint-Agne
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-30 offset-md-1">
                    <h3>Formulaire de contact</h3>
                    <form method="POST" >
                        <div class="row">
                            <div class="col-12">
                            <?php if(is_array($error) && count($error) > 0):?>
                                <?php foreach($error as $err):?>
                                    <div><?= $err ?></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if(isset($_GET['success'])):?>
                                <div> Votre message a était envoyé avec succés. </div>
                            <?php endif; ?>
                            </div>
                        </div>
                        <!-- form message -->
                        <!-- form elements -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input name="name" type="text" placeholder="Votre nom *" required value="<?=isset($POST['name']) ? $POST['name'] : ''?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" type="email" placeholder="Votre adresse email *" required value="<?=isset($POST['email']) ? $POST['email'] : ''?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="phone" type="text" placeholder="Votre numéro *" required value="<?=isset($POST['phone']) ? $POST['phone'] : ''?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="subject" type="text" placeholder="Sujet *" required value="<?=isset($POST['subject']) ? $POST['subject'] : ''?>" >
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn-form1-submit">Envoyer<button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Map Section -->
            <div class="row">
                <div class="col-md-12 map animate-box" data-animate-effect="fadeInUp">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23114.090373704526!2d1.4685237!3d43.6011008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebdd63de81871%3A0x6c14cda58609eb63!2sADRAR%20Formation%20-%20P%C3%B4le%20NUMERIQUE!5e0!3m2!1sfr!2sfr!4v1659363951805!5m2!1sfr!2sfr" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
<?php $this->view("footer", $data); ?>