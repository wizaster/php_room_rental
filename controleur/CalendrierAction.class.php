<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('controleur/Action.interface.php');

class CalendrierAction implements Action
{
    public function execute()
    {

        return "reserver_salle";

    }
}