<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('./Classes/SalleDAO.class.php');
require_once('./controleur/Action.interface.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');

class Salle_optionAction implements Action
{
    public function execute()
    {
        /*
        $salleId = $_SESSION["salleId"];
        */
        return "salle_option";
    }
}
