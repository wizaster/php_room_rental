<?php
require_once('./controleur/Action.interface.php');
include_once('./Classes/User.class.php');
include_once('./Classes/UserDAO.class.php');

class Creation_utilisateurAction implements Action
{
    public function execute()
    {
        $uDao = new UserDAO();

        $username = $_REQUEST['create_username'];
        if (UserDAO::findByUsername($username) != null) {
            $_SESSION['msg']['err_username'] = "Ce nom utilisateur existe deja";
            return "nouvel_utilisateur";
        }
        $password = $_REQUEST['create_password'];

        $nom = $_REQUEST['create_nom'];
        $prenom = $_REQUEST['create_prenom'];
        $email = $_REQUEST['create_email'];
        $noCivique = (int)$_REQUEST['noCivique_user'];
        $appt = $_REQUEST['app_user'];
        $rue = $_REQUEST['rue_user'];
        $codePostal = $_REQUEST['codePostal_user'];
        $ville = $_REQUEST['ville_user'];
        $province = $_REQUEST['province_user'];
        $pays = $_REQUEST['pays_user'];
        $desc = $_REQUEST['description_user'];
        $adresse = $noCivique . "," . $appt . "," . $rue . "," . $codePostal . "," . $ville . "," . $province . "," . $pays;

        $user = new User(0, $password, $username, $email, $nom, $prenom, $adresse, $desc, 0, 1);
        $uDao->create($user);
        return "default";
    }
}