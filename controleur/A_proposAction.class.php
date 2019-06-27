<?php
require_once('controleur/Action.interface.php');

class A_proposAction implements Action
{
    public function execute()
    {
        return "a_propos";
    }
}
