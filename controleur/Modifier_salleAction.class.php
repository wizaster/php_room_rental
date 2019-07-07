<?php
require_once('controleur/Action.interface.php');
include_once('Classes/Salle.class.php');

class Modifier_salleAction implements Action
{
    public function execute()
    {
        $thisSalle = SalleDAO::findById($_REQUEST['salleId']);
        //var_dump($thisSalle);
        
        if (isset($thisSalle)) {
            $_SESSION['salleEdit'] = serialize($thisSalle);
            //var_dump($_SESSION['salleEdit']);
            $_SESSION['salleEditAccessibilite'] = SalleHasAccessibiliteDAO::getAllAccessOfSalle($_REQUEST['salleId']);
            $_SESSION['salleEditEquipement'] = SalleHasEquipementDAO::getAllEquipmentOfSalle($_REQUEST['salleId']);
            
            return "modifier_salle";
        } else {
            return "erreur";
        }
    }
}