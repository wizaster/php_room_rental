<?php
require_once('controleur/Action.interface.php');
require_once('./Classes/Location.class.php');
require_once('./Classes/LocationDAO.class.php');

class Valider_reservationAction implements Action
{
    public function execute()
    {
        date_default_timezone_set('America/New_York');
        $dateDebutDemander = $_REQUEST['dateDebut'];
        $dateFinDemander = $_REQUEST['dateFin'];
        if (isset($_SESSION['location'])) {
            $location = unserialize($_SESSION['location']);
        } else {
            return "erreur";
        }
        if (count($location) > 0) {
            foreach ($location as $ficheLoc) {
                if (($dateDebutDemander >= $ficheLoc->getDateDebut() && $dateDebutDemander <= $ficheLoc->getDateFin())
                    || ($dateFinDemander >= $ficheLoc->getDateDebut() && $dateFinDemander <= $ficheLoc->getDateFin())) {
                    $_SESSION['err_validation_msg'] = "Veuillez choisir des dates ou la salle est disponible";
                    return "reserver_salle";
                }
            }
        }
        $user = UserDAO::findByUsername($_SESSION['connecte']);
        $userId = $user->getId();
        $salle = SalleDAO::findById($location[0]->getSalleId());
        $debutAsTime = strtotime($dateDebutDemander);
        $debutAsTime2 = date('Y-m-d', $debutAsTime);
        $debutTime = DateTime::createFromFormat('Y-m-d', $debutAsTime2);
        $finAsTime = strtotime($dateFinDemander);
        $finAsTime2 = date('Y-m-d', $finAsTime);
        $finTime = DateTime::createFromFormat('Y-m-d', $finAsTime2);
        var_dump($debutTime);
        $duree = $debutTime->diff($finTime)->format('%a') + 1;
        $nouvelLocation = new Location(0, $userId, $_SESSION['salleId'], date("Y-m-d H:i:s"), $debutTime->format('Y-m-d'), $finTime->format('Y-m-d'));
        $_SESSION['nouvelLocation'] = serialize($nouvelLocation);
        $_SESSION['facture']['salle'] = $salle->getNom();
        $_SESSION['facture']['adresse'] = $salle->getNoCivique() . " " . $salle->getRue() . ", suite " . $salle->getApptSuite() . ", " . $salle->getVille();
        $_SESSION['facture']['date_debut'] = $dateDebutDemander;
        $_SESSION['facture']['date_fin'] = $dateFinDemander;
        $_SESSION['facture']['prix_jour'] = $salle->getTarif();
        $_SESSION['facture']['total'] = $duree;
        return "location_confirmation";

    }
}