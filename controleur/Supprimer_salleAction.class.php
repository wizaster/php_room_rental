<?php

require_once('./controleur/Action.interface.php');
require_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleHasAccessibiliteDAO.class.php');
include_once('./Classes/SalleHasEquipementDAO.class.php');
include_once('./controleur/RechercheAction.class.php');

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
            
            SalleHasAccessibiliteDAO::deleteAllOfSalle($_REQUEST['salleId']);
            SalleHasEquipementDAO::deleteAllOfSalle($_REQUEST['salleId']);
            SalleDAO::delete($_REQUEST['salleId']);
            
            $backToYourSalles = new RechercheAction();
            return $backToYourSalles->execute();
        }
        return "erreur";
    }
}
