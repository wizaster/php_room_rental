<?php
include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Location.class.php');

class LocationDAO
{
    public function __construct(){}

    public static function create($x)
    {
        try {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare(
                "INSERT INTO " . Config::DB_TABLE_LOC . " (
                id,
                locateur_id,
                salle_id,
                date_debut,
                date_fin)
            VALUES (:id, :loc, :sal, :deb, :fin)");
            
            $n = $pstmt->execute(array(
                ':id' => $x->getId(),
                ':loc' => $x->getLocateurId(),
                ':sal' => $x->getSalleId(),
                ':deb' => $x->getDateDebut(),
                ':fin' => $x->getDateFin()));
            
            $pstmt->closeCursor();
            //$db->close();
            return $n;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    public static function findAll()
    {
        try {
            $liste = Array();
                
            $query = 'SELECT * FROM '.Config::DB_TABLE_LOC;
            $cnx = Database::getInstance();
            
            $result = $cnx->query($query);
            foreach($result as $row) {
                $l = new Location();
                
                $l->loadFromArray($row);
                
                array_push($liste,$l);
            }
            $result->closeCursor();
            //$cnx->close();
            return $liste;
        }
        catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }
    
    public static function findById($id)
    {
        try 
        {
            $db = Database::getInstance();

            $pstmt = $db->prepare("SELECT * FROM " . Config::DB_TABLE_LOC . " WHERE Id = :x");
            if ($pstmt->execute(array(':x' => $id))) {
                while ($row = $pstmt->fetch()) {
                    $l = new Location();
                    $l->loadFromObject($row);
                    $pstmt->closeCursor();
                    return $l;
                }
            }
            $pstmt->closeCursor();
            return null;
        }
        catch(PDOException $e) 
        {
            throw $e;
        }
    }
    
    public static function findLocateurId($id)
    {
        try 
        {
            $liste = Array();
            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT * FROM " . Config::DB_TABLE_LOC . " where locateur_Id = :x");
            if ($stmt->execute(array(':x' => $id))) {
                while ($row = $stmt->fetch()) {
                    $l = new Location();
                    $l->loadFromArray($row);
                    \                    array_push($liste, $l);
                }
                $stmt->closeCursor();
                return $liste;
            }
        }
        catch(PDOException $e) 
        {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }

    public static function findDatesBySalleId($id)
    {
        try {
            $liste = Array();
            $db = Database::getInstance();
            $res = $db->query("SELECT * FROM " . config::DB_TABLE_LOC . " WHERE  Salle_Id = " . $id);
            foreach ($res as $row) {
                $obj = new Location();
                $obj->loadFromArray($row);
                array_push($liste, $obj);
            }
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }
    public static function findSalleId($id)
    {
        try 
        {
            $liste = Array();
            $db = Database::getInstance();
            $pstmt = $db->prepare("SELECT * FROM " . Config::DB_TABLE_LOC . " WHERE Salle_Id = :x");
            if ($pstmt->execute(array(':x' => $id))) {
                while ($row = $pstmt->fetch()) {
                    $l = new Location();
                    $l->loadFromArray($row);
                    array_push($liste,$l);
                }
            }
            $pstmt->closeCursor();
            return $liste;
        }
        catch(PDOException $e) 
        {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }
    
    public function update($x) {
		try
		{
			$db = Database::getInstance();
            $pstmt = $db->prepare(
                "UPDATE '".Config::DB_TABLE_LOC."' SET 
                DATE_DEBUT = :deb, 
                DATE_FIN = :fin
                WHERE ID = :i");
            $n = $pstmt->execute(array(
                ':deb' => $x->getDateDebut(),
                ':fin' => $x->getDateFin(),
                ':i' => $x->getId()));
            $pstmt->closeCursor();
            return $n;
		}
		catch(PDOException $e)
		{
			throw $e;
		}
    }
    
    public static function delete($x)
    {
        try
        {
            $db = Database::getInstance();
            $pstmt = $db->prepare("DELETE FROM ".Config::DB_TABLE_LOC." WHERE ID = :x");
            $n = $pstmt->execute(array(':x' => $x));
            $pstmt->closeCursor();
            return $n;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }
}
