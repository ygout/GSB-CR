<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center"><?= $this->nettoyer($praticien['libTypePraticien']) ?></h2>
    <div class="well">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nom</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['nomPraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Prénom</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['prenomPraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Adresse</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['adressePraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">CP</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['cpPraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ville</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['villePraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Coefficient de notoriété</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['coefNotoriete']) ?></p>
                </div>
            </div>
        </form>
    </div>    
</div>

