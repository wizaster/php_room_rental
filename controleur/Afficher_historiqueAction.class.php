<?php
require_once('controleur/Action.interface.php');
include_once('Classes/User.class.php');

class Afficher_historiqueAction implements Action
{
    public function execute()
    {
        $thisUser = UserDAO::findByUsername($_SESSION['connecte']);
        $locations = LocationDAO::findLocateurId($thisUser->getId());
        if ($thisUser->getTypeutilisateurId() == 2) {
            $salles = SalleDAO::findByIdProp($thisUser->getId());
            if (isset($salles)) {
                foreach ($salles as $salle) {
                    $id = $salle->getId();
                    $sallesLocations = LocationDAO::findDatesBySalleId($id);
                    $_SESSION['sallesLocation'][$salle->getId()] = serialize($sallesLocations);
                }
            }
        }


        $_SESSION['locations'] = serialize($locations);

        return "afficher_historique";
    }
}