<?php
require_once('controleur/Action.interface.php');

class Location_reussiAction implements Action
{
    public function execute()
    {

        $location = unserialize($_SESSION['nouvelLocation']);
        $n = LocationDAO::create($location);
        if ($n = 1) {
            $_SESSION['succes_msg'] = "La salle est reserver! Vous trouverez toutes 
                les informations pertinentes dans votre historique de location!";
            return "profil";
        } else {
            return "erreur";
        }
    }
}
