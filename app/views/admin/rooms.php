<?php $this->view("admin/header", $data); ?>
<?php $this->view("admin/sidebar", $data); ?>

<div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-primary" onclick="show(event)" ><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                        <!-- Formulaire d'ajout de logement -->
                        <div class="content show" style="display:none;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="title">Ajouter un logement</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nom du logement</label>
                                                            <input type="text" class="form-control" placeholder="Nom du logement">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Catégorie</label>
                                                            <input type="text" class="form-control" placeholder="Choisir une catégorie">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Animaux</label>
                                                            <input type="email" class="form-control" placeholder="Choisir une option">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Litterie</label>
                                                            <input type="text" class="form-control" placeholder="Nom du logement">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Prix</label>
                                                            <input type="text" class="form-control" placeholder="Choisir une catégorie">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Personnes</label>
                                                            <input type="email" class="form-control" placeholder="Choisir une option">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea rows="4" cols="80" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Check-in</label>
                                                            <input type="text" class="form-control" placeholder="Nom du logement">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Check-out</label>
                                                            <input type="text" class="form-control" placeholder="Choisir une catégorie">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date d'ouverture</label>
                                                            <input type="email" class="form-control" placeholder="Choisir une option">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date de fermeture</label>
                                                            <input type="email" class="form-control" placeholder="Choisir une option">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Adresse</label>
                                                            <input type="text" class="form-control" placeholder="Adresse">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Ville</label>
                                                            <input type="text" class="form-control" placeholder="Ville">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Code postal</label>
                                                            <input type="number" class="form-control" placeholder="Code postal  ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                <button class="btn btn-primary" onclick="show(event)">Annuler</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin d'ajout de logement -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Animaux</th>
                                    <th>Description</th>
                                    <th>Litterie</th>
                                    <th>Nombre</th>
                                    <th>Superficie</th>
                                    <th>Adresse</th>
                                    <th>Date</th>
                                    <th>Horaire</th>
                                    <th>Image</th>
                                    <th>Prix</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($rooms)):?>
                                        <?php foreach($rooms as $room):?>
                                            <tr>
                                                <td>
                                                    <?= $room->id_room ?>
                                                </td>
                                                <td>
                                                    <a target="_blank" href="<?=ROOT.'room_details/'.$room->slug?>" style="color:#222;">
                                                        <?= $room->name_room ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $room->name_category ?>
                                                </td>
                                                <td>
                                                    Animaux <?= $room->name_animal ?>
                                                </td>
                                                <td>
                                                    <?= substr($room->description_room,0,70)?>...
                                                </td>
                                                <td>
                                                    <?= $room->name_bedding?>
                                                </td>
                                                <td>
                                                    <?= $room->persons?> personnes
                                                </td>
                                                <td>
                                                    <?= $room->area_room?> m²
                                                </td>
                                                <td>
                                                    <?= $room->name_bedding?>
                                                </td>
                                                <td>
                                                    Du <?= fr_date($room->date_open)?> au <?= fr_date($room->date_close)?>
                                                </td>
                                                <td>
                                                    Départ : <?= date("H\Hi",strtotime($room->hour_checkin))?>
                                                    Arrivée : <?= date("H\Hi",strtotime($room->hour_checkout))?>
                                                </td>
                                                <td>
                                                    <img src="<?=ROOT.$room->img_room?>" alt='' style="width:100px;">
                                                </td>
                                                <td>
                                                    <?= $room->price_room?>€/nuits
                                                </td>
                                                <td style="font-size:16px;">
                                                    <a href="#" title="Modifier">
                                                        <i class="fa-solid fa-square-pen"></i>
                                                    </a>
                                                    <a href="#" title="Supprimer">
                                                        <i class="fa-solid fa-square-xmark"></i>
                                                    </a>
                                                    <a target="_blank" href="<?=ROOT.'room_details/'.$room->slug?>" title="Voir">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("admin/footer", $data); ?>

<script>
    // Fonction pour changer le display du formulaire d'ajout de logements
    function show(){
            var show = document.querySelector(".show");
            var rooms_input = document.querySelector("#rooms");
            
            if(show.style.display === "none" || show.style.display === ""){
                show.style.display = "block";
                // rooms_input.focus();
            }else{
                show.style.display = "none";
                // rooms_input.value = "";
            }
        }
</script>