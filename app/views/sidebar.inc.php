<!-- Sidebar -->
<div class="col-md-4">
    <div class="news2-sidebar row">
        <div class="col-md-12">
            <div class="widget search" style="padding:0px 30px 0px 30px">
                <form method="GET" action="<?=ROOT?>rooms">
                    <input type="text" name="find" placeholder="Recherche">
                    <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Archives</h6>
                </div>
                <ul>
                    <li><a href="#">December 2022</a></li>
                    <li><a href="#">November 2022</a></li>
                    <li><a href="#">October 2022</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Catégories</h6>
                </div>
                <ul>
                    <li><a href="<?= ROOT."rooms/category"?>">Toutes les catégories</a></li>
                    <?php
                        foreach($categories as $category){
                            echo '<li><a href="'.ROOT."rooms/category/". $category->name_category.'"><i class="ti-angle-right"></i>'.$category->name_category.'</a></li>';
                        } 
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-title">
                    <h6>Tags</h6>
                </div>
                <ul class="tags">
                    <li><a href="#">Restaurant</a></li>
                    <li><a href="#">Hotel</a></li>
                    <li><a href="#">Spa</a></li>
                    <li><a href="#">Health Club</a></li>
                    <li><a href="#">Luxury Hotel</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>