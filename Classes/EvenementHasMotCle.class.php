<?php

class EvenementHasMotCle
{

    private $id;
    private $evenementId;
    private $motCleId;

    /**
     * EvenementHasMotCle constructor.
     * @param $evenementId
     * @param $motCleId
     */
    public function __construct($evenementId, $motCleId)
    {
        $this->evenementId = $evenementId;
        $this->motCleId = $motCleId;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEvenementId()
    {
        return $this->evenementId;
    }

    /**
     * @return mixed
     */
    public function getMotCleId()
    {
        return $this->motCleId;
    }


}
