<?php

require_once('./controleur/Action.interface.php');
require_once('./Classes/Location.class.php');
require_once('./Classes/Salle.class.php');
require_once('./controleur/RechercheAction.class.php');

class Supprimer_salleAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) {
            return "connexion";
        }
        if ($_SESSION['role'] == 1) {
            return "devenir_proprietaire";
        }

        if (ISSET($_REQUEST['salleId']) && SalleDAO::matchesWithProp($_REQUEST['salleId'],$_SESSION['id'])) {
            
            $locsInSalle = LocationDAO::findSalleId($_REQUEST['salleId']);
            foreach ($locsInSalle as $location) {
                LocationDao::delete($location->getId());
            }
            
            SalleHasAccessibiliteDAO::deleteAllOfSalle($_REQUEST['salleId']);
            SalleHasEquipementDAO::deleteAllOfSalle($_REQUEST['salleId']);
            SalleDAO::delete($_REQUEST['salleId']);
            
            $backToYourSalles = new RechercheAction();
            return $backToYourSalles->execute();
        }
        return "erreur";
    }
}
