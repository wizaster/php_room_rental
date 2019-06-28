<?php
require_once('controleur/Action.interface.php');

class Ajouter_salleAction implements Action
{
    public function execute()
    {
        if (ISSET($_SESSION["connecte"])) {
            if ($_SESSION["role"] != 2) {
                $_SESSION['msg'] = "Veuillez vous connecter a un compte proprietaire pour avoir acces a cette fonction";
                return "connexion";
            } else {
                return "ajouter_salle";
            }
        } else
            return "connexion";
    }
}