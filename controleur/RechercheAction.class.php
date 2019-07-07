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
        $terme = '';
        $lieu = '';
        $salles = array();
        if(isset($_REQUEST['main_recherche']) && isset($_REQUEST['main_recherche_lieu'])) {
            $terme = $_REQUEST['main_recherche'];
            $lieu = $_REQUEST['main_recherche_lieu'];
        } elseif (isset($_REQUEST['vos_salles'])) {
            $salles = SalleDAO::findByIdProp($_SESSION['id']);
            if (empty($salles)) {
                $_SESSION['msg'] = "Vous n'avez pas de salles!";
                return "profil";
            } else {
                $_SESSION['recherche'] = $salles;
                return "afficher_salles";
            }
        }
        if ($terme == '' && isset($_REQUEST['main_recherche_lieu'])) {
            $salles = SalleDAO::findByVille($lieu);
        } elseif ($terme == '' && $lieu == '') {
            unset($_SESSION['recherche']);
            return "afficher_salles";
        } else {
            $termes = preg_split("/[\s,]/", $terme);
            if (count($termes) == 1) {
                $salles = SalleDAO::findByAnything();
                $equipements = EquipementDAO::findByAnything($termes);
                $accessibilite = AccessibiliteDAO::findByAnything($termes);
                if ($equipements != null) {
                    foreach ($equipements as $equip) {
                        $resid = SalleHasEquipementDAO::getSalleId($equip[0]);
                        $res = SalleDAO::findById($$resid);
                        if ($res->getVille() == $lieu) {
                            array_push($salles, $res);
                        }
                    }
                }
                if ($accessibilite != null) {
                    foreach ($accessibilite as $access) {
                        $resid = SalleHasAccessibiliteDAO::getSalleId($access[0]);
                        foreach ($resid as $sId) {
                            $res = SalleDAO::findById($sId);
                            if ($res->getVille() === $lieu) {
                                array_push($salles, $res);
                            }
                        }
                    }
                }
            }
        }
        $_SESSION['recherche'] = $salles;
        return "afficher_salles";
    }
}