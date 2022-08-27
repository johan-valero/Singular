<?php $this->view('header',$data)?>

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?=ASSETS?>img/pages/mountain.jpg" style="background-position:bottom;background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left caption mt-90">
                <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center;">Profil</h2>
                <h5 style="text-align:center;"><span style="color:#cd701c;"><?=isset($user_data) ? 'De '.strtoupper($user_data->firstname_user.' '.$user_data->name_user) : "" ; ?></span></h5>
            </div>
        </div>
    </div>
</div>
<!-- End Header Banner -->
<section class="section-padding">
    <?php if(isset($user_data)): ?>
    <div class="container">
        <div class="row" style="justify-content:center;">
            <div class="col-md-12"> 
                <div class="content ">
                    <div class="row">
                    <?php if($mode == "edit"): ?>
                        <div class="col-md-8" >
                            <div class="card" style="background:#f8f5f0;">
                                <div class="card-body">
                                    <div style=display:flex;justify-content:space-between;>
                                    <h3><i class="fa fa-pen"></i> Modifier le profil</h3>
                                    <a href="<?=ROOT?>profil" style="cursor:pointer;"><i style="font-size:25px;" class="fa-solid fa-xmark"></i></a>
                                    </div>
                                    <form method="POST">
                                        <?= check_error()?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">Nom <span style="color:#CD701C;">*</span></label>
                                                <input type="text" class="form-control" value="<?= isset($user_data) ? $user_data->name_user : "" ?>" name="name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="firstname">Prénom <span style="color:#CD701C;">*</span></label>
                                                <input type="text" class="form-control" value="<?= isset($user_data) ? $user_data->firstname_user : "" ?>" name="firstname">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="email">Adresse email <span style="color:#CD701C;">*</span></label>
                                                <input type="email" class="form-control" value="<?= isset($user_data) ? $user_data->email_user : "" ?>" name="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="phone">Téléphone <span style="color:#CD701C;">*</span></label>
                                                <input type="phone" class="form-control" value="<?= isset($user_data) ? $user_data->phone_user : "" ?>" name="phone">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone">Date de naissance <span style="color:#CD701C;">*</span></label>
                                                <input type="date" class="form-control" value="<?= isset($user_data) ? $user_data->birthday_user : "" ?>" name="birthday">
                                            </div>
                                        </div>
                                        <div class="form-group last mb-3">
                                            <label for="password">Mot de passe <span style="color:#CD701C;">*</span></label>
                                            <input type="password" class="form-control" placeholder="Votre mot de passe"  name="password">
                                            <input type="password" class="form-control" placeholder="Vérifier votre mot de passe"  name="password2">
                                        </div>
                                        <input type="submit" class="btn-form1-submit" value="Modifier"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Suppresion du compte -->
                    <?php elseif($mode == "delete"): ?>
                        <div class="col-md-8">
                            <div class="card" style="background:#f8f5f0;">
                                <div class="card-body">
                                    <div style=display:flex;justify-content:space-between;>
                                        <h3><i class="fa fa-xmark"></i> Supprimer le profil</h3>
                                    </div>
                                    <div style="display:flex;flex-direction:column;">
                                        <p class="status alert alert-danger">Si vous ne pensez jamais réutiliser Singular et souhaitez effacer complètement votre compte veuillez cliquer sur supprimer mon compte. Rappelez-vous cependant que vous ne pourrez ni réactiver, ni récupérer son contenu ou ses informations.</p>
                                        <div>
                                            <a href="<?=ROOT?>profil?delete_confirmed">
                                                <input class="btn-form1-submit" value="Supprimer mon compte"/>
                                            </a>
                                            <a href="<?=ROOT?>profil">
                                                <input class="btn-form1-submit" value="Annuler"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Validation de la suppression -->
                    <?php elseif($mode == "delete_confirmed"): ?>
                        <div class="col-md-8">
                            <div class="card" style="background:#f8f5f0;">
                                <div class="card-body">
                                <div style=display:flex;justify-content:space-between;>
                                        <h3><i class="fa fa-xmark"></i> Profil supprimé</h3>
                                    </div>
                                    <div style="display:flex;flex-direction:column;">
                                        <p class="status alert alert-success">Le compte a bien était supprimé. Nous vous remercions pour l'intérêt porté à Singular et esperons vous revoir prochainement !</p>
                                        <div>
                                            <a href="<?=ROOT?>">
                                                <input class="btn-form1-submit" value="Accueil"/>
                                            </a>
                                            <a href="<?=ROOT?>signup">
                                                <input class="btn-form1-submit" value="Se réinscrire"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($mode == "" || $mode == "edit" || $mode == "delete" ): ?>
                        <div class="col-md-4">
                            <div class="card card-user" style="background:#f8f5f0;">
                                <div class="card-body" style="text-align:center;">
                                    <div class="author">
                                        <fieldset class="made-up">
                                            <legend><img class="avatar border-gray" src="<?=ASSETS?>img/logo/icon_user.png" alt="icone" style="width:100px;"></legend>
                                            <h5 class="title"><?= strtoupper($user_data->firstname_user.' '.$user_data->name_user)?></h5>
                                            <label>Téléphone</label>
                                            <p><?= $user_data->phone_user ?></p>
                                            <label>Email</label>
                                            <p><?= $user_data->email_user ?></p>
                                            <label>Date de naissance</label>
                                            <p><?= date("d/m/Y",strtotime($user_data->birthday_user)) ?></p>
                                            <label>Date d'inscription</label>
                                            <p><?= date("d/m/Y",strtotime($user_data->date_user)) ?></p>
                                        </fieldset>
                                        <a href="<?=ROOT?>profil?edit" style="margin:0px 10px 0px 10px;color:#222;cursor:pointer;"><i style="color:#cd701c;font-size:15px;" class="fa fa-pen"></i> Modifier le profil</a>
                                        <a href="<?=ROOT?>profil?delete" style="margin:0px 10px 0px 10px;color:#222;cursor:pointer;" ><i style="color:#cd701c;font-size:20px;" class="fas fa-times"></i> Supprimer le profil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        <?php if(isset($reservations) && is_array($reservations)):?>
                            <div class="col-md-8">
                                <div class="card card-user" style="background:#f8f5f0;">
                                    <div class="card-body" style="text-align:center;">
                                        <h3>Vos réservations</h3>
                                        <table class="table-responsive">
                                            <thead>
                                                <th>N° de réservation</th>
                                                <th>Date de la réservation</th>
                                                <th>Date du séjour</th>
                                                <th>Logement</th>
                                                <th>Image</th>
                                                <th>Prix</th>
                                                <th>Nombre de personne</th>
                                                <th>Statut</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($reservations as $reservation):?>
                                                <tr>
                                                    <td><?=$reservation->id_booking?></td>
                                                    <td><?=date('d/m/Y', strtotime($reservation->date_booking))?></td>
                                                    <td>Du <?=date('d/m/Y',strtotime($reservation->check_in))?> au <?=date('d/m/Y',strtotime($reservation->check_out))?></td>
                                                    <td><a target="_blank" href="<?=ROOT.'room_details/'.$reservation->slug?>"><?=$reservation->name_room?></a></td>
                                                    <td><img src="<?=$reservation->img_room?>" style="width:80px;height:80px;"></td>
                                                    <td><?=$reservation->price_room?>€/nuits</td>
                                                    <td>Pour <?=$reservation->persons?> personnes</td>
                                                    <td><?=$reservation->validate = $reservation->validate ? "Validé" : "En cours de validation"?></td>
                                                    <td><?=$reservation->total_booking?>€</td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <p>Pas encore de réservation en cours</p>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else:?>
        <div class="contents order-4 order-md-2">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7" style="background-color:#fff;padding:25px;border-radius:10px;">
                        <h4 style="text-align:center;">Pas de profil disponible pour cet utilisateur.</h4>
                        <div style="display:flex;justify-content:center;padding:5px;">
                            <a class="col-md-4" href="<?=ROOT?>" style="text-decoration:none;">
                                <button type="button" class="btn-form1-submit">Accueil</button>
                            </a>
                            <a class="col-md-4" href="<?=ROOT?>login" style="text-decoration:none;">
                                <button type="button" class="btn-form1-submit">Connexion</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
</section>
<?php $this->view('footer',$data)?>