<div class="item">
    <div class="position-re o-hidden"> <img style="height:300px;object-position:center;object-fit:cover;" src="<?= ROOT.$data->img_room?>" alt="Logement"></div>
    <span class="category">
        <a href="<?=ROOT?>booking/<?=$data->slug?>">Réserver</a>
    </span>
    <div class="con">
        <h6><?= $data->price_room ?>€ / Nuits</a></h6>
        <h5><?= $data->name_room ?></a> </h5>
        <div class="line"></div>
        <div class="row facilities">
            <div class="col col-md-7">
                <ul>
                    <li><i class="<?=$data->icon_category?>"></i><?=$data->name_category?></li>
                </ul>
            </div>
            <div class="col col-md-5 text-right">
                <div class="permalink"><a href="<?=ROOT?>room_details/<?=$data->slug?>">Détails</a></div>
            </div>
        </div>
    </div>
</div>