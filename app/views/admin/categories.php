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
                                <!-- Formulaire d'ajout de catégorie -->
                                <div class="content show">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" style=display:flex;justify-content:space-between;>
                                                    <h5 class="title">Ajouter une catégorie</h5>
                                                    <a href="<?=ROOT?>admin/categories" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                                                </div>
                                                <div class="card-body">
                                                    <form method="POST" enctype="multipart/form-data"> 
                                                        <fieldset>
                                                            <!-- Input du nom de la catégorie -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nom de la catégorie</label>
                                                                        <input type="text" class="form-control" name="name" value="<?= isset($_POST['name']) ?$_POST['name']: ""; ?>" placeholder="Nom de la catégorie" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Icone</label>
                                                                        <input type="text" class="form-control" name="icon" value="<?= isset($_POST['icon']) ?$_POST['icon']: ""; ?>" placeholder="Icone de la catégorie" required>
                                                                        <p style="color:#666;font-size:10px;">Veuillez sélectionner une icone sur <a target="_blank" href="https://fontawesome.com/">Font awesome</a>.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea type="text" class="form-control" name="description" placeholder="Description de la catégorie" required><?= isset($_POST['text']) ?$_POST['text']: ""; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Image</label>
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
                                <!-- Fin d'ajout de catégorie -->
                        <?php elseif($mode == "read"): ?>
                            <a href="<?=ROOT?>admin/categories?add">
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
                                            <th>Image</th>
                                            <th class="text-right">Action</th>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($categories) && is_array($categories)):?>
                                            <?php foreach($categories as $category):?>
                                                <tr>
                                                    <td >
                                                        <?= $category->id_category ?>
                                                    </td>
                                                    <td >
                                                        <?= $category->name_category ?>
                                                    </td>
                                                    <td >
                                                        <?= $category->description_category ?>
                                                    </td>
                                                    <td >
                                                        <i style="font-size:20px;" class="<?= $category->icon_category ?>"></i>
                                                    </td>
                                                    <td >
                                                        <img src="<?=ROOT.$category->img_category ?>" alt='img category' style="width:50px;height:50px;object-fit:cover;">
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="<?=ROOT?>admin/categories?edit=<?=$category->id_category?>" class="btn btn-round btn-warning btn-icon btn-sm"><i class="fa fa-pen"></i></a>
                                                        <a href="<?=ROOT?>admin/categories?delete=<?=$category->id_category?>" class="btn btn-round btn-danger btn-icon btn-sm"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php elseif($mode == "edit" && isset($categories)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Modifier une catégorie</h5>
                                <a href="<?=ROOT?>admin/categories" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"> 
                                    <fieldset>
                                        <!-- Input du nom de la catégorie -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nom de la catégorie</label>
                                                    <input type="text" class="form-control" name="name" value="<?= $categories->name_category ?>" placeholder="Nom de la catégorie" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Icone</label>
                                                    <input type="text" class="form-control" name="icon" value="<?= $categories->icon_category ?>" placeholder="Icone de la catégorie" required>
                                                    <p style="color:#666;font-size:10px;">Veuillez sélectionner une icone sur <a target="_blank" href="https://fontawesome.com/">Font awesome</a>.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea type="text" class="form-control" name="description" placeholder="Description de la catégorie" required><?= $categories->description_category ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="image" accept=".jpeg,.png,.gif,.jpg">
                                                    <p style="color:#666;font-size:10px;">Veuillez sélectionner une image de type .jpeg, .png ou .gif.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Image actuelle</label><br>
                                                        <img src="<?= ROOT.$categories->img_category?>" style="width:60px;height:60px;object-fit:cover;">
                                                    </div>
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
                        <?php elseif($mode == "delete" && isset($categories)): ?>
                            <div class="card-header" style=display:flex;justify-content:space-between;>
                                <h5 class="title">Supprimer une catégorie</h5>
                                <a href="<?=ROOT?>admin/categories" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                            </div>    
                            <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead class=" text-primary" style="font-size:20px;">
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Icone</th>
                                        <th>Image</th>
                                    </thead>
                                    <tbody>
                                        <p class="status alert alert-danger">Etes-vous sur de vouloir supprimer cette catégorie ? </p>
                                        <tr style="position:relative;">
                                            <td><?= $categories->id_category ?></td>
                                            <td><?= $categories->name_category ?></td>
                                            <td><?= $categories->description_category ?></td>
                                            <td><i class="<?= $categories->icon_category ?>"></i></td>
                                            <td>
                                                <img src="<?=ROOT.$categories->img_category ?>" alt='img category' style="width:50px;height:50px;object-fit:cover;">
                                            </td>
                                        </tr>
                                        <a href="<?=ROOT?>admin/categories?delete_confirmed=<?=$categories->id_category?>">
                                            <input class="btn-custom btn-primary-custom" value="Supprimer"/>
                                        </a>
                                        <a href="<?=ROOT?>admin/categories">
                                            <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                        </a>
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($mode == "delete_confirmed"): ?>
                            <p class="status alert alert-success">La catégorie a bien été supprimé</p>
                            <a href="<?=ROOT?>admin/categories">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php else: ?>
                            <p class="status alert alert-danger">Catégories inconnu.</p>
                            <a href="<?=ROOT?>admin/categories">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->view("admin/footer", $data); ?>  
