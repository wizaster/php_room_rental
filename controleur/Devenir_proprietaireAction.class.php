<?php
require_once('controleur/Action.interface.php');

class Devenir_proprietaireAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) {
            return "connexion";
        }
        if ($_SESSION['role'] > 1) {
            return "profil";
        }
        
        return "devenir_proprietaire";
    }
}
