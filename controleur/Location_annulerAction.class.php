<?php
require_once('controleur/Action.interface.php');

class Location_annulerAction implements Action
{
    public function execute()
    {
        $_SESSION['msg']['err_msg'] = "Location annuler";
        return "profil";
    }
}
