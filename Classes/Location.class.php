<?php

class Location
{

    private $id;
    private $dateLocation;
    private $dateDebut;
    private $dateFin;
    private $locateurId;
    private $salleId;
    private $evenementId;

    /**
     * Location constructor.
     * @param $dateDebut
     * @param $dateFin
     * @param $locateurId
     * @param $salleId
     * @param $evenementId
     */
    public function __construct($dateDebut, $dateFin, $locateurId, $salleId, $evenementId = NULL)
    {
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->locateurId = $locateurId;
        $this->salleId = $salleId;
        $this->evenementId = $evenementId;
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
    public function getDateLocation()
    {
        return $this->dateLocation;
    }

    /**
     * @param mixed $dateLocation
     */
    public function setDateLocation($dateLocation)
    {
        $this->dateLocation = $dateLocation;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getLocateurId()
    {
        return $this->locateurId;
    }

    /**
     * @param mixed $locateurId
     */
    public function setLocateurId($locateurId)
    {
        $this->locateurId = $locateurId;
    }

    /**
     * @return mixed
     */
    public function getSalleId()
    {
        return $this->salleId;
    }

    /**
     * @param mixed $salleId
     */
    public function setSalleId($salleId)
    {
        $this->salleId = $salleId;
    }

    /**
     * @return mixed
     */
    public function getEvenementId()
    {
        return $this->evenementId;
    }

    /**
     * @param mixed $evenementId
     */
    public function setEvenementId($evenementId)
    {
        $this->evenementId = $evenementId;
    }


}
