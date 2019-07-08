<?php
include_once('./Controleur/Action.interface.php');

class Afficher_profilAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) {
            return "connexion";
        }
        $username = $_SESSION['connecte'];
        $user = UserDAO::findByUsername($username);
        $user->setSessionUser();
        return "profil";
    }
}


