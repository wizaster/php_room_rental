<?php
require_once('controleur/Action.interface.php');

class Confirm_devenir_proprietaireAction implements Action
{
    public function execute()
    {
        $uDao = new UserDAO();
        
        $user = new User();
        
        $user->setId($_SESSION['id']);
        //           ^^^^^^^^^^^^^^^^^^^^^^^
        // Je sens que c'est pas bien de faire ca.
            
        $user->setTypeutilisateurId(2);
        $uDao->updateUserType($user);
        
        return "confirm_devenir_proprietaire";
    }
}
