<?php $this->view('header', $data)?>

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?=ASSETS?>img/pages/h1.jpg" style="background-position:bottom;background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left caption mt-90">
                <h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center;">Nos hébergements</h2>
                <h5 style="text-align:center;"><span style="color:#cd701c;font-weight:600;">Insolite</span></h5>
            </div>
        </div>
    </div>
</div>

<!-- rooms -->
<section class="news2 section-padding">
    <div class="container" style="max-width:1800px;">
        <div class="row rooms1">
            <div class="col-md-3"><?php $this->view('sidebar.inc', $data) ?></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12" style="display:flex;flex-wrap:inherit;">
                        <?php if(isset($_GET['find'])):?>
                            <div class="col-md-4">
                                <h5><b><?= $rooms ? count($rooms) : 0 ;?></b> résultats pour " <b><?= ucwords($_GET['find'])?></b> " :</h5>  
                            </div>
                        <?php elseif(isset($name) && is_array($name)):?>
                                <div class="col-md-4">
                                <h3><b><i class="<?= $name[0]->icon_category?>"></i></b> <?= $name[0]->name_category?></h3>  
                                </div>
                        <?php endif;?>
                    </div>
                    <div class="col-md-12" style="display:flex;flex-wrap:inherit;">
                        <!-- affichage des logements -->
                        <?php if(isset($rooms) && is_array($rooms)):?>
                            <?php foreach($rooms as $room):?>
                                <div class="col-md-4">
                                    <?php $this->view('rooms.inc',$room)?>
                                </div>
                            <?php endforeach; ?>
                        <!-- Affichage des catégories -->
                        <?php elseif(isset($categories) && is_array($categories)): ?>
                            <?php foreach($categories as $category): ?>
                                <div class="col-md-4">
                                    <div class="item" style="text-align:center;">
                                        <div> <img style="height:275px;object-fit:cover;" src="<?=ROOT.$category->img_category?>" alt="Image catégorie">
                                        </div>
                                        <div class="con"> 
                                            <h5><a href="<?=ROOT.'rooms/'.$category->name_category?>"><i class="<?=$category->icon_category?>" style="color:#cd701c;margin-right:10px;margin-bottom:15px;"></i><?=$category->name_category?></a></h5>
                                            <a style="font-size:15px;color:#fff;line-height:15px;" href="<?=ROOT.'rooms/'.$category->name_category?>"><?=$category->description_category?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>    
                        <!-- Cas ou il n'y a aucun resultats -->
                        <?php else: ?>
                            <div class="col-md-4">
                                Pas de logements disponibles.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->view('footer', $data)?>