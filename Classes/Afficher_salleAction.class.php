<?php
require_once('controleur/Action.interface.php');

class Afficher_salleAction implements Action
{
    public function execute()
    {
        return "afficher_salle";
    }
}