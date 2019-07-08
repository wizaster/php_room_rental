<?php

require_once('./controleur/Action.interface.php');
require_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');
include_once('./Classes/SalleHasAccessibilite.class.php');
include_once('./Classes/SalleHasAccessibiliteDAO.class.php');
include_once('./Classes/SalleHasEquipement.class.php');
include_once('./Classes/SalleHasEquipementDAO.class.php');
include_once('./Classes/Image.class.php');
include_once('./Classes/ImageDAO.class.php');
include_once('./controleur/ImageAction.class.php');

class Enregistrer_modifier_salleAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) {
            return "connexion";
        }
        if ($_SESSION['role'] == 1) {
            return "devenir_proprietaire";
        }

        if (ISSET($_REQUEST['salleId']) && SalleDAO::matchesWithProp($_REQUEST['salleId'],$_SESSION['id'])) {

            $titre = $_REQUEST['titre'];
            $superficie = (int)$_REQUEST['superficieRoom'];
            $capacite = (int)$_REQUEST['capaciteRoom'];
            $desc = $_REQUEST['description_room'];
            $prix = $_REQUEST['prix_jour'];
            $proprio = $_SESSION["id"];
            $code_postal = $_REQUEST['codePostal_room'];
            $pays = $_REQUEST['pays_room'];
            $province = $_REQUEST['province_room'];
            $ville = $_REQUEST['ville_room'];
            $noCivique = $_REQUEST['noCivique'];
            $appt_suite = $_REQUEST['local_room'];
            $rue = $_REQUEST['rue_room'];

            $salle = new Salle(0, $titre, $superficie, $capacite, $desc, 'x', $prix, $noCivique, $appt_suite, $rue, $code_postal, $ville, $province, $pays, "", $proprio);
            $salle->setId($_REQUEST['salleId']);
            
            SalleDAO::update($salle);
            
            if (isset($_REQUEST['equipSalle'])) {
                $equipArr = $_REQUEST['equipSalle'];
                SalleHasEquipementDAO::deleteAllOfSalle($salle->getId());
                
                if ($equipArr > 0) {
                    foreach ($equipArr as $equip) {
                        $sEquip = new SalleHasEquipement($salle->getId(), $equip);
                        SalleHasEquipementDAO::create($sEquip);
                    }
                }    
            }
            if (isset($_REQUEST['accessSalle'])) {
                $accessArr = $_REQUEST['accessSalle'];
                SalleHasAccessibiliteDAO::deleteAllOfSalle($salle->getId());
                
                if ($accessArr > 0) {
                    foreach ($accessArr as $access) {
                        $sAccess = new SalleHasAccessibilite($salle->getId(), $access);
                        SalleHasAccessibiliteDAO::create($sAccess);
                    }
                }
            }
            if (isset($_FILES)) {
                for ($i = 1; $i < 6; $i++) {
                    if (isset($_FILES['uploadImage' . $i])) {
                        if ($_FILES['uploadImage' . $i]['name'] != '') {
                            ImageAction::addImage('uploadImage' . $i, $salle->getId());
                            if (isset($_SESSION['salleEditImage'][$i - 1][0])) {
                                ImageDAO::delete($_SESSION['salleEditImage'][$i - 1][0]);
                            }
                        }
                    }
                }
            }
            if (isset($_REQUEST['deleteImage'])) {
                foreach ($_REQUEST['deleteImage'] as $image) {
                    ImageDAO::delete($image);
                }
            }
            unset($_SESSION['salleEdit']);
            unset($_SESSION['salleEditAccessibilite']);
            unset($_SESSION['salleEditEquipement']);
            unset($_SESSION['salleEditImage']);
            return "afficher_salle";
        }
        return "erreur";
    }
    
    
}
