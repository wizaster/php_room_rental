<?php
require_once('./Configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Favori.class.php');

class FavoriDAO
{
    public function create($x) {
        try {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("INSERT INTO ".Config::DB_TABLE_SALLE.
            " (ID, NOM, SUPERFICIE, CAPACITE, ADDRESSE, IDDISPO, DESC, CREATEDSINCE, IDPROP)
            VALUES (:id, :nom, :sup, :cap, :add, :dispo, :desc, :created)");
            $n = $pstmt->execute(array(
                ':id' => $x->getId(),
                ':nom' => $x->getNom(),
                ':sup' => $x->getSuperficie(),
                ':cap' => $x->getCapacite(),
                ':add' => $x->getAddresse(),
                ':dispo' => $x->getIdDispo(),
                ':desc' => $x->getDesc(),
                ':created' => $x->getCreatedSince()));
            
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
            $liste = new Array();
                
            $query = 'SELECT * FROM '.Config::DB_TABLE_SALLE;
            $cnx = Database::getInstance();
            
            $result = $cnx->query($query);
            foreach($result as $row) {
                $s = new Salle();
                
                $s->loadFromArray($row);
                
                array_push($liste,$s);
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
            
            $pstmt = $db->prepare("SELECT * FROM ".Config::DB_TABLE_SALLE." WHERE ID = :x");
            $pstmt->execute(array(':x' => $id));
            
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            if($result)
            {
                $s = new Salle();
                $s->loadFromObject($result);
                
                $pstmt->closeCursor();
                return $s;
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
    
    public static function findByIdProp($idProp)
    {
        try 
        {
            $liste = new Array();
            
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("SELECT * FROM ".Config::DB_TABLE_SALLE." WHERE IDPROP = :x");
            $pstmt->execute(array(':x' => $idProp));
            
                                    // TODO Pas sur!
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            foreach($result as $row) {
                $s = new Salle();
                
                $s->loadFromArray($row);
                
                array_push($liste,$s);
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
                "UPDATE ".Config::DB_TABLE_SALLE." SET 
                NOM = :n, 
                SUPERFICIE = :s, 
                CAPACITE = :c,
                DESC = :d
                WHERE ID = :i");
            $n = $pstmt->execute(array(
                ':n' => $x->getNom(),
                ':s' => $x->getSuperficie(),
                ':c' => $x->getCapacite(),
                ':d' => $x->getDesc(),
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
            
            $pstmt = $db->prepare("DELETE FROM ".Config::DB_TABLE_SALLE." WHERE ID = :x");
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
