<!-- <div class="col-md-4"> -->
    <div class="item">
        <div class="position-re o-hidden"> <img style="height:400px;object-fit:cover;" src="<?= ROOT.$data->img_room?>" alt="Logement"> </div> <span class="category"><a href="#">Réserver</a></span>
        <div class="con">
            <h6><a href="room-details.html"><?= $data->price_room ?>€ / Nuits</a></h6>
            <h5><a href="room-details.html"><?= $data->name_room ?></a> </h5>
            <div class="line"></div>
            <div class="row facilities">
                <div class="col col-md-7">
                    <ul>
                        <?php
                            foreach($data->acc as $icon){
                                echo '
                                    <li><i class="'.$icon->icon_accomodation.'"></i></li>
                                ';
                            }
                        ?>
                    </ul>
                </div>
                <div class="col col-md-5 text-right">
                    <div class="permalink"><a href="<?=ROOT?>room_details/<?=$data->slug?>">Détails <i class="ti-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->