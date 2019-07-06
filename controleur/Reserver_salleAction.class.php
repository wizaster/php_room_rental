<?php
include_once('./controleur/Action.interface.php');
require_once('./Classes/LocationDAO.class.php');
class Reserver_salleAction implements Action
{
    public function execute()
    {
        if (isset($_SESSION['connecte'])) {
            if (isset($_REQUEST['salleId'])) {
                $_SESSION['salleId'] = $_REQUEST['salleId'];
                return "reserver_salle";
            } else {
                return "afficher_salles";
            }
        } else {
            return "connexion";
        }
    }
}

