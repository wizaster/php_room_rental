<?php

class SalleHasAccessibilite
{

    private $salleId;
    private $accessibiliteId;

    /**
     * SalleHasAccessibilite constructor.
     * @param $salleId
     * @param $accessibiliteId
     */
    public function __construct($salleId = null, $accessibiliteId = null)
    {
        $this->salleId = $salleId;
        $this->accessibiliteId = $accessibiliteId;
    }


    /**
     * @return mixed
     */
    public function getSalleId()
    {
        return $this->salleId;
    }

    /**
     * @return mixed
     */
    public function getAccessibiliteId()
    {
        return $this->accessibiliteId;
    }

    public function loadFromArray($tab)
    {
        $this->salleId = $tab['Salle_Id'];
        $this->accessibiliteId = $tab['Accessibilite_Id'];
    }


}
