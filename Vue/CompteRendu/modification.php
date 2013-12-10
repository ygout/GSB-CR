<?php $this->titre = "Comptes-rendus"; ?>

<?php
$menuComptesRendus = true;
require 'Vue/_Commun/navigation.php';
?>
<div class="container">

    <h2 class="text-center">

        Modification d'un compte-rendu de visite

    </h2>
    <div class="well">
        <form class="form-horizontal" method="post" action="compterendu/modifier/<?=$this->nettoyer($compteRendu['idRapport'])?>" role="form">
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Date</label>
                <div class="col-sm-7">
                    <p class="form-control-static"><?=$this->nettoyer($compteRendu['dateRapport'])?></p>
                </div>
              
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Praticien</label>
                <div class="col-sm-7">
                    <p class="form-control-static"><?=$this->nettoyer($compteRendu['nomPraticien'])?> <?=$this->nettoyer($compteRendu['prenomPraticien'])?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Motif</label>
                <div class="col-sm-5 col-md-4">
                    <textarea name="motif" class="form-control" rows="2" required="" autofocus=""><?=$this->nettoyer($compteRendu['motif'])?></textarea>
                </div>
            </div>
          <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Bilan</label>
                <div class="col-sm-5 col-md-4">
                    <textarea name="bilan" class="form-control" rows="4" required=""><?=$this->nettoyer($compteRendu['bilan'])?></textarea>
                </div>
            </div>
            <div class="form-group">
              <div class="form-group">
                <div class="col-sm-6 col-sm-offset-5">
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-edit"></span> Mettre à jour</button>
                </div>
            </div>
            </div>
        </form>
    </div>

</div>