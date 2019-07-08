<?php
require_once('./Classes/Database.class.php');
require_once('./Classes/SalleDAO.class.php');
require_once('./controleur/Action.interface.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');

class FiltrerAction implements Action
{
    public function execute()
    {
        $list = array();
        if (isset($_REQUEST['filtre_accessibilite'])) {
            $listeAccess = SalleHasAccessibiliteDAO::getSalleId($_REQUEST['filtre_accessibilite']);
            $vraiListeA = array();
            foreach ($listeAccess as $access) {
                array_push($vraiListeA, $access->getSalleId());
            }
            $list[] = $vraiListeA;
        }

        if (isset($_REQUEST['filtre_equipement'])) {
            $listeEquip = SalleHasEquipementDAO::getSalleId($_REQUEST['filtre_equipement']);
            $vraiListeE = array();
            foreach ($listeEquip as $equip) {
                array_push($vraiListeE, $equip->getSalleId());
            }
            $list[] = $vraiListeE;
        }

        if (isset($_REQUEST['filtre_lieu'])) {
            $listeVille = SalleDAO::findByVille($_REQUEST['filtre_lieu']);
            $vraiListeV = array();
            foreach ($listeVille as $ville) {
                array_push($vraiListeV, $ville->getId());
            }
            $list[] = $vraiListeV;
        }
        if (count($list) == 2) {
            $intersect = array_intersect((array)$list[0], (array)$list[1]);
        } elseif (count($list) == 3) {
            $intersect = array_intersect((array)$list[0], (array)$list[1], (array)$list[2]);
        } else {
            $intersect = $list[0];
        }
        $_SESSION['recherche'] = $intersect;
        return "afficher_salles";
    }
}
