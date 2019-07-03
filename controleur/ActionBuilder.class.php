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
require_once('controleur/ConnecteAction.class.php');
require_once('controleur/AjoutAction.class.php');
require_once('controleur/Creation_utilisateurAction.class.php');
require_once('controleur/Salle_optionAction.class.php');
require_once('controleur/ValiderAction.class.php');
require_once('controleur/Afficher_profilAction.class.php');
require_once('controleur/DeconnexionAction.class.php');

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
                return new ConnexionAction();
                break;
            case "nouvel_utilisateur" :
                return new Nouvel_utilisateurAction();
                break;
            case "recherche_avance" :
                return new Recherche_avanceAction();
                break;
            case "connecte":
                return new ConnecteAction();
                break;
            case "ajoutAction":
                return new AjoutAction();
                break;
            case "creation_utilisateur":
                return new Creation_utilisateurAction();
                break;
            case "salle_option":
                return new Salle_optionAction();
                break;
            case "validerAction":
                return new ValiderAction();
                break;
            case "afficher_profil":
                return new Afficher_profilAction();
                break;
            case "deconnexion":
                return new DeconnexionAction();
                break;
            default :
                return new DefaultAction();
        }
    }
}


