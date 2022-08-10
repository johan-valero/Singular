<?php $this->view("admin/header", $data); ?>
<?php $this->view("admin/sidebar", $data); ?>

<div class="panel-header panel-header-sm">
    </div>
    <div class="content" style="background-color:#f8f5f0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php if($mode == "add"): ?>
                            <?php check_error() ?></p>
                            <!-- Formulaire d'ajout de litterie -->
                            <div class="content show">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                                <h5 class="title">Ajouter une litterie</h5>
                                                <a href="<?=ROOT?>admin/beddings" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST"> 
                                                    <fieldset>
                                                        <legend>Informations</legend>
                                                        <!-- Input du nom de la litterie -->
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
                            <!-- Fin d'ajout de litterie -->
                        
                        <?php elseif($mode == "read"): ?>
                            <a href="<?=ROOT?>admin/beddings?add">
                                <button class="btn-custom btn-primary-custom"><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                            </a>    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class=" text-primary" style="font-size:20px;">
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th class="text-right">Action</th>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($beddings)):?>
                                            <?php foreach($beddings as $bedding):?>
                                                <tr>
                                                    <td >
                                                        <?= $bedding->id_bedding ?>
                                                    </td>
                                                    <td >
                                                        <?= $bedding->name_bedding ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="<?=ROOT?>admin/beddings?edit=<?=$bedding->id_bedding?>" class="btn btn-round btn-warning btn-icon btn-sm"><i class="fa fa-pen"></i></a>
                                                        <a href="<?=ROOT?>admin/beddings?delete=<?=$bedding->id_bedding?>" class="btn btn-round btn-danger btn-icon btn-sm"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php elseif($mode == "edit"): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Modifier une litterie</h5>
                                <a href="<?=ROOT?>admin/beddings" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <!-- Input du nom d'une litterie -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nom de la litterie</label>
                                                <input type="text" class="form-control" name="name" value="<?=$beddings->name_bedding ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn-custom btn-primary-custom" value="Modifier"/>
                                    <a href="<?=ROOT?>admin/beddings">
                                        <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                    </a>
                                </form>
                            </div>
                        <?php elseif($mode == "delete"): ?>
                        <div class="card-header" style=display:flex;justify-content:space-between;>
                            <h5 class="title">Supprimer une litterie</h5>
                            <a href="<?=ROOT?>admin/beddings" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                        </div>    
                        <div class="table-responsive">
                                <table class="table table-striped">
                                <thead class=" text-primary" style="font-size:20px;">
                                    <th>Id</th>
                                    <th>Nom</th>
                                </thead>
                                <tbody>
                                    <p class="status alert alert-danger">Etes-vous sur de vouloir supprimer cette litterie ? </p>
                                    <tr style="position:relative;">
                                        <td><?= $beddings->id_bedding ?></td>
                                        <td><?= $beddings->name_bedding ?></td>
                                    </tr>
                                    <a href="<?=ROOT?>admin/beddings?delete_confirmed=<?=$beddings->id_bedding?>">
                                        <input class="btn-custom btn-primary-custom" value="Supprimer"/>
                                    </a>
                                    <a href="<?=ROOT?>admin/beddings">
                                        <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                    </a>
                                </tbody>
                            </table>
                        </div>
                        <?php elseif($mode == "delete_confirmed"): ?>
                            <p class="status alert alert-success">La litterie a bien était supprimé</p>
                            <a href="<?=ROOT?>admin/beddings">
                                <input class="btn-custom btn-primary-custom" value="Retour aux litteries"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("admin/footer", $data); ?>   