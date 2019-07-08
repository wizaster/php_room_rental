<?php
require_once('controleur/Action.interface.php');

class Afficher_utilisateursAction implements Action
{
    public function execute()
    {
        if (isset($_SESSION['role'])) {
            return $_SESSION['role'] == 3 ? "utilisateurs" : "erreur";
        } else {
            return "erreur";
        }
    }
}
