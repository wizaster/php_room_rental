<?php
include_once('./Classes/User.class.php');
include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Controleur/Action.interface.php');

class DeconnexionAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) {
            $_SESSION['msg']['err_connection'] = "Connectez vous avant de vous déconnecter";
            return "connexion";
        }

        session_destroy();
        session_start();
        $_SESSION['msg']['succ_deconnection'] = "Deconnexion reussie";

        return "connexion";
    }
}
