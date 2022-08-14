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
                                    <table class="table table-striped" id="table_id" style="width:100%;">
                                        <thead class=" text-primary" style="font-size:20px;">
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Sujet</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th class="text-right">Action</th>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($messages) && is_array($messages)):?>
                                            <?php foreach($messages as $message):?>
                                                <tr>
                                                    <td >
                                                        <?= $message->id_contact ?>
                                                    </td>
                                                    <td >
                                                        <?= $message->name_contact ?>
                                                    </td>
                                                    <td >
                                                        <?= $message->email_contact ?>
                                                    </td>
                                                    <td >
                                                        <?= $message->phone_contact ?>
                                                    </td>
                                                    <td >
                                                        <?= $message->subject_contact ?>
                                                    </td>
                                                    <td >
                                                        <?= $message->message_contact ?>
                                                    </td>
                                                    <td >
                                                        <?= date("d/m/Y h\Hi",strtotime($message->date_contact))?>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="<?=ROOT?>admin/messages?delete=<?=$message->id_contact?>" class="btn btn-round btn-danger btn-icon btn-sm"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <p class="status alert alert-danger">Pas encore de messages enregistrés.</p>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php elseif($mode == "delete"): ?>
                        <div class="card-header" style=display:flex;justify-content:space-between;>
                            <h5 class="title">Supprimer un message</h5>
                            <a href="<?=ROOT?>admin/messages" style="cursor:pointer;"><i style="font-size:20px;" class="fa-solid fa-xmark"></i></a>
                        </div>    
                        <div class="table-responsive">
                                <table class="table table-striped">
                                <thead class=" text-primary" style="font-size:20px;">
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Sujet</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                    <p class="status alert alert-danger">Etes-vous sur de vouloir supprimer ce message ? </p>
                                    <tr style="position:relative;">
                                        <td><?= $messages->id_contact ?></td>
                                        <td><?= $messages->name_contact ?></td>
                                        <td><?= $messages->email_contact ?></td>
                                        <td><?= $messages->phone_contact ?></td>
                                        <td><?= $messages->subject_contact ?></td>
                                        <td><?= $messages->message_contact ?></td>
                                        <td><?= date("d/m/Y h\Hi",strtotime($messages->date_contact)) ?></td>
                                    </tr>
                                    <a href="<?=ROOT?>admin/messages?delete_confirmed=<?=$messages->id_contact?>">
                                        <input class="btn-custom btn-primary-custom" value="Supprimer"/>
                                    </a>
                                    <a href="<?=ROOT?>admin/messages">
                                        <input class="btn-custom btn-primary-custom" value="Annuler"/>
                                    </a>
                                </tbody>
                            </table>
                        </div>
                        <?php elseif($mode == "delete_confirmed"): ?>
                            <p class="status alert alert-success">Le message a bien était supprimé</p>
                            <a href="<?=ROOT?>admin/messages">
                                <input class="btn-custom btn-primary-custom" value="Retour"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view("admin/footer", $data); ?>   