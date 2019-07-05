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
            $res = $sDao->create($salle);

            return "salle_option";
        }
    }
}
