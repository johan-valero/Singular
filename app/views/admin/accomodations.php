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
                            <!-- Formulaire d'ajout d'aménagements -->
                            <div class="content show">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                                <h5 class="title">Ajouter un aménagement</h5>
                                                <a href="<?=ROOT?>admin/accomodations" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST"> 
                                                    <fieldset>
                                                        <legend>Informations</legend>
                                                        <!-- Input du nom de l aménagement -->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Nom de l'aménagement</label>
                                                                    <input type="text" class="form-control" name="name" placeholder="Nom de l'aménagement" value="<?= isset($_POST['name']) ?$_POST['name']: ""; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Icone</label>
                                                                    <input type="text" class="form-control" name="icon" placeholder="Icone de l'aménagement" value="<?= isset($_POST['icon']) ?$_POST['icon']: ""; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea type="text" class="form-control" name="description" placeholder="Description de l'aménagement" required><?= isset($_POST['description']) ?$_POST['description']: ""; ?></textarea>
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
                            <!-- Fin d'ajout d'aménagement -->
                        
                        <?php elseif($mode == "read"): ?>
                            <a href="<?=ROOT?>admin/accomodations?add">
                                <button class="btn-custom btn-primary-custom"><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                            </a>    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class=" text-primary" style="font-size:20px;">
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Icone</th>
                                            <th class="text-right">Action</th>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($accomodations)):?>
                                            <?php foreach($accomodations as $accomodation):?>
                                                <tr>
                                                    <td >
                                                        <?= $accomodation->id_accomodation ?>
                                                    </td>
                                                    <td >
                                                        <?= $accomodation->name_accomodation ?>
                                                    </td>
                                                    <td >
                                                        <?= $accomodation->description_accomodation ?>
                                                    </td>
                                                    <td >
                                                        <i style="font-size:20px;" class="<?= $accomodation->icon_accomodation ?>"></i>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="<?=ROOT?>admin/accomodations?edit=<?=$accomodation->id_accomodation?>" class="btn btn-round btn-warning btn-icon btn-sm"><i class="fa fa-pen"></i></a>
                                                        <a href="<?=ROOT?>admin/accomodations?delete=<?=$accomodation->id_accomodation?>" class="btn btn-round btn-danger btn-icon btn-sm"><i class="fas fa-times"></i></a>
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
                                <h5 class="title">Modifier un aménagement</h5>
                                <a href="<?=ROOT?>admin/accomodations" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <!-- Input du nom d'un aménagement -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nom de l'aménagement</label>
                                                <input type="text" class="form-control" name="name" value="<?=$accomodations->name_accomodation ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom de l'aménagement</label>
                                                <input type="text" class="form-control" name="description" value="<?=$accomodations->description_accomodation ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Icone</label>
                                                <input type="text" class="form-control" name="icon" value="<?=$accomodations->icon_accomodation ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn-custom btn-primary-custom" value="Modifier"/>
                                    <a href="<?=ROOT?>admin/accomodations">
                                        <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                    </a>
                                </form>
                            </div>
                        <?php elseif($mode == "delete"): ?>
                        <div class="card-header" style=display:flex;justify-content:space-between;>
                            <h5 class="title">Supprimer un aménagement</h5>
                            <a href="<?=ROOT?>admin/accomodations" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                        </div>    
                        <div class="table-responsive">
                                <table class="table table-striped">
                                <thead class=" text-primary" style="font-size:20px;">
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Icone</th>
                                </thead>
                                <tbody>
                                    <p class="status alert alert-danger">Etes-vous sur de vouloir supprimer cet aménagement ? </p>
                                    <tr style="position:relative;">
                                        <td><?= $accomodations->id_accomodation ?></td>
                                        <td><?= $accomodations->name_accomodation ?></td>
                                        <td><i style="font-size:20px;" class="<?= $accomodations->icon_accomodation ?>"></i></td>
                                    </tr>
                                    <a href="<?=ROOT?>admin/accomodations?delete_confirmed=<?=$accomodations->id_accomodation?>">
                                        <input class="btn-custom btn-primary-custom" value="Supprimer"/>
                                    </a>
                                    <a href="<?=ROOT?>admin/accomodations">
                                        <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                    </a>
                                </tbody>
                            </table>
                        </div>
                        <?php elseif($mode == "delete_confirmed"): ?>
                            <p class="status alert alert-success">L'aménagement a bien était supprimé</p>
                            <a href="<?=ROOT?>admin/accomodations">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("admin/footer", $data); ?>   