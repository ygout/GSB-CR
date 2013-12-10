<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un utilisateur du blog
 *
 * @author Baptiste Pesquet
 */
class Visiteur extends Modele {

    /**
     * Vérifie qu'un visiteur existe dans la BD
     * 
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "select id_visiteur as idVisiteur from visiteur where login_visiteur=? and pwd_visiteur=?";
        $visiteur = $this->executerRequete($sql, array($login, $mdp));
        return ($visiteur->rowCount() == 1);
    }

    /**
     * Renvoie un visiteur existant dans la BD
     * 
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getVisiteur($login, $mdp)
    {
        $sql = "select id_visiteur as idVisiteur, login_visiteur as login, pwd_visiteur as mdp 
            from visiteur where login_visiteur=? and pwd_visiteur=?";
        $visiteur = $this->executerRequete($sql, array($login, $mdp));
        if ($visiteur->rowCount() == 1)
            return $visiteur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun visiteur ne correspond aux identifiants fournis");
    }

}

