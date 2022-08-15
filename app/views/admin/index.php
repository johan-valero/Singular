<?php $this->view("admin/header", $data); ?>
<?php $this->view("admin/sidebar", $data); ?>

<div class="panel-header panel-header-sm"></div>
<div class="content" style="background-color:#f8f5f0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3" style="text-align:center;">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i style="font-size:25px;" class="fa-solid fa-message"></i>
                                        <h6 class="stats-title">Messages</h6>
                                    </div>
                                    <h3 class="info-title">859</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="text-align:center;">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i style="font-size:25px;" class="fa-solid fa-money-bill"></i>
                                        <h6 class="stats-title">Revenue</h6>
                                    </div>
                                    <h3 class="info-title">3,521<small>€</small></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="text-align:center;">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-info">
                                        <i style="font-size:25px;" class="fa-solid fa-users"></i>
                                        <h6 class="stats-title">Clients</h6>
                                    </div>
                                    <h3 class="info-title">562</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="text-align:center;">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i style="font-size:25px;" class="fa-solid fa-list-check"></i>
                                        <h6 class="stats-title">Requêtes</h6>
                                    </div>
                                    <h3 class="info-title">353</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view("admin/footer", $data); ?>	