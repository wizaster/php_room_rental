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
include_once('./Classes/SalleHasAccessibilite.class.php');
include_once('./Classes/SalleHasAccessibiliteDAO.class.php');
include_once('./Classes/SalleHasEquipement.class.php');
include_once('./Classes/SalleHasEquipementDAO.class.php');

class validerAction implements Action
{
    public function execute()
    {
        $seDao = new SalleHasEquipementDAO();
        $saDao = new SalleHasAccessibiliteDAO();
        $equipArr = $_REQUEST['equipSalle'];
        $accessArr = $_REQUEST['accessSalle'];
        $salleId = $_SESSION['salleId'];
        foreach ($equipArr as $equip) {
            $sEquip = new SalleHasEquipement($salleId, $equip);
            $seDao->create($sEquip);
        }
        foreach ($accessArr as $access) {
            $sAccess = new SalleHasAccessibilite($salleId, $access);
            $saDao->create($sAccess);
        }
        return "default";

    }
}
