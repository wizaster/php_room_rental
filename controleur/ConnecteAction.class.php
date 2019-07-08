<?php
include_once('./Classes/UserDAO.class.php');
require_once('./controleur/Action.interface.php');

class ConnecteAction implements Action
{
    public function execute()
    {

        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $user = UserDAO::findByUsername($username);


        if ($user != null) {
            if ($user->getPassword() == $password) {

                $_SESSION['connecte'] = $username;
                $_SESSION['role'] = $user->getTypeutilisateurId();
                $_SESSION['id'] = $user->getId();
                return "default";
            } else {
                $_SESSION['msg']['err_connection'] = "Le mot de passe ou le nom utilisateur est errone";
                return "connexion";
            }
        } else {
            $_SESSION['msg']['err_connection'] = "Le mot de passe ou le nom utilisateur est errone";
            return "connexion";
        }
    }
}
