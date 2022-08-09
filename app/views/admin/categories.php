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
                                            <h5 class="title">Ajouter une catégorie</h5>
                                            <a onclick="show(event)" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <fieldset>
                                                    <legend>Informations</legend>
                                                </fieldset>
                                                <!-- Input du nom du logement -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nom de la catégorie</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Nom de la catégorie" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Icone</label>
                                                            <input type="text" class="form-control" name="icon" placeholder="Icone de la catégorie" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Input description du logement -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea rows="4" cols="80"name="descriptions" class="form-control" placeholder="Choisir une description" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Input de l'adresse du logement -->
                                                <fieldset>
                                                    <legend>Images</legend>
                                                    <div class="row">
                                                        <div class="col-md-12" style="display:flex;">
                                                            <div class="form-group">
                                                                <label>Image principale</label>
                                                                <input type="file" name ="image" id="image" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a class="btn" style="background: #0000001a;" onclick="resetFile()">Réinitialiser l'image</a>
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
                                    <th>Description</th>
                                    <th>Icone</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($categories)):?>
                                        <?php foreach($categories as $category):?>
                                            <tr>
                                                <td>
                                                    <?= $category->id_category ?>
                                                </td>
                                                <td>
                                                    <a target="_blank" href="<?=ROOT.'rooms/'.$category->name_category?>" style="color:#222;">
                                                        <?= $category->name_category ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $category->description_category ?>
                                                </td>
                                                <td>
                                                    <i style="font-size:20px;" class="<?= $category->icon_category ?>"></i>
                                                </td>
                                                <td>
                                                    <img src="<?=ROOT.$category->img_category?>" alt='' style="width:80px;height:80px;object-fit:cover;">
                                                </td>
                                                <td style="font-size:16px;text-align:left;">
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