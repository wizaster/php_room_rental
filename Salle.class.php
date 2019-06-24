<?php
class Favori {
    private $id;
    private $nom;
    private $superficie;
    private $capacite;
    private $addresse;
    private $idDispo;
    private $desc;
    private $createdSince;
    private $idProp;
    
    public function __construct(
        $_id=0, $_nom="", $_superficie=0, $_capacite=0, $_addresse="",
        $_idDispo="", $_desc="", $_createdSince="", $_idProp="")
    {
        $this->id = $_id;
        $this->nom = $_nom;
        $this->superficie = $_superficie;
        $this->capacite = $_capacite;
        $this->addresse = $_addresse;
        $this->idDispo = $_idDispo;
        $this->desc = $_desc;
        $this->createdSince = $_createdSince;
        $this->idProp = $_idProp;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getNom()
    {
        return $this->url;
    }
    
    public function getSuperficie()
    {
        return $this->title;
    }
    
    public function getCapacite()
    {
        return $this->capacite;
    }
    
    public function getAddresse()
    {
        return $this->addresse;
    }
    
    public function getIdDispo()
    {
        return $this->idDispo;
    }
    
    public function getDesc()
    {
        return $this->desc;
    }
    
    public function getCreatedSince()
    {
        return $this->createdSince;
    }
    
    public function getIdProp()
    {
        return $this->idProp;
    }
    
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
    
    public function setAdresse($_addresse)
    {
        $this->addresse = $_addresse;
    }
    
    public function setIdDispo($_idDispo)
    {
        $this->idDispo = $_idDispo;
    }
    
    public function setDesc($_desc)
    {
        $this->desc = $_desc;
    }
    
    public function setCreatedSince($_createdSince)
    {
        $this->createdSince = $_createdSince;
    }
    
    public function setIdProp($_idProp)
    {
        $this->idProp = $_idProp;
    }
    
    public function __toString()
    {
        return "Salle{".$this->id.",".$this->nom.",".$this->superficie.",".
		$this->capacite.",".$this->addresse.",".$this->idDispo.",".$this->desc.",".
		$this->createdSince.","".$this->idProp.""}";
    }
    
    public function loadFromArray($tab)
    {
        $this->id = $tab["ID"];
        $this->nom = $tab["NOM"];
        $this->superficie = $tab["SUPERFICIE"];
        $this->capacite = $tab["CAPACITE"];
		$this->addresse = $tab["ADDRESSE"];
		$this->idDispo = $tab["IDDISPO"];
        $this->desc = $tab["DESC"];
        $this->createdSince = $tab["CREATEDSINCE"];
        $this->idProp = $tab["IDPROP"];
    }
    
    public function loadFromObject($x)
    {
        $this->id = $x->ID;
        $this->nom = $x->NOM;
        $this->superficie = $x->SUPERFICIE;
        $this->capacite = $x->CAPACITE;
		$this->addresse = $x->ADDRESSE;
        $this->idDispo = $x->IDDISPO;
        $this->desc = $x->DESC;
        $this->createdSince = $x->CREATEDSINCE;
        $this->idProp = $x->IDPROP;
    }
}
