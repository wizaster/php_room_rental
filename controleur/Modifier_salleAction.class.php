<?php
require_once('controleur/Action.interface.php');

class Modifier_salleAction implements Action
{
    public function execute()
    {
        $_SESSION['salleEdit'] = SalleDAO::findById($_REQUEST['salleId']);
        
        if (isset($_SESSION['salleEdit'])) {
            $_SESSION['salleEditAccessibilite'] = SalleHasAccessibiliteDAO::getAllAccessOfSalle($_REQUEST['salleId']);
            $_SESSION['salleEditEquipement'] = SalleHasEquipementDAO::getAllEquipmentOfSalle($_REQUEST['salleId']);
            foreach ($_SESSION['salleEditEquipement'] as $wut) {
                echo $wut;
            }
            return "modifier_salle";
        } else {
            return "erreur";
        }
    }
}