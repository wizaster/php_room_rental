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
                
            $query = 'SELECT * FROM '.Config::DB_TABLE_LOCATION;
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

            $pstmt = $db->prepare("SELECT * FROM " . Config::DB_TABLE_LOC . " WHERE ID = :x");
            $pstmt->execute(array(':x' => $id));
            
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            if($result)
            {
                $l = new Location();
                $l->loadFromObject($result);
                
                $pstmt->closeCursor();
                return $l;
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
    public static function findLocateurId($id)
    {
        try 
        {

            $liste = Array();
            
            $db = Database::getInstance();
            /*
            $pstmt = $db->prepare("SELECT * FROM ".Config::DB_TABLE_LOC." WHERE locateur_Id = :x");
            $pstmt->execute(array(':x' => $id));
            
                                    // TODO Pas sur!
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            var_dump($result);
            if(count($result) > 1){
                foreach($result as $row) {
                    var_dump($row);
                    $l = new Location();

                    $l->loadFromArray($row);

                    array_push($liste,$l);
                }
                $pstmt->closeCursor();
                //$db->close();
                return $liste;
            }elseif (count($result) == 1){
                $l = new Location();

                $l->loadFromObject($result);

                return $l;
            }
            return null;
            */
            $stmt = $db->prepare("SELECT * FROM " . config::DB_TABLE_LOC . " where locateur_Id = '" . $id . "'");
            if ($stmt->execute(array(':x' => $id))) {
                while ($row = $stmt->fetch()) {
                    var_dump($row);
                    $l = new Location();

                    $l->loadFromArray($row);

                    array_push($liste, $l);
                }
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
            $pstmt->execute(array(':x' => $id));
            
                                    // TODO Pas sur!
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            foreach($result as $row) {
                $l = new Location();
                $l->loadFromArray($row);
                
                array_push($liste,$l);
            }
            $pstmt->closeCursor();
            //$db->close();
            return liste;
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
                "UPDATE '" . Config::DB_TABLE_LOC . "' SET 
                DATE_DEBUT = :deb, 
                DATE_FIN = :fin
                WHERE ID = :i");
            
            $n = $pstmt->execute(array(
                ':deb' => $x->getDateDebut(),
                ':fin' => $x->getDateFin(),
                ':i' => $x->getId()));
            
            $pstmt->closeCursor();
            //$db->close();
            return $n;
		}
		catch(PDOException $e)
		{
			throw $e;
		}
    }
    
    public function delete($x)
    {
        try
        {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("DELETE FROM ".Config::DB_TABLE_LOCATION." WHERE ID = :x");
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
