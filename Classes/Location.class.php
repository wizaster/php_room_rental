<?php

class Location
{

    private $id;
    private $locateurId;
    private $salleId;
    private $date_location;
    private $date_debut;
    private $date_fin;

    
    public function __construct(
        $_id = 0,
        $_locateurId = 0,
        $_salleId = 0,
        $_date_location = "",
        $_date_debut = "",
        $_date_fin = "")
    {
        $this->id = $_id;
        $this->locateurId = $_locateurId;
        $this->salleId = $_salleId;
        $this->date_location = $date_location;
        $this->date_debut = $_date_debut;
        $this->date_fin = $_date_fin;
    }

    // Getters
    {
    public function getId()
    {
        return $this->id;
    }

    public function getLocateurId()
    {
        return $this->locateurId;
    }
    
    public function getSalleId()
    {
        return $this->salleId;
    }
    
    public function getDateLocation()
    {
        return $this->date_location;
    }
    
    public function getDateDebut()
    {
        return $this->date_debut;
    }
    
    
    public function getDateFin()
    {
        return $this->date_fin;
    }
    }
    
    // Setters
    {
    public function setId($_id)
    {
        $this->id = $_id;
    }
        
    public function setLocateurId($locateurId)
    {
        $this->locateurId = $locateurId;
    }
        
    public function setSalleId($salleId)
    {
        $this->salleId = $salleId;
    }
    
    public function setDateLocation($_date_location)
    {
        $this->date_location = $_date_location;
    }
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $_date_debut;
    }
    
    public function setDateFin($dateFin)
    {
        $this->date_fin = $_date_fin;
    }
    }
    
    public function __toString()
    {
        return "Location{"
            .$this->id.","
            .$this->locateurId.","
            .$this->salleId.","
            .$this->date_location.","
            .$this->date_debut.","
            .$this->date_fin.
            "}";
    }
    
    public function loadFromArray($tab)
    {
        $this->id = $tab["ID"];
        $this->locateurId = $tab["LOCATEUR_ID"];
        $this->salleId = $tab["SALLE_ID"];
        $this->date_location = $tab["CREATE_TIME"];
        $this->date_debut = $tab["DATE_DEBUT"];
        $this->date_fin = $tab["DATE_FIN"];
    }
    
    public function loadFromObject($x)
    {
        $this->id = $x->ID;
        $this->locateurId = $x->LOCATEUR_ID;
        $this->salleId = $x->SALLE_ID;
        $this->date_location = $x->CREATE_TIME;
        $this->date_debut = $x->DATE_DEBUT;
        $this->date_fin = $x->DATE_FIN;
    }
}
