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
                        <?php if($mode == "add"): ?>
                                <!-- Formulaire d'ajout de logement -->
                                <div class="content show">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" style=display:flex;justify-content:space-between;>
                                                    <h5 class="title">Ajouter un logement</h5>
                                                    <a href="<?=ROOT?>admin/rooms" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                                </div>
                                                <div class="card-body">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <fieldset>
                                                            <legend>Informations</legend>
                                                        </fieldset>
                                                        <!-- Input du nom du logement -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Nom du logement</label>
                                                                    <input type="text" class="form-control" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : "" ;?>" placeholder="Nom du logement" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Input description du logement -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea rows="4" cols="80"name="description" class="form-control" placeholder="Choisir une description" required><?= isset($_POST['description']) ? $_POST['description'] : "" ;?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Input caractéristique du logement -->
                                                        <fieldset>
                                                            <legend>Caractéristiques</legend>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Prix</label>
                                                                        <input type="number" class="form-control" name="price" value="<?= isset($_POST['price']) ? $_POST['price'] : "" ;?>" placeholder="Choisir un prix" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Personnes</label>
                                                                        <input type="number" class="form-control" name="persons" value="<?= isset($_POST['persons']) ? $_POST['persons'] : "" ;?>" placeholder="Choisir le nombre de personne" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Superficie</label>
                                                                        <input type="number" class="form-control" name="area" value="<?= isset($_POST['area']) ? $_POST['area'] : "" ;?>" placeholder="Choisir la superficie du logement en m²" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Input select -->
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group" style="display:flex;flex-direction:column;">
                                                                        <label>Litterie</label>
                                                                        <select name="beddings">
                                                                            <option>-- Lit --</option>
                                                                            <?php foreach($beddings as $bedding):?>
                                                                                <option value="<?=$bedding->id_bedding?>" <?= isset($_POST['beddings']) && $_POST['beddings'] == $bedding->id_bedding ? 'selected = "selected"' : "" ;?> ><?=$bedding->name_bedding?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group" style="display:flex;flex-direction:column;">
                                                                        <label>Catégorie</label>
                                                                        <select name="categories">
                                                                            <option>-- Catégories --</option>
                                                                            <?php foreach($categories as $category):?>
                                                                                <option value="<?=$category->id_category?>" <?= isset($_POST['categories']) && $_POST['categories'] == $category->id_category ? 'selected = "selected"' : "" ;?> ><?=$category->name_category?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group" style="display:flex;flex-direction:column;">
                                                                        <label>Animaux</label>
                                                                        <select name="animals">
                                                                            <option>-- Animaux --</option>
                                                                            <?php foreach($animals as $animal):?>
                                                                                <option value="<?=$animal->id_animal?>" <?=$category->name_category?> <?= isset($_POST['animals']) && $_POST['animals'] == $animal->id_animal ? 'selected = "selected"' : "" ;?> ><?=$animal->name_animal?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <!-- Input des horaires et dates -->
                                                        <fieldset>
                                                            <legend>Horaires et dates</legend>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Arrivée</label>
                                                                        <input type="time" class="form-control" name="checkin" value="<?= isset($_POST['checkin']) ? $_POST['checkin'] : "" ;?>" placeholder="Choisir un horaire d'arrivée" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Départ</label>
                                                                        <input type="time" class="form-control" name="checkout" value="<?= isset($_POST['checkout']) ? $_POST['checkout'] : "" ;?>" placeholder="Choisir un horaire de départ" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Date d'ouverture</label>
                                                                        <input type="date" class="form-control" name="date_open" value="<?= isset($_POST['date_open']) ? $_POST['date_open'] : "" ;?>" placeholder="Choisir une date d'ouverture" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Date de fermeture</label>
                                                                        <input type="date" class="form-control" name="date_close" value="<?= isset($_POST['date_close']) ? $_POST['date_close'] : "" ;?>" placeholder="Choisir une date de fermeture" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <!-- Input de l'adresse du logement -->
                                                        <fieldset>
                                                            <legend>Adresse du logements</legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Adresse</label>
                                                                        <input type="text" class="form-control" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : "" ;?>" placeholder="Adresse" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Code postal</label>
                                                                        <input type="text" class="form-control" name="zip" value="<?= isset($_POST['zip']) ? $_POST['zip'] : "" ;?>" placeholder="Code postal  " required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Ville</label>
                                                                        <input type="text" class="form-control" name="city" value="<?= isset($_POST['city']) ? $_POST['city'] : "" ;?>" placeholder="Ville" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <!-- Input des aménagements du logement -->
                                                        <fieldset>
                                                            <legend>Aménagements</legend>
                                                            <div class="row">
                                                                <div class="col-md-12" style="display:flex;">
                                                                    <div class="form-group">
                                                                        <?php foreach($accomodations as $accomodation):?>
                                                                            <div>
                                                                                <input type="checkbox" name="accomodations[<?=$accomodation->name_accomodation?>]" value="<?=$accomodation->id_accomodation?>" <?=isset($_POST['accomodations'][$accomodation->name_accomodation]) && $_POST['accomodations'][$accomodation->name_accomodation] == $accomodation->id_accomodation ? 'checked' : "" ;?>>
                                                                                <label for="accomodations"><?=$accomodation->name_accomodation?></label>
                                                                            </div>
                                                                        <?php endforeach;?>
                                                                    </div>     
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <!-- Input de l'adresse du logement -->
                                                        <fieldset>
                                                            <legend>Images</legend>
                                                            <div class="row">
                                                                <div class="col-md-12" style="display:flex;">
                                                                    <div class="form-group">
                                                                        <label>Image principale</label>
                                                                        <input type="file" name ="image" id="image" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Image facultative</label>
                                                                        <input type="file" name ="image2" id="image2">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Image facultative</label>
                                                                        <input type="file" name ="image3" id="image3">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a class="btn" style="background: #0000001a;" onclick="resetFile()">Réinitialiser les images</a>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <button type="submit" class="btn-custom btn-primary-custom">Enregistrer</button>
                                                        <button class="btn-custom btn-primary-custom" type="reset">Réinitialiser</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin d'ajout de catégorie -->
                        <?php elseif($mode == "read"): ?>
                            <a href="<?=ROOT?>admin/rooms?add">
                                <button class="btn-custom btn-primary-custom"><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                            </a>    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class=" text-primary" style="font-size:20px;">
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Catégorie</th>
                                            <th>Animaux</th>
                                            <th>Description</th>
                                            <th>Litterie</th>
                                            <th>Nombre</th>
                                            <th>Adresse</th>
                                            <th>Superficie</th>
                                            <th>Dates</th>
                                            <th>Horaires</th>
                                            <th>Image</th>
                                            <th>Prix</th>
                                            <th class="text-right">Action</th>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($rooms) && is_array($rooms)):?>
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
                                                            <?= $room->address_room.' '.$room->zip_room.' '.$room->city_room?>
                                                        </td>
                                                        <td>
                                                            <?= $room->area_room?> m²
                                                        </td>
                                                        <td>
                                                            Du <?= fr_date($room->date_open)?> au <?= fr_date($room->date_close)?>
                                                        </td>
                                                        <td>
                                                            Départ : <?= date("H\Hi",strtotime($room->hour_checkin))?>
                                                            <br>Arrivée : <?= date("H\Hi",strtotime($room->hour_checkout))?>
                                                        </td>
                                                        <td>
                                                            <img src="<?=ROOT.$room->img_room?>" alt='' style="width:70px;height:70px;object-fit:cover;">
                                                        </td>
                                                        <td>
                                                            <?= $room->price_room?>€/nuits
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="<?=ROOT?>admin/rooms?edit=<?=$room->id_room?>" class="btn btn-round btn-warning btn-icon btn-sm"><i class="fa fa-pen"></i></a>
                                                            <a href="<?=ROOT?>admin/rooms?delete=<?=$room->id_room?>" class="btn btn-round btn-danger btn-icon btn-sm"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif($mode == "edit" && isset($rooms)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Modifier un logement</h5>
                                <a href="<?=ROOT?>admin/rooms" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <fieldset>
                                        <legend>Informations</legend>
                                    </fieldset>
                                    <!-- Input du nom du logement -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nom du logement</label>
                                                <input type="text" class="form-control" name="name" value="<?= $rooms->name_room?>" placeholder="Nom du logement" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Input description du logement -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="4" cols="80"name="description" class="form-control" placeholder="Choisir une description" required><?= $rooms->description_room?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Input caractéristique du logement -->
                                    <fieldset>
                                        <legend>Caractéristiques</legend>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Prix</label>
                                                    <input type="number" class="form-control" name="price" value="<?= $rooms->price_room?>" placeholder="Choisir un prix" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Personnes</label>
                                                    <input type="number" class="form-control" name="persons" value="<?= $rooms->persons?>" placeholder="Choisir le nombre de personne" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Superficie</label>
                                                    <input type="number" class="form-control" name="area" value="<?= $rooms->area_room ?>" placeholder="Choisir la superficie du logement en m²" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Input select -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group" style="display:flex;flex-direction:column;">
                                                    <label>Litterie</label>
                                                    <select name="beddings">
                                                        <option>-- Lit --</option>
                                                        <?php foreach($beddings as $bedding):?>
                                                            <option value="<?=$bedding->id_bedding?>" <?= ($rooms->id_bedding == $bedding->id_bedding) ? 'selected = "selected"' : "" ;?>><?=$bedding->name_bedding?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="display:flex;flex-direction:column;">
                                                    <label>Catégorie</label>
                                                    <select name="categories">
                                                        <option>-- Catégories --</option>
                                                        <?php foreach($categories as $category):?>
                                                            <option value="<?=$category->id_category?>" <?=($rooms->id_category == $category->id_category) ? 'selected = "selected"' : "" ;?> ><?=$category->name_category?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="display:flex;flex-direction:column;">
                                                    <label>Animaux</label>
                                                    <select name="animals">
                                                        <option>-- Animaux --</option>
                                                        <?php foreach($animals as $animal):?>
                                                            <option value="<?=$animal->id_animal?>" <?=($rooms->id_animal == $animal->id_animal) ? 'selected = "selected"' : "" ;?> ><?=$animal->name_animal?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Input des horaires et dates -->
                                    <fieldset>
                                        <legend>Horaires et dates</legend>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Arrivée</label>
                                                    <input type="time" class="form-control" name="checkin" value="<?= $rooms->hour_checkin?>" placeholder="Choisir un horaire d'arrivée" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Départ</label>
                                                    <input type="time" class="form-control" name="checkout" value="<?= $rooms->hour_checkout ?>" placeholder="Choisir un horaire de départ" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date d'ouverture</label>
                                                    <input type="date" class="form-control" name="date_open" value="<?= $rooms->date_open?>" placeholder="Choisir une date d'ouverture" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date de fermeture</label>
                                                    <input type="date" class="form-control" name="date_close" value="<?= $rooms->date_close?>" placeholder="Choisir une date de fermeture" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Input de l'adresse du logement -->
                                    <fieldset>
                                        <legend>Adresse du logements</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Adresse</label>
                                                    <input type="text" class="form-control" name="address" value="<?= $rooms->address_room ?>" placeholder="Adresse" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Code postal</label>
                                                    <input type="text" class="form-control" name="zip" value="<?= $rooms->zip_room ?>" placeholder="Code postal  " required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Ville</label>
                                                    <input type="text" class="form-control" name="city" value="<?= $rooms->city_room ?>" placeholder="Ville" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Input de l'adresse du logement -->
                                    <fieldset>
                                        <legend>Images</legend>
                                        <div class="row">
                                            <div class="col-md-12" style="display:flex;">
                                                <div class="form-group">
                                                    <label>Image principale</label>
                                                    <input type="file" name ="image" id="image" style="height:auto;">
                                                    <img src="<?=ROOT.$rooms->img_room ?>" alt='image logement' style="width:100px;height:100px;">
                                                </div>
                                                <div class="form-group">
                                                    <label>Image facultative</label>
                                                    <input type="file" name ="image2" id="image2" style="height:auto;">
                                                    <?php if(file_exists($rooms->img2_room)):?>
                                                        <img src="<?=ROOT.$rooms->img2_room ?>" alt='image logement' style="width:100px;height:100px;">
                                                    <?php endif;?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Image facultative</label>
                                                    <input type="file" name ="image3" id="image3" style="height:auto;">
                                                    <?php if(file_exists($rooms->img3_room)):?>
                                                        <img src="<?=ROOT.$rooms->img3_room ?>" alt='image logement' style="width:100px;height:100px;">
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <a class="btn" style="background: #0000001a;" onclick="resetFile()">Réinitialiser les images</a>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn-custom btn-primary-custom">Enregistrer</button>
                                    <button class="btn-custom btn-primary-custom" type="reset">Réinitialiser</button>
                                </form>
                            </div>
                        <?php elseif($mode == "delete" && isset($rooms)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Supprimer un hébergement</h5>
                                <a href="<?=ROOT?>admin/rooms" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>    
                            <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead class=" text-primary" style="font-size:20px;">
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Adresse</th>
                                        <th>Superficie</th>
                                        <th>Image</th>
                                        <th>Prix</th>
                                    </thead>
                                    <tbody>
                                        <p class="status alert alert-danger">Etes-vous sur de vouloir supprimer ce logement ? </p>
                                        <tr style="position:relative;">
                                            <td><?= $rooms->id_room ?></td>
                                            <td><?= $rooms->name_room ?></td>
                                            <td><?= $rooms->description_room ?></td>
                                            <td><?= $rooms->address_room.' '.$rooms->zip_room.' '.$rooms->city_room ?></td>
                                            <td><?= $rooms->area_room ?> m²</td>
                                            <td>
                                                <img src="<?=ROOT.$rooms->img_room ?>" alt='img room' style="width:50px;height:50px;object-fit:cover;">
                                            </td>
                                            <td><?= $rooms->price_room ?>€/nuits</td>
                                        </tr>
                                        <a href="<?=ROOT?>admin/rooms?delete_confirmed=<?=$rooms->id_room?>">
                                            <input class="btn-custom btn-primary-custom" value="Supprimer"/>
                                        </a>
                                        <a href="<?=ROOT?>admin/rooms">
                                            <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                        </a>
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($mode == "delete_confirmed"): ?>
                            <p class="status alert alert-success">Le logement a bien été supprimé</p>
                            <a href="<?=ROOT?>admin/rooms">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php else: ?>
                            <p class="status alert alert-danger">Logement inconnu.</p>
                            <a href="<?=ROOT?>admin/rooms">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->view("admin/footer", $data); ?>  
