<?php $this->view("admin/header", $data); ?>
<?php $this->view("admin/sidebar", $data); ?>

<div class="panel-header panel-header-sm">
    </div>
    <div class="content" style="background-color:#f8f5f0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style=display:flex;justify-content:space-between;>
                        <h5 class="title">Modifier vos liens</h5>
                    </div>
                    <?php check_succes() ?></p>
                    <?php check_error() ?></p>
                    <?php if(isset($socials) && is_array($socials)): ?>
                        <div class="card-body">
                            <form method="POST"> 
                                <?php foreach($socials as $social):?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?= $social->name ?></label>
                                                <input type="text" class="form-control" name="<?= $social->name?>" value="<?= $social->value ?>" required>
                                                <?php if($social->name == "Facebook" || $social->name == "Instagram" || $social->name == "Github"): ?>
                                                    <p style="color:#666;font-size:10px;">Veuillez uniquement inscrire le nom du compte. Exemple : monréseauxsocial</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <button type="submit" class="btn-custom btn-primary-custom">Enregistrer</button>
                                <button class="btn-custom btn-primary-custom" type="reset">Réinitialiser</button>
                            </form>
                        </div>
                    <?php else: ?>
                        <p class="status alert alert-danger">Lien inconnu.</p>
                        <a href="<?=ROOT?>admin/socials">
                            <input class="btn-custom btn-primary-custom" value="Retour"/>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $this->view("admin/footer", $data); ?>  
