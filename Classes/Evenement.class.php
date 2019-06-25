<?php

class Evenement
{

    private $id;
    private $nom;
    private $description;
    private $type_evenement_Id;

    /**
     * Evenement constructor.
     * @param $nom
     * @param $description
     * @param $type_evenement_Id
     */
    public function __construct($nom, $description, $type_evenement_Id)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->type_evenement_Id = $type_evenement_Id;
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

    /**
     * @return mixed
     */
    public function getTypeEvenementId()
    {
        return $this->type_evenement_Id;
    }

    /**
     * @param mixed $type_evenement_Id
     */
    public function setTypeEvenementId($type_evenement_Id)
    {
        $this->type_evenement_Id = $type_evenement_Id;
    }


}