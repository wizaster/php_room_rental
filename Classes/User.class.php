<?php

class User
{
    private $nomUtilisateur;
    private $password;
    
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $email;
    private $description;
    private $Type_utilisateur_Id;
    private $create_time;

    public function __construct(
        $_id = 0,
        $_password = "",
        $_username = "",
        $_email = "",
        $_nom = "",
        $_prenom = "",
        $_adresse = "",
        $_description = "",
        $_create_time = "",
        $_Type_utilisateur_Id = 1
    )
    {
        $this->nomUtilisateur = $_username;
        $this->password = $_password;
        $this->id = $_id;
        $this->nom = $_nom;
        $this->prenom = $_prenom;
        $this->adresse = $_adresse;
        $this->email = $_email;
        $this->description = $_description;
        $this->Type_utilisateur_Id = $_Type_utilisateur_Id;
        $this->create_time = $_create_time;
    }
    
    // Getters

    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
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

    public function getTypeutilisateurId()
    {
        return $this->Type_utilisateur_Id;
    }
    
    public function getUserSince()
    {
        return $this->create_time;
    }

    
    // Setters

    public function setNomUtilisateur($_username)
    {
        $this->nomUtilisateur = $_username;
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

    public function setTypeutilisateurId($_user_type)
    {
        $this->Type_utilisateur_Id = $_user_type;
    }
    
    public function setUserSince($_user_since)
    {
        $this->create_time = $_user_since;
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
            . $this->Type_utilisateur_Id . ","
            . $this->create_time .
            "}";
    }
    
    public function loadFromArray($tab)
    {
        $this->nomUtilisateur = $tab["nomUtilisateur"];
        $this->password = $tab["PASSWORD"];
        $this->id = $tab["ID"];
        $this->nom = $tab["NOM"];
        $this->prenom = $tab["PRENOM"];
        $this->adresse = $tab["ADRESSE"];
        $this->email = $tab["EMAIL"];
		$this->description = $tab["DESCRIPTION"];
        $this->Type_utilisateur_Id = $tab["TYPE_UTILISATEUR_ID"];
        $this->create_time = $tab["CREATE_TIME"];
    }
    
    public function loadFromObject($x)
    {
        $this->nomUtilisateur = $x->nomUtilisateur;
        $this->password = $x->password;
        $this->id = $x->Id;
        $this->nom = $x->nom;
        $this->prenom = $x->prenom;
        $this->adresse = $x->adresse;
        $this->email = $x->email;
        $this->description = $x->description;
        $this->Type_utilisateur_Id = $x->Type_utilisateur_Id;
        $this->create_time = $x->create_time;
    }
}