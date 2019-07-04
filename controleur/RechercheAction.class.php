<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
require_once('./Classes/Database.class.php');
require_once('./Classes/SalleDAO.class.php');
require_once('./controleur/Action.interface.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');

class RechercheAction implements Action
{
    public function execute()
    {
        echo "alalalalalalalalalalalalal<br><br><br><br><br><br>";
        if ((isset($_REQUEST['main_recherche']) && !empty($_REQUEST['main_recherche']))) {
            $lieu = $_REQUEST['main_recherche_lieu'];
            $terme = $_REQUEST['main_recherche'];
            var_dump($terme);
            var_dump($lieu);
            $salles = "oops";
            $termes = preg_split("/[\s,]/", $terme);
            var_dump("termes : " . $termes[0]);
            if (count($termes) == 1) {
                $salles = SalleDAO::findByAnything($termes, $lieu);
                $equipements = EquipementDAO::findByAnything($termes);
                $accessibilite = AccessibiliteDAO::findByAnything($termes);
                if ($equipements != null) {
                    foreach ($equipements as $equip) {
                        $res = SalleDAO::findById($equip->getSalleId());
                        if ($res->getVille() == $lieu) {
                            $salles += $res;
                        }
                    }
                }
                if ($accessibilite != null) {
                    foreach ($accessibilite as $access) {
                        $res = SalleDAO::findById($access->getSalleId());
                        if ($res->getVille() == $lieu) {
                            $salles += $res;
                        }
                    }
                }
            }
            var_dump($salles);
            $_SESSION['recherche'] = $salles;


        }
        return "default";

    }
}