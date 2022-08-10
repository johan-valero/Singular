<?php $this->view("admin/header", $data); ?>
<?php $this->view("admin/sidebar", $data); ?>

<div class="panel-header panel-header-sm">
    </div>
    <div class="content" style="background-color:#f8f5f0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php if($mode == "read"): ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class=" text-primary" style="font-size:20px;">
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Rang</th>
                                            <th class="text-right">Date d'inscription</th>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($clients)):?>
                                            <?php foreach($clients as $client):?>
                                                <tr>
                                                    <td >
                                                        <?= $client->id_user ?>
                                                    </td>
                                                    <td >
                                                        <?= $client->name_user.' '.$client->firstname_user ?>
                                                    </td>
                                                    <td >
                                                        <?= $client->email_user ?>
                                                    </td>
                                                    <td >
                                                        <?= $client->phone_user ?>
                                                    </td>
                                                    <td >
                                                        <?= $client->rank_user ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?= date("j/m/Y",strtotime($client->date_user))?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("admin/footer", $data); ?>   