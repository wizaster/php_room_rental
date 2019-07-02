<?php

class SalleHasEquipement
{

    private $salleId;
    private $equipementId;

    /**
     * SalleHasEquipement constructor.
     * @param $salleId
     * @param $equipementId
     */
    public function __construct($salleId, $equipementId)
    {
        $this->salleId = $salleId;
        $this->equipementId = $equipementId;
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
    public function getEquipementId()
    {
        return $this->equipementId;
    }


}
