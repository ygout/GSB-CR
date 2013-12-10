<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';
require_once 'ControleurSecurise.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends ControleurSecurise {

    // Objet modèle Médicament
    private $praticien;
    private $typePraticien;

    public function __construct() {
        $this->praticien = new Praticien();
        $this ->typePraticien = new TypePraticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        
        $this->genererVue(array('praticiens' => $praticiens),"index");
    }

    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens();
         $typesPraticien = $this->typePraticien->getTypesPraticien();
        $this->genererVue(array('praticiens' => $praticiens,'typesPraticien' => $typesPraticien));
    }

    // Affiche le résultat de la recherche de praticien par rapport au type
    public function resultats() {
        if ($this->requete->existeParametre("idType")) {
            
            $idTypePraticien = $this->requete->getParametre("idType");
            
            $this->index($idTypePraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
     // Affiche le résultat de la recherche de praticien
      public function resultat() {
        if ($this->requete->existeParametre("id")) {
            
            $idPraticien = $this->requete->getParametre("id");
            
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }
    

}