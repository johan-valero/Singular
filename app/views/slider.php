<!-- Slider -->
<?php if(isset($sliders) && is_array($sliders)): ?>
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            <?php foreach($sliders as $slider): ?>
                <div class="text-center item bg-img" data-overlay-dark="2" data-background="<?=ROOT.$slider->img ?>">
                    <div class="v-middle caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <h4 style="color:#cd701c;font-weight:600;"><?=$slider->title ?></h4>
                                    <h1><?=$slider->message ?></h1>
                                    <div class="butn-light mt-30 mb-30"> <a target="_blank" href="<?=$slider->link ?>"><span>Découvrir</span></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- slider reservation -->
        <div class="reservation">
            <a target="_blank" href="<?= isset($instagram) ? $instagram->value : " ";?>">
                <div class="icon d-flex justify-content-center align-items-center" style="flex-direction:column;border:none;">
                    <i style="font-size:20px;" class="fa-brands fa-square-facebook"></i>
                    <i style="font-size:20px;" class="fa-brands fa-square-instagram"></i>
                </div>
                <div class="call"><span style="color:#fff;font-size:20px;"><?= isset($phone) ? $phone->value : " ";?></span> <br><?= isset($email) ? $email->value : " ";?></div>
            </a>
        </div>
    </header>
<?php endif; ?>