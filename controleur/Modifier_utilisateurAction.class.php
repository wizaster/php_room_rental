<?php
require_once('./controleur/Action.interface.php');
include_once('./Classes/User.class.php');
include_once('./Classes/UserDAO.class.php');

class Modifier_utilisateurAction implements Action
{
    public function execute()
    {
        $uDao = new UserDAO();

        $password = $_REQUEST['field_password'];

        $nom = $_REQUEST['field_nom'];
        $prenom = $_REQUEST['field_prenom'];
        $email = $_REQUEST['field_email'];
        $noCivique = (int)$_REQUEST['noCivique_user'];
        $appt = $_REQUEST['app_user'];
        $rue = $_REQUEST['rue_user'];
        $codePostal = $_REQUEST['codePostal_user'];
        $ville = $_REQUEST['ville_user'];
        $province = $_REQUEST['province_user'];
        $pays = $_REQUEST['pays_user'];
        $desc = $_REQUEST['description_user'];
        $adresse = $noCivique . "," . $appt . "," . $rue . "," . $codePostal . "," . $ville . "," . $province . "," . $pays;

        
        $user = new User($_SESSION['user']['id'], $password, "", $email, $nom, $prenom, $adresse, $desc, 0, 1);
        //               ^^^^^^^^^^^^^^^^^^^^^^^
        // Je sens que c'est pas bien de faire ca.
        $uDao->update($user);
        
        // pourrait peut etre setter un variable pour confirmer?
        return "profil_utilisateur";
    }
}