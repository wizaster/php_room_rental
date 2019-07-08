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
        if (isset($_REQUEST['filtre_accessibilite'])) {
            $listeAccess = SalleHasAccessibiliteDAO::getSalleId($_REQUEST['filtre_accessibilite']);
        }
        if (isset($_REQUEST['filtre_equipement'])) {
            $listeEquip = SalleHasEquipementDAO::getSalleId($_REQUEST['filtre_equipement']);
        }
        if (isset($_REQUEST['filtre_lieu'])) {
            $listeVille = SalleDAO::findByVille($_REQUEST['filtre_lieu']);
        }
        $listeGlobal = array();
        if (isset($listeVille)) {
            foreach ($listeVille as $ville) {
                if (isset($listeEquip)) {
                    foreach ($listeEquip as $equip) {
                        if (isset($listeAccess)) {
                            foreach ($listeAccess as $access) {
                                if ($equip == $access) {
                                    array_push($listeGlobal, $access);
                                    $_SESSION['recherche'] = $listeGlobal;
                                    return "afficher_salles";
                                }
                            }
                        } elseif ($ville == $equip) {
                            array_push($listeGlobal, $equip);
                            $_SESSION['recherche'] = $listeGlobal;
                            return "afficher_salles";
                        }
                    }

                } else {
                    $_SESSION['recherche'] = $listeVille;
                    return "afficher_salles";
                }
            }

        }
        if (isset($listeEquip)) {
            foreach ($listeEquip as $equip) {
                if (isset($listeVille)) {
                    foreach ($listeVille as $ville) {
                        if (isset($listeAccess)) {
                            foreach ($listeAccess as $access) {
                                if ($ville == $access) {
                                    array_push($listeGlobal, $access);
                                    $_SESSION['recherche'] = $listeGlobal;
                                    return "afficher_salles";
                                }
                            }
                        } elseif ($ville == $equip) {
                            array_push($listeGlobal, $equip);
                            $_SESSION['recherche'] = $listeGlobal;
                            return "afficher_salles";
                        }
                    }

                } else {
                    $_SESSION['recherche'] = $equip;
                    return "afficher_salles";
                }
            }

        }
        if (isset($listeAccess)) {
            foreach ($listeAccess as $access) {
                if (isset($listeEquip)) {
                    foreach ($listeEquip as $equip) {
                        if (isset($listeAccess)) {
                            foreach ($listeVille as $ville) {
                                if ($equip == $ville) {
                                    array_push($listeGlobal, $ville);
                                    $_SESSION['recherche'] = $listeGlobal;
                                    return "afficher_salles";
                                }
                            }
                        } elseif ($access == $equip) {
                            array_push($listeGlobal, $equip);
                            $_SESSION['recherche'] = $listeGlobal;
                            return "afficher_salles";
                        }
                    }

                } else {
                    $_SESSION['recherche'] = $access;
                    return "afficher_salles";
                }
            }

        }
        return "afficher_salles";
    }
}
