<?php

require_once 'ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Compterendu.php';
require_once 'Modele/Praticien.php';

/**
 * Contrôleur des actions liées aux rapports visites
 *
 * @author Baptiste Pesquet
 */
class ControleurCompteRendu extends ControleurSecurise {

    private $compteRendu;
    private $praticien;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->compteRendu = new Compterendu();
        $this->praticien = new Praticien();
    }

    public function index() {
        $comptesRendus = $this->compteRendu->getComptesRendus($this->requete->getSession()->getAttribut("idVisiteur"));
        $this->genererVue(array('comptesRendus' => $comptesRendus), "index");
    }

    public function ajout() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    public function ajouter() {
        if ($this->requete->existeParametre('idPraticien') && $this->requete->existeParametre('date') && $this->requete->existeParametre('motif') && $this->requete->existeParametre('bilan')) {
            $compteRendu = $this->compteRendu->ajouterCompteRendu($this->requete->getParametre('idPraticien'), $this->requete->getSession()->getAttribut("idVisiteur"), $this->requete->getParametre('date'), $this->requete->getParametre('bilan'), $this->requete->getParametre('motif'));
            $message = "Le compte-rendu a été ajouté avec succès";
        }
        else
            $message = "Echec de l'ajout";
        $this->genererVue(array('message' => $message));
    }

    public function supprimer() {

        $idCompteRendu = $this->requete->getParametre("id");
        $supprimerCompterendu = $this->compteRendu->supprimerCompterendu($idCompteRendu);
       
    
                
               
        $this->rediriger("compterendu");
    }

    public function modifier() {

        $idCompteRendu = $this->requete->getParametre("id");
        if ($this->requete->existeParametre("motif") && $this->requete->existeParametre("bilan")) {
            $compteRendu = $this->compteRendu->modifierCompteRendu($this->requete->getParametre("bilan"), $this->requete->getParametre("motif"), $idCompteRendu);
            $message = "Le compte-rendu a été modifié avec succès";
        }
        else
            $message = "Echec de la modification";
        $this->genererVue(array('message' => $message));
    }
    public function modification(){
        $idCompteRendu = $this->requete->getParametre("id");
        $compteRendu=$this->compteRendu->getCompteRendu($idCompteRendu);
        $this->genererVue(array('compteRendu' => $compteRendu));
    }

}
