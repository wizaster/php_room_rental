<?php
include_once('./controleur/Action.interface.php');

class Reserver_salleAction implements Action
{
    public function execute()
    {
        if (isset($_SESSION['connecte'])) {
            return "reserver_salle";
        } else {
            return "connexion";
        }
    }
}