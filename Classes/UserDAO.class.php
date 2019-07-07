<?php

include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/User.class.php');

class UserDAO
{
    public function __construct(){}

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare(
                "INSERT INTO " . Config::DB_TABLE_USER . " (
                `password`,
                `nomUtilisateur`,
                `email`,
                `nom`,
                `prenom`,
                `adresse`,
                `description`,
                `Type_utilisateur_Id`)
             VALUES(:psw, :usr, :email, :nom, :prenom, :adr, :descr, :usertype)");
            
            $n = $pstmt->execute(array(
                ':psw' => $x->getPassword(),
                ':usr' => $x->getNomUtilisateur(),
                ':email' => $x->getEmail(),
                ':nom' => $x->getNom(),
                ':prenom' => $x->getPrenom(),
                ':adr' => $x->getAdresse(),
                ':descr' => $x->getDescription(),
                ':usertype' => $x->getTypeutilisateurId()));
            
            $pstmt->closeCursor();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public static function findById($id)
    {
        try 
        {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("SELECT * FROM ".Config::DB_TABLE_USER." WHERE ID = :x");
            $pstmt->execute(array(':x' => $id));
            
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            if($result)
            {
                $u = new User();
                $u->loadFromObject($result);
                
                $pstmt->closeCursor();
                return $u;
            }
            $pstmt->closeCursor();
            //$db->close();
            return null;
        }
        catch(PDOException $e) 
        {
            throw $e;
        }
    }
    
    public static function findByUsername($username)
    {
        try 
        {
            $db = Database::getInstance();

            $pstmt = $db->prepare("SELECT * FROM ".Config::DB_TABLE_USER ." WHERE nomUtilisateur = :x");
            $pstmt->execute(array(':x' => $username));
            
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            if($result)
            {
                $u = new User();
                $u->loadFromObject($result);
                
                $pstmt->closeCursor();
                return $u;
            }
            $pstmt->closeCursor();
            //$db->close();
            return null;
        }
        catch(PDOException $e) 
        {
            throw $e;
        }
    }
    public function update($x)
    {
        try {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare(
                "UPDATE ".Config::DB_TABLE_USER." SET
                password = :psw ,
                email = :email ,
                nom = :nom ,
                prenom = :prenom ,
                adresse = :adr ,
                description = :desc
                WHERE ID = :i");
            
            $n = $pstmt->execute(array(
                ':psw' => $x->getPassword(),
                ':email' => $x->getEmail(),
                ':nom' => $x->getNom(),
                ':prenom' => $x->getPrenom(),
                ':adr' => $x->getAdresse(),
                ':desc' => $x->getDescription(),
                ':i' => $x->getId()));
            
            $pstmt->closeCursor();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function updateUserType($x)
    {
        try {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare(
                "UPDATE ".Config::DB_TABLE_USER." SET
                Type_utilisateur_Id = :type
                WHERE ID = :i");
            
            $n = $pstmt->execute(array(
                ':type' => $x->getTypeutilisateurId(),
                ':i' => $x->getId()));
            
            $pstmt->closeCursor();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function delete($x)
    {
        try
        {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("DELETE FROM ".Config::DB_TABLE_USER." WHERE ID = :x");
            $n = $pstmt->execute(array(':x' => $x));
            
            $pstmt->closeCursor();
            //$db->close();
            return $n;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }
}