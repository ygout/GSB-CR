<?php

require_once 'Framework/Controleur.php';

// Contrôleur de l'accueil
class ControleurAccueil extends Controleur {

    // Affiche la page d'accueil
    public function index() {
        $this->genererVue();
    }
    
}