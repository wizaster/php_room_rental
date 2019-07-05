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
        $_id = "",
        $_nom = "",
        $_superficie = 0,
        $_capacite = 0,
        $_desc = "",
        $_statut = 'x',
        $_tarif = 0,
        $_no_civique = 0,
        $_appt_suite = "",
        $_rue = "",
        $_code_postal = "",
        $_ville = "",
        $_province = "",
        $_pays = "",
        $_created_since = "",
        $_idProp = 0
    )
    {
        $this->id = $_id;
        $this->nom = $_nom;
        $this->superficie = $_superficie;
        $this->capacite = $_capacite;
        $this->desc = $_desc;
        $this->statut = $_statut;
        $this->tarif = $_tarif;


        $this->code_postal = $_code_postal;
        $this->pays = $_pays;
        $this->province = $_province;
        $this->ville = $_ville;
        $this->rue = $_rue;
        $this->no_civique = $_no_civique;
        $this->appt_suite = $_appt_suite;
        $this->created_since = $_created_since;
        $this->idProp = $_idProp;
    }
    
	// Getters

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


    // Setters 

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


    public function __toString()
    {
        return "Salle{"
            .$this->id.","
            .$this->nom.","
            .$this->superficie.","
            .$this->capacite.","
            .$this->desc.","
            . $this->statut . ","
            .$this->tarif.","
            .$this->created_since.","
            .$this->idProp.
            "}";
    }
    
    public function loadFromArray($tab)
    {
        $this->id = $tab["Id"];
        $this->nom = $tab["nom"];
        $this->superficie = $tab["superficie"];
        $this->capacite = $tab["capacite"];
        $this->desc = $tab["description"];
        $this->statut = $tab["statut"];
        $this->tarif = $tab["tarif"];
        $this->created_since = $tab["create_time"];
        $this->idProp = $tab["proprietaire_Id"];

        $this->code_postal = $tab["code_postal"];
        $this->pays = $tab["pays"];
        $this->province = $tab["province"];
        $this->ville = $tab["ville"];
        $this->rue = $tab["rue"];
        $this->no_civique = $tab["no_civique"];
        $this->appt_suite = $tab["appt_suite"];
    }
    
    public function loadFromObject($x)
    {
        $this->id = $x->Id;
        $this->nom = $x->nom;
        $this->superficie = $x->superficie;
        $this->capacite = $x->capacite;
        $this->desc = $x->description;
        $this->statut = $x->statut;
        $this->tarif = $x->tarif;
        $this->created_since = $x->create_time;
        $this->idProp = $x->proprietaire_Id;

        $this->code_postal = $x->code_postal;
        $this->pays = $x->pays;
        $this->province = $x->province;
        $this->ville = $x->ville;
        $this->rue = $x->rue;
        $this->no_civique = $x->no_civique;
        $this->appt_suite = $x->appt_suite;
    }
}