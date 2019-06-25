<?php

class HistoriqueAdministration
{

    private $id;
    private $titre;
    private $description;
    private $utilisateur_Id;

    /**
     * HistoriqueAdministration constructor.
     * @param $titre
     * @param $description
     * @param $utilisateur_Id
     */
    public function __construct($titre, $description, $utilisateur_Id)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->utilisateur_Id = $utilisateur_Id;
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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
    public function getUtilisateurId()
    {
        return $this->utilisateur_Id;
    }


}