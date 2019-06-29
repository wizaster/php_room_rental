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
                if (isset($_SESSION["connecte"]))
                    session_destroy();
                $lifetime = 6000;
                session_set_cookie_params($lifetime);
                session_start();
                $_SESSION['connecte'] = $username;
                $_SESSION['role'] = $user->getTypeutilisateurId();
                $_SESSION['id'] = $user->getId();
                var_dump($_SESSION['connecte']);
                var_dump($_SESSION['role']);
                return "default";
            } else {
                $_SESSION['msg'] = "Le mot de passe ou le nom utilisateur est errone";
                return "connexion";
            }
        } else {
            $_SESSION['msg'] = "Le mot de passe ou le nom utilisateur est errone";
            return "connexion";
        }
    }
}

