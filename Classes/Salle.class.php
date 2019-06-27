<?php

class Salle
{
    private $id;
    private $nom;
    private $superficie;
    private $capacite;
    private $desc;
    private $statut;
    private $tarif;
    private $created_since;
    private $idProp;
    
    private $code_postal;
    private $pays;
    private $province;
    private $ville;
    private $rue;
    private $no_civique;
    private $appt_suite;
    
    
    public function __construct(
        $_id = 0,
        $_nom = "",
        $_superficie = 0,
        $_capacite = 0,
        $_desc = "",
        $_statut = 'x',
        $_tarif = 0,
        $_created_since = "",
        $_idProp = 0,
        
        $_code_postal = "",
        $_pays = "",
        $_province = "",
        $_ville = "";
        $_rue = "";
        $_no_civique = 0;
        $_appt_suite = "";
    )
    {
        $this->id = $_id
        $this->nom = $_nom
        $this->superficie = $_superficie
        $this->capacite = $_capacite
        $this->desc = $_desc
        $this->statut = $_statut
        $this->tarif = $_tarif
        $this->created_since = $_created_since
        $this->idProp = $_idProp
        
        $this->code_postal = $_code_postal
        $this->pays = $_pays
        $this->province = $_province
        $this->ville = $_ville
        $this->rue = $_rue
        $this->no_civique = $_no_civique
        $this->appt_suite = $_appt_suite
    }
    
	// Getters
	{
    public function getId()
    {
        return $this->id;
    }
    
    public function getNom()
    {
        return $this->nom;
    }
    
    public function getSuperficie()
    {
        return $this->superficie;
    }
    
    public function getCapacite()
    {
        return $this->capacite;
    }
    
    public function getDesc()
    {
        return $this->desc;
    }
	
	public function getStatut()
    {
        return $this->statut;
    }
	
	public function getTarif()
    {
        return $this->tarif;
    }
    
    public function getCreatedSince()
    {
        return $this->created_since;
    }
    
    public function getIdProp()
    {
        return $this->idProp;
    }
    
    public function getCodePostal()
    {
        return $this->code_postal;
    }
	
	public function getPays()
    {
        return $this->pays;
    }
	
	public function getProvince()
    {
        return $this->province;
    }
	
	public function getVille()
    {
        return $this->ville;
    }
	
	public function getRue()
    {
        return $this->rue;
    }
    
	public function getNoCivique()
    {
        return $this->no_civique;
    }
	
	public function getApptSuite()
    {
        return $this->appt_suite;
    }
	}
	
    // Setters 
	{
    public function setId($_id)
    {
        $this->id = $_id;
    }
    
    public function setNom($_nom)
    {
        $this->nom = $_nom;
    }
    
    public function setSuperficie($_superficie)
    {
        $this->superficie = $_superficie;
    }
    
    public function setCapacite($_capacite)
    {
        $this->capacite = $_capacite;
    }
    
    public function setDesc($_desc)
    {
        $this->desc = $_desc;
    }
    
	public function setStatut($_statut)
    {
        $this->statut = $_statut;
    }
	
	public function setTarif($_tarif)
    {
        $this->tarif = $_tarif;
    }
    
    public function setCreatedSince($_created_since)
    {
        $this->created_since = $_created_since;
    }
    
    public function setIdProp($_idProp)
    {
        $this->idProp = $_idProp;
    }
	
    public function setCodePostal($_code_postal)
    {
        $this->code_postal = $_code_postal;
    }
    
    public function setPays($_pays)
    {
        $this->pays = $_pays;
    }
	
	public function setProvince($_province)
    {
        $this->province = $_province;
    }
	
	public function setVille($_ville)
    {
        $this->ville = $_ville;
    }
	
	public function setRue($_rue)
    {
        $this->rue = $_rue;
    }
	
	public function setNoCivique($_no_civique)
    {
        $this->no_civique = $_no_civique;
    }
	
	public function setApptSuite($_appt_suite)
    {
        $this->appt_suite = $_appt_suite;
    }
	}
    
    public function __toString()
    {
        return "Salle{"
            .$this->id.","
            .$this->nom.","
            .$this->superficie.","
            .$this->capacite.","
            .$this->desc.","
            .$this->satut.","
            .$this->tarif.","
            .$this->created_since.","
            .$this->idProp.
            "}";
    }
    
    public function loadFromArray($tab)
    {
        $this->id = $tab["ID"];
        $this->nom = $tab["NOM"];
        $this->superficie = $tab["SUPERFICIE"];
        $this->capacite = $tab["CAPACITE"];
        $this->desc = $tab["DESC"];
		$this->statut = $tab["STATUT"];
		$this->tarif = $tab["TARIF"];
        $this->created_since = $tab["CREATEDSINCE"];
        $this->idProp = $tab["IDPROP"];
        
        $this->code_postal = $tab["CODE_POSTAL"];
        $this->pays = $tab["PAYS"];
        $this->province = $tab["PROVINCE"];
		$this->ville = $tab["VILLE"];
		$this->rue = $tab["RUE"];
        $this->no_civique = $tab["NO_CIVIQUE"];
        $this->appt_suite = $tab["APPT_SUITE"];
    }
    
    public function loadFromObject($x)
    {
        $this->id = $x->ID;
        $this->nom = $x->NOM;
        $this->superficie = $x->SUPERFICIE;
        $this->capacite = $x->CAPACITE;
        $this->desc = $x->DESC;
        $this->statut = $x->STATUT;
        $this->tarif = $x->TARIF;
        $this->created_since = $x->CREATEDSINCE;
        $this->idProp = $x->IDPROP;
        
        $this->code_postal = $x->CODE_POSTAL;
        $this->pays = $x->PAYS;
        $this->province = $x->PROVINCE;
        $this->ville = $x->VILLE;
        $this->rue = $x->RUE;
        $this->no_civique = $x->NO_CIVIQUE;
        $this->appt_suite = $x->APPT_SUITE;
    }
}