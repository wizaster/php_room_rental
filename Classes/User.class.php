<?php

class User
{
    private $username;
    private $password;
    
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $email;
    private $description;
    private $user_type;
    private $user_since;

    public function __construct(
        $_username = "",
        $_password = "",
        
        $_id = 0,
        $_nom = "",
        $_prenom = "",
        $_adresse = "",
        $_email = "",
        $_description = "",
        $_user_type = 1,
        $_user_since = ""
    )
    {
        $this->username = $_username;
        $this->password = $_password;
        
        $this->id = $_id;
        $this->nom = $_nom;
        $this->prenom = $_prenom;
        $this->adresse = $_adresse;
        $this->email = $_email;
        $this->description = $_description;
        $this->user_type = $_user_type;
        $this->user_since = $_user_since;
    }
    
    // Getters
    {
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getNom()
    {
        return $this->nom;
    }
    
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function getAdresse()
    {
        return $this->adresse;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function getUserType()
    {
        return $this->user_type;
    }
    
    public function getUserSince()
    {
        return $this->user_since;
    }
    }
    
    // Setters
    {
    public function setUsername($_username)
    {
        $this->username = $_username;
    }
    
    public function setPassword($_password)
    {
        $this->password = $_password;
    }
    
    public function setId($_id)
    {
        $this->id = $_id;
    }
    
    public function setNom($_nom)
    {
        $this->nom = $_nom;
    }
    
    public function setPrenom($_prenom)
    {
        $this->prenom = $_prenom;
    }
    
    public function setAdresse($_adresse)
    {
        $this->adresse = $_adresse;
    }
    
    public function setEmail($_email)
    {
        $this->email = $_email;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function setUserType($_user_type)
    {
        $this->user_type = $_user_type;
    }
    
    public function setUserSince($_user_since)
    {
        $this->user_since = $user_since;
    }
    }

    
    public function __toString()
    {
        return "User{"
            .$this->id.","
            .$this->nom.","
            .$this->prenom.","
            .$this->adresse.","
            .$this->email.","
            .$this->description.","
            .$this->user_type.","
            .$this->user_since.
            "}";
    }
    
    public function loadFromArray($tab)
    {
        $this->username = $tab["USERNAME"];
        $this->password = $tab["PASSWORD"];
        $this->id = $tab["ID"];
        $this->nom = $tab["NOM"];
        $this->prenom = $tab["PRENOM"];
        $this->adresse = $tab["ADRESSE"];
        $this->email = $tab["EMAIL"];
		$this->description = $tab["DESCRIPTION"];
        $this->user_type = $tab["USER_TYPE"];
        $this->user_since = $tab["USER_SINCE"];
    }
    
    public function loadFromObject($x)
    {
        $this->username = $x->USERNAME;
        $this->password = $x->PASSWORD;
        $this->id = $x->ID;
        $this->nom = $x->NOM;
        $this->prenom = $x->PRENOM;
        $this->adresse = $x->ADRESSE;
        $this->email = $x->EMAIL;
        $this->description = $x->DESCRIPTION;
        $this->user_type = $x->USER_TYPE;
        $this->user_since = $x->USER_SINCE;
    }
}