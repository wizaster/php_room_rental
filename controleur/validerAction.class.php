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
include_once('./Classes/Image.class.php');
include_once('./Classes/ImageDAO.class.php');

class validerAction implements Action
{
    public function execute()
    {
        // TODO: Implement execute() method.
    }
}
