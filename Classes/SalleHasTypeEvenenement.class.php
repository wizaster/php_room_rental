<?php

class SalleHasTypeEvenement
{

    private $salleId;
    private $typeEvenementId;

    /**
     * SalleHasTypeEvenement constructor.
     * @param $salleId
     * @param $typeEvenementId
     */
    public function __construct($salleId, $typeEvenementId)
    {
        $this->salleId = $salleId;
        $this->typeEvenementId = $typeEvenementId;
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
    public function getTypeEvenementId()
    {
        return $this->typeEvenementId;
    }


}
