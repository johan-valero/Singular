<?php $this->view("header", $data); ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="<?=ROOT.$details->img_room?>" style="background-position:bottom;background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center">Réservations</h2>
                    <h5 style="text-align:center;">De votre <span> hébergement</span></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulaire de réservation -->
    <section class="section-padding">
        <div class="container">
            <div class="col-md-12"> 
                <div class="content ">
                    <form method="POST">
                        <div class="row">
                            <!-- Info perso -->
                            <div class="col-md-4">
                                <div class="booking-box" style="margin-bottom:50px;padding:15px;">
                                    <div class="head-box">
                                        <h6>Logement</h6>
                                        <h4><?= $details->name_room?></h4>
                                    </div>
                                    <div class="col-md-12" style="padding:0px;">
                                        <h6>Date et horaire</h6>
                                        <ul class="list-unstyled page-list mb-30">
                                            <li>
                                                <div class="page-list-icon"> <span class="fa-solid fa-hourglass-start"></span> </div>
                                                <div class="page-list-text">
                                                    <p>À partir de <?=date("H\Hi",strtotime($details->hour_checkin))?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="page-list-icon"> <span class="fa-solid fa-hourglass-end"></span> </div>
                                                <div class="page-list-text">
                                                    <p>Jusqu'à <?=date("H\Hi",strtotime($details->hour_checkout))?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="page-list-icon"> <span class="fa-solid fa-calendar"></span> </div>
                                                <div class="page-list-text">
                                                    <p>Du <?= fr_date($details->date_open)?> au <?= fr_date($details->date_close)?></p>
                                                </div>
                                            </li>
                                        </ul>
                                        <h6>Caractéristiques du logement</h6>
                                        <ul class="list-unstyled page-list mb-30">
                                            <li>
                                                <div class="page-list-icon"><span><i class="<?= $details->icon_category?>"></i></span> </div>
                                                <div class="page-list-text">
                                                    <p><a href="<?=ROOT?>rooms/<?= $details->name_category?>"><?= $details->name_category?></a></p>
                                                </div>
                                            </li>  
                                            <li>
                                                <div class="page-list-icon"> <span><i class="fa-solid fa-people-group"></i></span> </div>
                                                <div class="page-list-text">
                                                    <?php
                                                        if($details->persons > 1 ){
                                                            echo '<p>1 - '.$details->persons. ' personnes</p>';
                                                        }else{
                                                            echo '<p>1 personne</p>';
                                                        }
                                                    ?>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="page-list-icon"><span><i class="fa-solid fa-bed"></i></span> </div>
                                                <div class="page-list-text">
                                                    <p><?= $details->name_bedding?></p>
                                                </div>
                                            </li> 
                                            <li>
                                                <div class="page-list-icon"><span><i class="fa-solid fa-dog"></i></span> </div>
                                                <div class="page-list-text">
                                                    <p>Animaux <?= $details->name_animal?></p>
                                                </div>
                                            </li>  
                                            <li>
                                                <div class="page-list-icon"><span><i class="fa-solid fa-maximize"></i></span> </div>
                                                <div class="page-list-text">
                                                    <p><?= $details->area_room ?> m²</p>
                                                </div>
                                            </li>     
                                            <li>
                                                <div class="page-list-icon"><span><i class="fa-solid fa-money-bill"></i></span> </div>
                                                <div class="page-list-text">
                                                    <p><?= $details->price_room ?> € / nuits</p>
                                                </div>
                                            </li>            
                                        </ul>
                                        <h6>Options et services</h6>
                                        <ul class="list-unstyled page-list mb-30">                   
                                            <?php 
                                                if(is_array($accom)){
                                                    foreach($accom as $accomodation){
                                                        echo '
                                                            <li>
                                                                <div class="page-list-icon"> <span><i class="'.$accomodation->icon_accomodation.'"></i></span></div>
                                                                <div class="page-list-text">
                                                                    <p>'.$accomodation->name_accomodation.'</p>
                                                                </div>
                                                            </li>';
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8" >
                                <div class="booking-box" style="padding:15px;">
                                    <div class="head-box">
                                        <h4>Informations personnelles</h4>
                                    </div>
                                    <div class="booking-inner clearfix">
                                        <p class="mb-0" style="padding-bottom: 25px;">Veuillez vérifier les champs avec vos informations pour pouvoir réserver. Les champs marqués d'un (<span style="color:#cd701c;">*</span>) sont obligatoires.</p>
                                        <?= check_error()?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">Nom <span style="color:#CD701C;">*</span></label>
                                                <input type="text" class="form-control" value="<?= isset($user_data) ? $user_data->name_user : "" ?>" name="name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="firstname">Prénom <span style="color:#CD701C;">*</span></label>
                                                <input type="text" class="form-control" value="<?= isset($user_data) ? $user_data->firstname_user : "" ?>" name="firstname" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="email">Adresse email <span style="color:#CD701C;">*</span></label>
                                                <input type="email" class="form-control" value="<?= isset($user_data) ? $user_data->email_user : "" ?>" name="email" required>
                                                <input type="email" class="form-control"  name="email2" placeholder="Veuillez confirmer l'adresse email." required>
                                                <p style="margin-top:-15px;color:#666;font-size:10px;">L'e-mail de confirmation sera envoyé à cette adresse.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="phone">Téléphone <span style="color:#CD701C;">*</span></label>
                                                <input type="phone" class="form-control" value="<?= isset($user_data) ? $user_data->phone_user : "" ?>" name="phone" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone">Date de naissance <span style="color:#CD701C;">*</span></label>
                                                <input type="date" class="form-control" value="<?= isset($user_data) ? $user_data->birthday_user : "" ?>" name="birthday" required>
                                            </div>
                                        </div>
                                        <div class="head-box" style="padding-top: 25px;">
                                            <h4>Réservation</h4>
                                            <p>La durée de votre séjour ne peut pas être inférieur à 2 nuits. Il s'agit d'une pré-réservation le paiement se fera auprès de l'établissement concerné lors de votre arrivé sur les lieux.</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Départ <span style="color:#CD701C;">*</span></label>
                                                <input type="date" class="form-control" placeholder="Date de départ" value="<?= isset($_POST['checkin']) ? $_POST['checkin'] : "" ?>" name="checkin" min="<?=date('Y-m-d')?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Arrivée <span style="color:#CD701C;">*</span></label>
                                                <input type="date" class="form-control" placeholder="Date d'arrivée" value="<?= isset($_POST['checkout']) ? $_POST['checkout'] : "" ?>" min="<?=date('Y-m-d')?>" name="checkout" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Nombre de personnes <span style="color:#CD701C;">*</span></label>
                                                <select class="form-control" name="persons">
                                                    <?php for ($i = 0; $i <= 10; $i++): ?>
                                                        <option value=<?=$i?> <?= isset($_POST['persons']) && $_POST['persons'] == $i ? 'selected = "selected"' : "" ;?> ><?=$i?></option>
                                                    }
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Veuillez écrire vos demandes en français ou en anglais. (facultatif)</label>
                                                <textarea type="text" name="demand" placeholder="Vos demandes spéciales"><?=isset($_POST['demand']) ? $_POST['demand'] : "";?></textarea>
                                                <p style="margin-top:-15px;color:#666;font-size:10px;">Les demandes spéciales ne peuvent pas être garanties mais l'établissement fera tout son possible pour les satisfaire.</p>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn-form1-submit mt-15">Réserver</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn-form1-submit mt-15"><a href="<?=ROOT?>rooms">Annuler</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $this->view("footer", $data); ?>