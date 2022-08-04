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
                    <li><a href="<?=ROOT?>rooms/category"><i class="ti-angle-right"></i>Toutes les catégories</a></li>
                    <?php foreach($categories as $category):?>
                        <li><a href="<?=ROOT?>rooms/category/<?= $category->name_category?>"><i class="ti-angle-right"></i><?= $category->name_category?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
