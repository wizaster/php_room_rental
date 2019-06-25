<?php

class TypeEvenement
{

    private $id;
    private $nom;
    private $description;

    /**
     * TypeEvenement constructor.
     * @param $nom
     * @param $description
     */
    public function __construct($nom, $description = "")
    {
        $this->nom = $nom;
        $this->description = $description;
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