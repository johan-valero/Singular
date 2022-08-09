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
                                            <h5 class="title">Ajouter une litterie</h5>
                                            <a onclick="show(event)" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <fieldset>
                                                    <legend>Informations</legend>
                                                    <!-- Input du nom du logement -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Nom de la litterie</label>
                                                                <input type="text" class="form-control" name="name" placeholder="Nom de la litterie" required>
                                                            </div>
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
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php if(isset($beddings)):?>
                                        <?php foreach($beddings as $bedding):?>
                                            <tr>
                                                <td>
                                                    <?= $bedding->id_bedding ?>
                                                </td>
                                                <td>
                                                    <?= $bedding->name_bedding ?>
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
</script>