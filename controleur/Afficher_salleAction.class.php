<?php
require_once('controleur/Action.interface.php');

class Afficher_salleAction implements Action
{
    public function execute()
    {
        if (isset($_REQUEST['salleId'])) {
            $salle = SalleDAO::findById($_REQUEST['salleId']);
            if ($salle != null) {
                $_SESSION['salle'] = serialize($salle);
                return "afficher_salle";
            } else {
                $_SESSION['msg']['err_erreur'] = "Page introuvable!";
                return "erreur";
            }
        } else {
            return "default";
        }
    }
}

