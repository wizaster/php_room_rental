<?php

class Image
{

    private $id;
    private $emplacement;
    private $salleId;

    public function __construct($_emplacement = null, $_salleId = null, $_id = 0)
    {
        $this->id = $_id;
        $this->emplacement = $_emplacement;
        $this->salleId = $_salleId;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * @param null $emplacement
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;
    }

    /**
     * @return null
     */
    public function getSalleId()
    {
        return $this->salleId;
    }

    /**
     * @param null $salleId
     */
    public function setSalleId($salleId)
    {
        $this->salleId = $salleId;
    }

}
