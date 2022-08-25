<?php $this->view("header", $data); ?>

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" style="background-color:#222;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h5>Singular</h5>
                    <h1>Récapitulatif de la réservation</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Post -->
    <?php if(isset($_SESSION['POST_DATA'])):?>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div>
                    <table>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="text">
                                                <h4>Veuillez-vérifiez les informations relatives à votre réservation.</h4>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <table width="100%">
                                <tr>
                                    <th>Logement</th>
                                    <th>Prix</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <img src="<?=ROOT.$_SESSION['details']->img_room?>" alt="" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px;">
                                            <div class="text">
                                                <h3><?=$_SESSION['details']->name_room?></h3>
                                                <span>Réservation du <b><?=date("d/m/Y", strtotime($_SESSION['POST_DATA']['checkin']))?></b> au <b><?=date("d/m/Y", strtotime($_SESSION['POST_DATA']['checkout']))?></b> (<?=$_SESSION['days']?> nuits)</span>
                                                <p>Pour <?=$_SESSION['POST_DATA']['persons']?> personnes</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span style="font-size: 20px;"><?=$_SESSION['details']->price_room?>€/nuits</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Informations personnelles</th>
                                    <th>TOTAL</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="text">
                                                <span>Nom : <?=$_SESSION['POST_DATA']['firstname']." ".$_SESSION['POST_DATA']['name']?></span><br>
                                                <span>Téléphone : <?=$_SESSION['POST_DATA']['phone']?></span><br>
                                                <span>Email : <?=$_SESSION['POST_DATA']['email']?></span><br>
                                                <p>Date de naissance : <?=date("d/m/Y", strtotime($_SESSION['POST_DATA']['birthday']))?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span style="font-size: 20px;"><?=$_SESSION['total']?>€</span>
                                    </td>
                                </tr>
                            </table>
                        </tr>
                        <tr>
                            <td>
                                <!-- <div style="display:flex;justify-content:space-between;"> -->
                                    <form method="POST">
                                        <input type="submit" class="btn-custom btn-primary-custom" value="Valider votre réservation">
                                    </form>
                                    <a href="javascript:history.go(-1)"><button style="font-family:Gilda Display;" class="btn-custom btn-primary-custom">Annuler</button></a>
                                <!-- </div> -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
    <section>
        <div class="container">
            <div class="row">
            <div class="text">
                    <h4>Pas de résultat disponible pour cette réservation.</h4>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

<?php $this->view("footer", $data); ?>