<?php
include_once('./Classes/User.class.php');
include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Controleur/Action.interface.php');

class DeconnexionAction implements Action
{
    public function execute()
    {
        session_destroy();
        session_start();
        $_SESSION['msg'] = "deconnexion reussi";

        return "connexion";
    }
}
