<?php

class Salle_adresse
{
    private $id;

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
    public function getNoCivique()
    {
        return $this->no_civique;
    }

    /**
     * @param mixed $no_civique
     */
    public function setNoCivique($no_civique)
    {
        $this->no_civique = $no_civique;
    }

    /**
     * @return mixed
     */
    public function getNoLocal()
    {
        return $this->no_local;
    }

    /**
     * @param mixed $no_local
     */
    public function setNoLocal($no_local)
    {
        $this->no_local = $no_local;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    private $no_civique;
    private $no_local;
    private $rue;
    private $ville;
    private $code_postal;
    private $province;
    private $pays;

    public function __construct($_no_civique, $_no_local, $_rue, $_ville, $_code_postal, $_province, $_pays)
    {
        $this->no_civique = $_no_civique;
        $this->code_postal = $_code_postal;
        $this->no_local = $_no_local;
        $this->pays = $_pays;
        $this->province = $_province;
        $this->rue = $_rue;
        $this->ville = $_ville;
    }
}

