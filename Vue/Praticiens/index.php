<?php $this->titre = "Praticiens"; ?>

<?php
  $menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Liste des praticienss</h2>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Type</th>
                    <th>Ville</th>
                </tr>
            </thead>
            <?php foreach ($praticiens as $praticien): ?>
                <tr>
                    <td><a href="praticiens/details/<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nomPraticien'])?></a></td>
                    <td><?= $this->nettoyer($praticien['prenomPraticien']) ?></td>
                    <td><?= $this->nettoyer($praticien['libTypePraticien']) ?></td>
                    <td><?= $this->nettoyer($praticien['villePraticien']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

