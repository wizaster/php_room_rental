<?php
require_once('controleur/A_proposAction.class.php');
require_once('controleur/Afficher_salleAction.class.php');
require_once('controleur/Afficher_sallesAction.class.php');
require_once('controleur/Ajouter_salleAction.class.php');
require_once('controleur/ConnexionAction.class.php');
require_once('controleur/ContactAction.class.php');
require_once('controleur/DefaultAction.class.php');
require_once('controleur/Nouvel_utilisateurAction.class.php');
require_once('controleur/Recherche_avanceAction.class.php');

class ActionBuilder
{
    public static function getAction($nomAction)
    {
        switch ($nomAction) {
            case "ajouter_salle":
                return new Ajouter_salleAction();
                break;
            case "afficher_salle" :
                return new Afficher_salleAction();
                break;
            case "afficher_salles" :
                return new Afficher_sallesAction();
                break;
            case "a_propos" :
                return new A_proposAction();
                break;
            case "default" :
                return new DefaultAction();
                break;
            case "contact" :
                return new ContactAction();
                break;
            case "connexion" :
                return new ContactAction();
                break;
            case "nouvel_utilisateur" :
                return new Nouvel_utilisateurAction();
                break;
            case "recherche_avance" :
                return new Recherche_avanceAction();
                break;
            default :
                return new DefaultAction();
        }
    }
}

?>
