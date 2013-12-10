<?php

require_once 'Framework/Modele.php';

// Services métier liés aux rapports visites 
class CompteRendu extends Modele {

   
    //Ajoute un rapport_visite
    public function ajouterCompteRendu($idPraticien, $idVisiteur, $dateRapport, $bilan,$motif) {
        
        $sql = 'insert into rapport_visite (id_praticien, id_visiteur, date_rapport, bilan,motif)'
            . ' values(?, ?, ?, ?, ?)';
        
        $this->executerRequete($sql, array($idPraticien, $idVisiteur, $dateRapport, $bilan,$motif));
    }
    
    public function getComptesRendus($idVisiteur)
    {
        $sql='select id_rapport as idRapport ,RP.id_praticien as idPraticien ,id_visiteur as idVisiteur ,date_rapport as dateRapport ,bilan,motif,nom_praticien as nomPraticien , prenom_praticien as prenomPraticien , ville_praticien as villePraticien from rapport_visite RP  join praticien P on RP.id_praticien = P.id_praticien where id_visiteur =? ';
        $comptesRendus=$this->executerRequete($sql, array($idVisiteur));
         if ($comptesRendus->rowCount() >=1)
            return $comptesRendus;  // Accès à la première ligne de résultat
        else
            throw new Exception("Vous n'avez saisi aucun compte-rendu de visite. ");
       
       
    }
    
    public function supprimerCompteRendu($idCompteRendu)
    {
        $sql="DELETE FROM rapport_visite  WHERE id_rapport = ?";
        $this->executerRequete($sql, array($idCompteRendu));
    }
    public function getCompteRendu($idCompteRendu)
    {
        $sql="select id_rapport as idRapport ,RP.id_praticien as idPraticien ,id_visiteur as idVisiteur ,date_rapport as dateRapport ,bilan,motif,nom_praticien as nomPraticien , prenom_praticien as prenomPraticien , ville_praticien as villePraticien from rapport_visite RP  join praticien P on RP.id_praticien = P.id_praticien where id_rapport = ? ";
         $compteRendu=$this->executerRequete($sql, array($idCompteRendu));
         return $compteRendu->fetch();
    }
    
    public function modifierCompteRendu($bilan,$motif,$idCompteRendu)
    {
        $sql="UPDATE  rapport_visite SET bilan =? , motif = ? WHERE id_rapport = ?";
        

        $this->executerRequete($sql, array( $bilan,$motif,$idCompteRendu));
    }

   
  

}
