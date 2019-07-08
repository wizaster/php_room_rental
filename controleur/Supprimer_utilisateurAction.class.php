<?php

require_once('./controleur/Action.interface.php');
require_once('./Classes/Location.class.php');
include_once('./Classes/Salle.class.php');

class Supprimer_utilisateurAction implements Action
{
    public function execute()
    {
        if (isset($_SESSION['role']) && isset($_REQUEST['userId'])) {
            if ($_SESSION['role'] == 3) {
                
                // Effacer les salles de l'utilisateur
                $usersSalles = SalleDAO::findByIdProp($_REQUEST['userId']);
                foreach ($usersSalles as $salle) {
                    // Effacer les locations de chaque salle
                    $locsInSalle = LocationDAO::findSalleId($salle->getId());
                    foreach ($locsInSalle as $location) {
                        LocationDao::delete($location->getId());
                    }
                    
                    SalleHasAccessibiliteDAO::deleteAllOfSalle($salle->getId());
                    SalleHasEquipementDAO::deleteAllOfSalle($salle->getId());
                    SalleDAO::delete($salle->getId());
                }
                
                // Effacer les locations de l'utilisateur
                $usersLocations = LocationDAO::findLocateurId($_REQUEST['userId']);
                foreach ($usersLocations as $location) {
                    LocationDAO::delete($location->getId());
                }
                
                // Effacer l'utilisateur
                UserDAO::delete($_REQUEST['userId']);
                return "utilisateurs";
            }
        }
        return "erreur";
    }
}
