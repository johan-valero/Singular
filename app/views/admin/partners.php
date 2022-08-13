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
                                <!-- Formulaire d'ajout de partenaire -->
                                <div class="content show">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" style=display:flex;justify-content:space-between;>
                                                    <h5 class="title">Ajouter un partenaire</h5>
                                                    <a href="<?=ROOT?>admin/partners" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                                </div>
                                                <div class="card-body">
                                                    <form method="POST" enctype="multipart/form-data"> 
                                                        <fieldset>
                                                            <!-- Input du nom du partenaire -->
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Nom du partenaire</label>
                                                                        <input type="text" class="form-control" name="name" value="<?= isset($_POST['name']) ?$_POST['name']: ""; ?>" placeholder="Nom du partenaire" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Lien du site partenaire</label>
                                                                        <input type="text" class="form-control" name="link" value="<?= isset($_POST['link']) ?$_POST['link']: ""; ?>" placeholder="Lien du partenaire" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Logo</label>
                                                                        <input type="file" name="image" accept=".jpeg,.png,.gif,.jpg" required>
                                                                        <p style="color:#666;font-size:10px;">Veuillez sélectionner une image de type .jpeg, .png ou .gif.</p>
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
                                <!-- Fin d'ajout de patenaire -->
                        <?php elseif($mode == "read"): ?>
                            <a href="<?=ROOT?>admin/partners?add">
                                <button class="btn-custom btn-primary-custom"><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                            </a>    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class=" text-primary" style="font-size:20px;">
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Lien</th>
                                            <th>Image</th>
                                            <th class="text-right">Action</th>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($partners) && is_array($partners)):?>
                                            <?php foreach($partners as $partner):?>
                                                <tr>
                                                    <td >
                                                        <?= $partner->id_partner ?>
                                                    </td>
                                                    <td >
                                                        <?= $partner->name_partner ?>
                                                    </td>
                                                    <td >
                                                        <?= $partner->link_partner ?>
                                                    </td>
                                                    <td >
                                                        <img src="<?=ROOT.$partner->img_partner ?>" alt='img partner' style="width:50px;height:50px;object-fit:cover;">
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="<?=ROOT?>admin/partners?edit=<?=$partner->id_partner?>" class="btn btn-round btn-warning btn-icon btn-sm"><i class="fa fa-pen"></i></a>
                                                        <a href="<?=ROOT?>admin/partners?delete=<?=$partner->id_partner?>" class="btn btn-round btn-danger btn-icon btn-sm"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php elseif($mode == "edit" && isset($partners)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Modifier un partenaire</h5>
                                <a href="<?=ROOT?>admin/partners" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom du partenaire</label>
                                                <input type="text" class="form-control" name="name" value="<?= $partners->name_partner ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lien du site partenaire</label>
                                                <input type="text" class="form-control" name="link" value="<?=$partners->link_partner?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input id="image" type="file" name="image" accept=".jpeg,.png,.gif,.jpg">
                                                <p style="color:#666;font-size:10px;">Veuillez sélectionner une image de type .jpeg, .png ou .gif.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image actuelle</label><br>
                                                <img src="<?= ROOT.$partners->img_partner?>" style="width:60px;height:60px;object-fit:cover;">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a class="btn" style="background: #0000001a;" onclick="resetFile()">Réinitialiser l'image</a>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-custom btn-primary-custom">Enregistrer</button>
                                    <button class="btn-custom btn-primary-custom" type="reset">Réinitialiser</button>
                                </form>
                            </div>
                        <?php elseif($mode == "delete" && isset($partners)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Supprimer un partenaire</h5>
                                <a href="<?=ROOT?>admin/partners" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>    
                            <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead class=" text-primary" style="font-size:20px;">
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Lien</th>
                                        <th>Image</th>
                                    </thead>
                                    <tbody>
                                        <p class="status alert alert-danger">Etes-vous sur de vouloir supprimer ce partenaire ? </p>
                                        <tr style="position:relative;">
                                            <td><?= $partners->id_partner ?></td>
                                            <td><?= $partners->name_partner ?></td>
                                            <td><?= $partners->link_partner ?></td>
                                            <td>
                                                <img src="<?=ROOT.$partners->img_partner ?>" alt='img partner' style="width:50px;height:50px;object-fit:cover;">
                                            </td>
                                        </tr>
                                        <a href="<?=ROOT?>admin/partners?delete_confirmed=<?=$partners->id_partner?>">
                                            <input class="btn-custom btn-primary-custom" value="Supprimer"/>
                                        </a>
                                        <a href="<?=ROOT?>admin/partners">
                                            <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                        </a>
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($mode == "delete_confirmed"): ?>
                            <p class="status alert alert-success">Le partenaire a bien été supprimé</p>
                            <a href="<?=ROOT?>admin/partners">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php else: ?>
                            <p class="status alert alert-danger">Partenaire inconnu.</p>
                            <a href="<?=ROOT?>admin/partners">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->view("admin/footer", $data); ?>  
