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
                    <li><a href="<?=ROOT?>rooms"><i class="fa-solid fa-chevron-right"></i>Toutes les catégories</a></li>
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
                    <!-- <div class="widget-title"> -->
                        <h3 style="text-align:center;">Recherche avancée</h3>
                    <!-- </div> -->
                    <div class="widget-title">
                        <h6 style="font-size:20px;">Catégories</h6>
                        <select name="categories">
                            <option>-- Catégories --</option>
                            <?php foreach($categories as $category):?>
                                <option value="<?=$category->id_category?>"><?=$category->name_category?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="widget-title">
                        <h6 style="font-size:20px;">Litterie</h6>
                        <select name="beddings">
                            <option>-- Lit --</option>
                            <?php foreach($beddings as $bedding):?>
                                <option value="<?=$bedding->id_bedding?>"><?=$bedding->name_bedding?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <?php if($animals): ?>
                        <div class="widget-title">
                            <h6 style="font-size:20px;">Animaux</h6>
                            <?php $num = 0 ?>
                            <div style="display:flex;">
                                <?php foreach($animals as $animal):?>
                                    <div style="padding: 0px 25px 0px 0px">
                                        <input type="checkbox" name="animals<?= ($num += 1)?>" value="<?=$animal->id_animal?>">
                                        <label for="animals"><?=ucwords($animal->name_animal)?></label>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div> 
                    <?php endif; ?>
                    <?php if($accomodations): ?>
                        <div class="widget-title">
                            <h6 style="font-size:20px;">Options et services</h6>
                            <?php $num_a = 0 ?>
                            <?php foreach($accomodations as $accomodation):?>
                                <div>
                                    <input type="checkbox" name="accomodations_<?=$accomodation->name_accomodation?>" value="<?=$accomodation->id_accomodation?>">
                                    <label for="accomodations"><?=$accomodation->name_accomodation?></label>
                                </div>
                            <?php endforeach;?>
                        </div>  
                    <?php endif; ?>     
                    <button type="submit" name="filter" class="btn-form1-submit">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
