<?php $this->view("admin/header", $data); ?>
<?php $this->view("admin/sidebar", $data); ?>

<div class="panel-header panel-header-sm">
    </div>
    <div class="content" style="background-color:#f8f5f0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php check_error() ?></p>
                        <?php if($mode == "read"): ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table_id" style="width:100%;">
                                        <thead class=" text-primary" style="font-size:20px;">
                                            <th>N° de réservation</th>
                                            <th>Client</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>Date de la réservation</th>
                                            <th>Date du séjour</th>
                                            <th>Logement</th>
                                            <th>Image</th>
                                            <th>Prix</th>
                                            <th>Nombre de personne</th>
                                            <th>Statut</th>
                                            <th>Total</th>
                                            <th class="text-right">Action</th>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($bookings) && is_array($bookings)):?>
                                            <?php foreach($bookings as $reservation):?>
                                                <tr>
                                                    <td><?=$reservation->id_booking?></td>
                                                    <td><?=$reservation->firstname_user.' '.$reservation->name_user?></td>
                                                    <td><?=$reservation->phone_user?></td>
                                                    <td><?=$reservation->email_user?></td>
                                                    <td><?=date('d/m/Y', strtotime($reservation->date_booking))?></td>
                                                    <td>Du <?=date('d/m/Y',strtotime($reservation->check_in))?> au <?=date('d/m/Y',strtotime($reservation->check_out))?></td>
                                                    <td><?=$reservation->name_room?></td>
                                                    <td><img src="<?=ROOT.$reservation->img_room?>" style="width:80px;height:80px;"></td>
                                                    <td><?=$reservation->price_room?>€/nuits</td>
                                                    <td>Pour <?=$reservation->persons?> personnes</td>
                                                    <td><?=$reservation->validate = $reservation->validate ? "Validé" : "En cours de validation"?></td>
                                                    <td><?=$reservation->total_booking?>€</td>
                                                    <td class="text-right">
                                                        <a href="<?=ROOT?>admin/bookings?delete=<?=$reservation->id_booking?>" class="btn btn-round btn-danger btn-icon btn-sm"><i class="fas fa-times"></i></a>
                                                        <a href="<?=ROOT?>admin/bookings?validate=<?=$reservation->id_booking?>" class="btn btn-round btn-success btn-icon btn-sm"><i style="font-size:15px;padding:8px;" class="fa-solid fa-check"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php elseif($mode == "validate" && isset($bookings)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Confirmer une réservation</h5>
                                <a href="<?=ROOT?>admin/bookings" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>    
                            <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead class=" text-primary" style="font-size:20px;">
                                        <th>N° de réservation</th>
                                        <th>Client</th>
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
                                        <p class="status alert alert-warning">Etes-vous sur de vouloir confirmer cette réservation ? </p>
                                        <tr style="position:relative;">
                                            <td><?=$bookings->id_booking?></td>
                                            <td><?=$bookings->firstname_user." ".$bookings->name_user?></td>
                                            <td><?=date('d/m/Y', strtotime($bookings->date_booking))?></td>
                                            <td>Du <?=date('d/m/Y',strtotime($bookings->check_in))?> au <?=date('d/m/Y',strtotime($bookings->check_out))?></td>
                                            <td><?=$bookings->name_room?></td>
                                            <td><img src="<?=ROOT.$bookings->img_room?>" style="width:80px;height:80px;"></td>
                                            <td><?=$bookings->price_room?>€/nuits</td>
                                            <td>Pour <?=$bookings->persons?> personnes</td>
                                            <td><?=$bookings->validate = $bookings->validate ? "Validé" : "En cours de validation"?></td>
                                            <td><?=$bookings->total_booking?>€</td>
                                        </tr>
                                        <a href="<?=ROOT?>admin/bookings?validation_confirmed=<?=$bookings->id_booking?>">
                                            <input class="btn-custom btn-primary-custom" value="Valider"/>
                                        </a>
                                        <a href="<?=ROOT?>admin/bookings">
                                            <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                        </a>
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($mode == "validation_confirmed"): ?>
                        <p class="status alert alert-success">La réservation a bien été confirmé</p>
                        <a href="<?=ROOT?>admin/bookings">
                            <input class="btn-custom btn-primary-custom" value="Retour"/>
                        </a>
                        <?php elseif($mode == "delete" && isset($bookings)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Annuler une réservation</h5>
                                <a href="<?=ROOT?>admin/bookings" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>    
                            <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead class=" text-primary" style="font-size:20px;">
                                        <th>N° de réservation</th>
                                        <th>Date de la réservation</th>
                                        <th>Date du séjour</th>
                                        <th>Logement</th>
                                        <th>Image</th>
                                        <th>Prix</th>
                                        <th>Nombre de personne</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        <p class="status alert alert-danger">Etes-vous sur de vouloir annuler cette réservation ? </p>
                                        <tr style="position:relative;">
                                            <td><?=$bookings->id_booking?></td>
                                            <td><?=date('d/m/Y', strtotime($bookings->date_booking))?></td>
                                            <td>Du <?=date('d/m/Y',strtotime($bookings->check_in))?> au <?=date('d/m/Y',strtotime($bookings->check_out))?></td>
                                            <td><?=$bookings->name_room?></td>
                                            <td><img src="<?=ROOT.$bookings->img_room?>" style="width:80px;height:80px;"></td>
                                            <td><?=$bookings->price_room?>€/nuits</td>
                                            <td>Pour <?=$bookings->persons?> personnes</td>
                                            <td><?=$bookings->total_booking?>€</td>
                                        </tr>
                                        <a href="<?=ROOT?>admin/bookings?delete_confirmed=<?=$bookings->id_booking?>">
                                            <input class="btn-custom btn-primary-custom" value="Supprimer"/>
                                        </a>
                                        <a href="<?=ROOT?>admin/bookings">
                                            <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                        </a>
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($mode == "delete_confirmed"): ?>
                            <p class="status alert alert-success">La réservation a bien été annulé</p>
                            <a href="<?=ROOT?>admin/bookings">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php else: ?>
                            <p class="status alert alert-danger">Réservation inconnue.</p>
                            <a href="<?=ROOT?>admin/bookings">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->view("admin/footer", $data); ?>  
