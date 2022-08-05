    <div class="news2-sidebar row">
        <div class="col-md-12">
            <div class="widget search">
                <form method="GET" action="<?=ROOT?>rooms">
                    <input type="text" name="find" placeholder="Recherche">
                    <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6 style="font-size:20px;">Catégories</h6>
                </div>
                <ul>
                    <li><a href="<?=ROOT?>rooms"><i class="ti-angle-right"></i>Toutes les catégories</a></li>
                    <?php foreach($categories as $category):?>
                        <li><a href="<?=ROOT?>rooms/<?= $category->name_category?>"><i class="ti-angle-right"></i><?= $category->name_category?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <form action="<?=ROOT?>rooms" method="GET">
                <div class="widget">
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
                    <div class="widget-title">
                        <h6 style="font-size:20px;">Animaux</h6>
                        <?php $num = 0 ?>
                        <?php foreach($animals as $animal):?>
                            <div>
                                <input type="checkbox" name="animals<?= ($num += 1)?>" value="<?=$animal->id_animal?>">
                                <label for="animals"><?=$animal->name_animal?></label>
                            </div>
                        <?php endforeach;?>
                    </div> 
                    <div class="widget-title">
                        <h6 style="font-size:20px;">Options et services</h6>
                        <?php foreach($accomodations as $accomodation):?>
                            <div>
                                <input type="checkbox" name="accomodations" value="<?=$accomodation->id_accomodation?>">
                                <label for="accomodations"><?=$accomodation->name_accomodation?></label>
                            </div>
                        <?php endforeach;?>
                    </div>       
                    <button type="submit" name="filter" class="btn-form1-submit">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
