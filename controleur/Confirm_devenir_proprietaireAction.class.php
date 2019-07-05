<?php
require_once('controleur/Action.interface.php');

class Confirm_devenir_proprietaireAction implements Action
{
    public function execute()
    {
        if (!isset($_SESSION['connecte'])) {
            return "connexion";
        }
        if ($_SESSION['role'] > 1) {
            return "profil";
        }

        $uDao = new UserDAO();
        
        $user = new User();
        $user->setId($_SESSION['id']);
            
        $user->setTypeutilisateurId(2);
        $uDao->updateUserType($user);
        
        return "confirm_devenir_proprietaire";
    }
}
