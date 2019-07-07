<?php
require_once('controleur/A_proposAction.class.php');
require_once('controleur/Afficher_salleAction.class.php');
require_once('controleur/Afficher_sallesAction.class.php');
require_once('controleur/Ajouter_salleAction.class.php');
require_once('controleur/ConnexionAction.class.php');
require_once('controleur/ContactAction.class.php');
require_once('controleur/DefaultAction.class.php');
require_once('controleur/Nouvel_utilisateurAction.class.php');
require_once('controleur/ConnecteAction.class.php');
require_once('controleur/AjoutAction.class.php');
require_once('controleur/Creation_utilisateurAction.class.php');
require_once('controleur/Afficher_profilAction.class.php');
require_once('controleur/DeconnexionAction.class.php');
require_once('controleur/Info_utilisateurAction.class.php');
require_once('controleur/Modifier_utilisateurAction.class.php');
require_once('controleur/RechercheAction.class.php');
require_once('controleur/Devenir_proprietaireAction.class.php');
require_once('controleur/Confirm_devenir_proprietaireAction.class.php');
require_once('controleur/Reserver_salleAction.class.php');
require_once('controleur/CalendrierAction.class.php');
require_once('controleur/Location_reussiAction.class.php');
require_once('controleur/Valider_reservationAction.class.php');
require_once('controleur/Location_annulerAction.class.php');
require_once('controleur/Modifier_salleAction.class.php');
require_once('controleur/Enregistrer_modifier_salleAction.class.php');
require_once('controleur/Supprimer_salleAction.class.php');

class ActionBuilder
{
    public static function getAction($nomAction)
    {
        switch ($nomAction) {
            case "default" :
                return new DefaultAction();
                break;
            case "ajouter_salle":
                return new Ajouter_salleAction();
                break;
            case "afficher_salle" :
                return new Afficher_salleAction();
                break;
            case "afficher_salles" :
                return new Afficher_sallesAction();
                break;
            case "modifier_salle" :
                return new Modifier_salleAction();
                break;
            case "enregistrer_modifier_salle" :
                return new Enregistrer_modifier_salleAction();
                break;
            case "supprimer_salle" :
                return new Supprimer_salleAction();
                break;
            case "a_propos" :
                return new A_proposAction();
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
            case "creation_utilisateur":
                return new Creation_utilisateurAction();
                break;
            case "info_utilisateur":
                return new Info_utilisateurAction();
                break;
            case "afficher_profil":
                return new Afficher_profilAction();
                break;
            case "devenir_proprietaire":
                return new Devenir_proprietaireAction();
                break;
            case "confirm_devenir_proprietaire":
                return new Confirm_devenir_proprietaireAction();
                break;
            case "connecte":
                return new ConnecteAction();
                break;
            case "deconnexion":
                return new DeconnexionAction();
                break;
            case "ajoutAction":
                return new AjoutAction();
                break;
            case "modifier_utilisateur":
                return new Modifier_utilisateurAction();
                break;
            case "recherche":
                return new RechercheAction();
                break;
            case "reserver_salle" :
                return new Reserver_salleAction();
                break;
            case "calendrier" :
                return new CalendrierAction();
                break;
            case "valider_reservation" :
                return new Valider_reservationAction();
                break;
            case "confirmer_reservation" :
                return new Location_reussiAction();
                break;
            case "annuler_reservation" :
                return new Location_AnnulerAction();
                break;
            default :
                return new DefaultAction();
        }
    }
}


