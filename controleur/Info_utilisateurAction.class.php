<?php
require_once('controleur/Action.interface.php');

class Info_utilisateurAction implements Action
{
    public function execute()
    {
        date_default_timezone_set('America/New_York');
        $username = $_SESSION['connecte'];
        $user = UserDAO::findByUsername($username);

        $_SESSION['user']['id'] = $user->getId();
        $_SESSION['user']['usr'] = $user->getNomUtilisateur();
        $_SESSION['user']['psw'] = $user->getPassword();
        $_SESSION['user']['nom'] = $user->getNom();
        $_SESSION['user']['prenom'] = $user->getPrenom();
        $_SESSION['user']['email'] = $user->getEmail();
        $_SESSION['user']['adresse'] = $user->getAdresse();
        $_SESSION['user']['desc'] = $user->getDescription();

        $date = $user->getUserSince();
        $date = date("d/m/Y", strtotime($date));
        $_SESSION['user']['membreDepuis'] = $date;


        return "info_utilisateur";
    }
}
