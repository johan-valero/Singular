    <div class="news2-sidebar row">
        <div class="col-md-12">
            <div class="widget search">
                <form method="GET" action="<?=ROOT?>rooms">
                    <input type="text" name="find" placeholder="Recherche">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6 style="font-size:20px;">Catégories</h6>
                </div>
                <ul>
                    <li><a href="<?=ROOT?>rooms/categories"><i class="fa-solid fa-chevron-right"></i>Toutes les catégories</a></li>
                    <?php if($categories): ?>
                        <?php foreach($categories as $category):?>
                            <li><a href="<?=ROOT?>rooms/<?= $category->name_category?>"><i class="fa-solid fa-chevron-right"></i><?= $category->name_category?></a></li>
                        <?php endforeach;?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <form action="<?=ROOT?>rooms" method="GET">
                <div class="widget">
                    <div style="display:flex;justify-content:space-between;">
                        <h3 style="text-align:center;">Recherche avancée</h3>
                        <a href="<?=ROOT.'rooms'?>">
                            <i style="font-size:28px;padding:5px;" title="Réinitialiser" class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <div class="widget-title">
                        <h6 style="font-size:20px;">Catégories</h6>
                        <select name="categories">
                            <option>-- Catégories --</option>
                            <?php foreach($categories as $category):?>
                                <option value="<?=$category->id_category?>" <?= isset($_GET['categories']) && $_GET['categories'] == $category->id_category ? 'selected = "selected"' : "" ;?> ><?=$category->name_category?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="widget-title">
                        <h6 style="font-size:20px;">Litterie</h6>
                        <select name="beddings">
                            <option>-- Lit --</option>
                            <?php foreach($beddings as $bedding):?>
                                <option value="<?=$bedding->id_bedding?>" <?= isset($_GET['beddings']) && $_GET['beddings'] == $bedding->id_bedding ? 'selected = "selected"' : "" ;?> ><?=$bedding->name_bedding?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <?php if($animals): ?>
                        <div class="widget-title">
                            <h6 style="font-size:20px;">Animaux</h6>
                            <div style="display:flex;">
                                <?php foreach($animals as $animal):?>
                                    <div style="padding: 0px 25px 0px 0px">
                                        <input type="checkbox" name="animals[<?=$animal->name_animal?>]" value="<?=$animal->id_animal?>" <?=isset($_GET['animals'][$animal->name_animal]) && $_GET['animals'][$animal->name_animal] == $animal->id_animal ? 'checked' : "" ;?> >
                                        <label for="animals"><?=ucwords($animal->name_animal)?></label>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div> 
                    <?php endif; ?>
                    <?php if($accomodations): ?>
                        <div class="widget-title">
                            <h6 style="font-size:20px;">Options et services</h6>
                            <?php foreach($accomodations as $accomodation):?>
                                <div>
                                    <input type="checkbox" name="accomodations[<?=$accomodation->name_accomodation?>]" value="<?=$accomodation->id_accomodation?>" <?=isset($_GET['accomodations'][$accomodation->name_accomodation]) && $_GET['accomodations'][$accomodation->name_accomodation] == $accomodation->id_accomodation ? 'checked' : "" ;?> >
                                    <label for="accomodations"><?=$accomodation->name_accomodation?></label>
                                </div>
                            <?php endforeach;?>
                        </div>  
                    <?php endif; ?>
                    <div class="widget-title">
                        <h6 style="font-size:20px;">Prix</h6>
                        <div>
                            <label>Min</label>
                            <input type="number" step="0.01" name="min-price" value="<?= isset($_GET['min-price']) ? $_GET['min-price'] : "" ;?>" placeholder="0.00€" style="width:80px;">
                            <label>Max</label>
                            <input type="number" step="0.01" name="max-price" value="<?= isset($_GET['max-price']) ? $_GET['max-price'] : "" ;?>" placeholder="1000€" style="width:80px;">  
                        </div>
                    </div>
                    <button type="submit" name="filter" class="btn-form1-submit">Rechercher</button>    
                </div>
            </form>
        </div>
    </div>
