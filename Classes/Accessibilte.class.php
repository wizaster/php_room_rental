<?php

class Accessibilte
{

    private $id;
    private $nom;
    private $description;

    function __construct($_nom, $_description = "")
    {
        $this->nom = $_nom;
        $this->description = $_description;
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
