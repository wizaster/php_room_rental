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
        if (empty($dateFinDemander) || empty($dateDebutDemander)) {
            $_SESSION['msg']['err_validation'] = "Veuillez remplir les champs de dates";
            return "reserver_salle";
        }
        if (isset($_SESSION['location'])) {
            $location = unserialize($_SESSION['location']);
        } else {
            return "erreur";
        }
        $debutT = strtotime($dateDebutDemander);
        $newDebutT = date('Y-m-d', $debutT);
        $finT = strtotime($dateFinDemander);
        $newFinT = date('Y-m-d', $finT);
        if (count($location) > 0) {
            foreach ($location as $ficheLoc) {
                if (($newDebutT >= $ficheLoc->getDateDebut() && $newDebutT <= $ficheLoc->getDateFin())
                    || ($newFinT >= $ficheLoc->getDateDebut() && $newFinT <= $ficheLoc->getDateFin())) {
                    $_SESSION['msg']['err_validation'] = "Veuillez choisir des dates ou la salle est disponible";
                    return "reserver_salle";
                }
            }
        }
        $user = UserDAO::findByUsername($_SESSION['connecte']);
        $userId = $user->getId();
        $salle = SalleDAO::findById($_SESSION['salleId']);
        $debutTime = DateTime::createFromFormat('Y-m-d H:i:s', (date('Y-m-d H:i:s', (strtotime($dateDebutDemander)))));
        $finTime = DateTime::createFromFormat('Y-m-d H:i:s', (date('Y-m-d H:i:s', (strtotime($dateFinDemander)))));
        if ($debutTime > $finTime) {
            $_SESSION['msg']['err_validation'] = "Veuillez selectionner une date de fin ulterieur a la date de debut";
            return "reserver_salle";
        }
        $duree = $debutTime->diff($finTime)->format('%a') + 1;

        $nouvelLocation = new Location(0, $userId, $_SESSION['salleId'], date("Y-m-d H:i:s"), $debutTime->format('Y-m-d'), $finTime->format('Y-m-d'));
        $_SESSION['nouvelLocation'] = serialize($nouvelLocation);
        $_SESSION['facture']['salle'] = $salle->getNom();
        $_SESSION['facture']['adresse'] = $salle->getNoCivique() . " " . $salle->getRue() . ", suite " . $salle->getApptSuite() . ", " . $salle->getVille();
        $_SESSION['facture']['date_debut'] = $dateDebutDemander;
        $_SESSION['facture']['date_fin'] = $dateFinDemander;
        $_SESSION['facture']['prix_jour'] = $salle->getTarif();
        $_SESSION['facture']['total'] = $duree * $_SESSION['facture']['prix_jour'];
        return "location_confirmation";

    }
}