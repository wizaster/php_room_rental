<?php

class Accessibilite
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

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
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
