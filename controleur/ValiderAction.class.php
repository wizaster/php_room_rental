<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
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
include_once('./controleur/ImageAction.class.php');

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
        if ($_FILES['uploadImage1']['name'] != '') {
            ImageAction::addImage('uploadImage1');
        }
        if ($_FILES['uploadImage2']['name'] != '') {
            ImageAction::addImage('uploadImage2');
        }
        if ($_FILES['uploadImage3']['name'] != '') {
            ImageAction::addImage('uploadImage3');
        }
        if ($_FILES['uploadImage4']['name'] != '') {
            ImageAction::addImage('uploadImage4');
        }
        if ($_FILES['uploadImage5']['name'] != '') {
            ImageAction::addImage('uploadImage5');
        }

        return "default";

    }
}
