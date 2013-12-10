<?php

require_once 'Framework/Modele.php';

// Services métier liés aux type de praticiens 

class TypePraticien extends Modele {
    
// Morceau de requête SQL 
private $sqlTypePraticien="SELECT id_type_praticien as idTypePraticien,code_type_praticien as codeTypePraticien,lib_type_praticien as libTypePraticien,lieu_type_praticien as lieuTypePraticien FROM type_praticien ";

// Renvoie la liste de tous les types de  praticiens
public function getTypesPraticien() {
        $sql = $this->sqlTypePraticien . ' order by libTypePraticien';
        $typesPraticien = $this->executerRequete($sql);
        return $typesPraticien;
    }
}
?>
