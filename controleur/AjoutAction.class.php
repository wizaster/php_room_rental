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

class AjoutAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) {
            return "connexion";
        }
        if ($_SESSION['role'] == 1) {
            return "devenir_proprietaire";
        }

        $sDao = new SalleDAO();
        if (ISSET($_REQUEST['btnAjout'])) {

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


            $salle = new Salle(0, $titre, $superficie, $capacite, $desc, 'x', $prix, $noCivique, $appt_suite, $rue, $code_postal
                , $ville, $province, $pays, "", $proprio);
            $salleId = $sDao->create($salle);
            if ($salleId != 0) {
                if (isset($_REQUEST['equipSalle'])) {
                    $equipArr = $_REQUEST['equipSalle'];
                    if ($equipArr > 0) {
                        foreach ($equipArr as $equip) {
                            $sEquip = new SalleHasEquipement($salleId, $equip);
                            //var_dump($sEquip);
                            SalleHasEquipementDAO::create($sEquip);
                        }
                    }
                }
                
                if (isset($_REQUEST['accessSalle'])) {
                    $accessArr = $_REQUEST['accessSalle'];
                    if ($accessArr > 0) {
                        foreach ($accessArr as $access) {
                            $sAccess = new SalleHasAccessibilite($salleId, $access);
                            SalleHasAccessibiliteDAO::create($sAccess);
                        }
                    }
                }
                
                if (isset($_FILES['uploadImage1'])) {
                    if ($_FILES['uploadImage1']['name'] != '') {
                        ImageAction::addImage('uploadImage1', $salleId);
                    }
                }
                if (isset($_FILES['uploadImage2'])) {
                    if ($_FILES['uploadImage2']['name'] != '') {
                        ImageAction::addImage('uploadImage2', $salleId);
                    }
                }
                if (isset($_FILES['uploadImage3'])) {
                    if ($_FILES['uploadImage3']['name'] != '') {
                        ImageAction::addImage('uploadImage3', $salleId);
                    }
                }
                if (isset($_FILES['uploadImage4'])) {
                    if ($_FILES['uploadImage4']['name'] != '') {
                        ImageAction::addImage('uploadImage4', $salleId);
                    }
                }
                if (isset($_FILES['uploadImage5'])) {
                    if ($_FILES['uploadImage5']['name'] != '') {
                        ImageAction::addImage('uploadImage5', $salleId);
                    }
                }
            }

            return "profil";
        }
        return "erreur";
    }
}
