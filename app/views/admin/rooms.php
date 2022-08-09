<?php $this->view("admin/header", $data); ?>
<?php $this->view("admin/sidebar", $data); ?>

<div class="panel-header panel-header-sm">
    </div>
    <div class="content" style="background-color:#f8f5f0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn-custom btn-primary-custom" onclick="show(event)" ><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                        <!-- Formulaire d'ajout de logement -->
                        <div class="content show" style="display:none;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" style=display:flex;justify-content:space-between;>
                                            <h5 class="title">Ajouter un logement</h5>
                                            <a onclick="show(event)" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <fieldset>
                                                    <legend>Informations</legend>
                                                </fieldset>
                                                <!-- Input du nom du logement -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nom du logement</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Nom du logement">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Input description du logement -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea rows="4" cols="80"name="descriptions" class="form-control" placeholder="Choisir une description"></textarea>
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
                                                                <input type="number" class="form-control" name="price" placeholder="Choisir un prix">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Personnes</label>
                                                                <input type="number" class="form-control" name="persons" placeholder="Choisir le nombre de personne">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Superficie</label>
                                                                <input type="number" class="form-control" name="area" placeholder="Choisir la superficie du logement en m²">
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
                                                                        <option value="<?=$bedding->id_bedding?>"><?=$bedding->name_bedding?></option>
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
                                                                        <option value="<?=$category->id_category?>"><?=$category->name_category?></option>
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
                                                                        <option value="<?=$animal->id_animal?>"><?=$animal->name_animal?></option>
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
                                                                <input type="time" class="form-control" name="checkin" placeholder="Choisir un horaire d'arrivée">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Départ</label>
                                                                <input type="time" class="form-control" name="checkout" placeholder="Choisir un horaire de départ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Date d'ouverture</label>
                                                                <input type="date" class="form-control" name="date_open" placeholder="Choisir une date d'ouverture">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Date de fermeture</label>
                                                                <input type="date" class="form-control" name="date_close" placeholder="Choisir une date de fermeture">
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
                                                                <input type="text" class="form-control" name="adress" placeholder="Adresse">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Code postal</label>
                                                                <input type="text" class="form-control" name="zip" placeholder="Code postal  ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Ville</label>
                                                                <input type="text" class="form-control" name="city" placeholder="Ville">
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
                                                                <input type="file" name ="image" id="image">
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
                        <!-- Fin d'ajout de logement -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary" style="font-size:20px;">
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
                                                <td style="font-size:16px;text-align:center;">
                                                    <a href="#" title="Modifier">
                                                        <i class="fa-solid fa-square-pen"></i>
                                                    </a>
                                                    <a href="#" title="Supprimer">
                                                        <i class="fa-solid fa-square-xmark"></i>
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
        
        if(show.style.display === "none" || show.style.display === ""){
            show.style.display = "block";
        }else{
            show.style.display = "none";
        }
    }

    // Réinitialise les valeurs de inputs files
    function resetFile() {
        var file1 = document.querySelector('#image');
        var file2 = document.querySelector('#image2');
        var file3 = document.querySelector('#image3');
        file1.value = '';
        file2.value = '';
        file3.value = '';
    }
</script>