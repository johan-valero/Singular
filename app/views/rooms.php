<?php $this->view('header', $data)?>
<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?=ROOT?>uploads/h1.jpg" style="background-position:bottom;">
        <div class="container">
            <div class="row">
				<div class="col-md-12 caption mt-90">
					<h2 style="letter-spacing:10px;text-transform:uppercase;text-align:center;">Nos hébergements</h2>
                    <h5 style="text-align:center;"><span style="color:#cd701c;font-weight:600;">Insolite</span></h5>
				</div>
			</div>
        </div>
    </div>
    <section class="rooms1 section-padding bg-cream" data-scroll-index="1">
        <div class="container" style="margin:0;padding:0;">
            <div class="row">
                <?php $this->view('sidebar.inc', $data)?>
                <?php
                    if(isset($_GET['find'])){
                        if(isset($rooms) && is_array($rooms)){
                            echo '<div>';
                                echo '<h5><b>'.count($rooms).'</b> résultats pour "<b>'.ucwords($_GET['find']).'</b>" :</h5>';
                            echo '</div>';
                            foreach($rooms as $room){
                                echo '<div class="col-md-4">';
                                    $this->view('rooms.inc', $room);
                                echo '</div>';
                            }
                        }else{
                            echo '<h5><b>0</b>'.' résultat pour "<b>'.ucwords($_GET['find']).'</b>" :</h5>
                            ';
                        }
                    }else{
                        if(isset($rooms) && is_array($rooms)){
                            foreach($rooms as $room){
                                echo '<div class="col-md-4">';
                                    $this->view('rooms.inc', $room);
                                echo '</div>';
                            }
                        }elseif(isset($all_rooms) && is_array($rooms)){
                            foreach($all_rooms as $all_room){
                                echo '<div class="col-md-4">';
                                    $this->view('rooms.inc', $all_room);
                                echo '</div>';
                            }
                        }else{
                            echo '<div class="col-md-4">Pas de logements disponibles dans cette catégorie.</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </section>
<?php $this->view('footer', $data)?>