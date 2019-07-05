<?php
include_once('./Controleur/Action.interface.php');

class Afficher_profilAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) return "connexion";
        
        
        date_default_timezone_set('America/New_York');
        $username = $_SESSION['connecte'];
        $user = UserDAO::findByUsername($username);

        $_SESSION['role'] = $user->getTypeutilisateurId();
        $_SESSION['user']['nom'] = $user->getNom();
        $_SESSION['user']['prenom'] = $user->getPrenom();
        $_SESSION['user']['email'] = $user->getEmail();
        $_SESSION['user']['adresse'] = $user->getAdresse();
        $_SESSION['user']['bio'] = $user->getDescription();
        $date = $user->getUserSince();
        $date = date("d/m/Y", strtotime($date));
        $_SESSION['user']['membreDepuis'] = $date;

        return "profil";
    }
}


