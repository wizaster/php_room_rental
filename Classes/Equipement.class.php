<?php

class Equipement
{

    private $id;
    private $nom;
    private $description;

    function __construct($_nom = "", $_description = "")
    {
        $this->nom = $_nom;
        $this->description = $_description;
    }

    public function loadFromArray($tab)
    {
        $this->id = $tab["Id"];
        $this->description = $tab["description"];
        $this->nom = $tab["nom"];
    }

    public function loadFromObject($x)
    {
        $this->id = $x->id;
        $this->nom = $x->nom;
        $this->description = $x->description;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}