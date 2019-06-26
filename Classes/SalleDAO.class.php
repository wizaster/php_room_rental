<?php
include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Salle.class.php');

class SalleDAO
{
    public function create($x) {
        try {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("INSERT INTO ".Config::DB_TABLE_SALLE.
                " (nom, superficie, capacite, adresse_Id, description, proprietaire_Id)
            VALUES (:nom, :sup, :cap, :add, :desc, :idProp)");
            $n = $pstmt->execute(array(
                ':nom' => $x->getNom(),
                ':sup' => $x->getSuperficie(),
                ':cap' => $x->getCapacite(),
                ':add' => $x->getAddresse(),
                ':desc' => $x->getDesc(),
                ':idProp' => $x->getIdProp()));
            
            $pstmt->closeCursor();
            //$db->close();
            return $n;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    public static function nbrUser()
    {
        $kweri = 'SELECT COUNT(*) FROM ' . Config::DB_TABLE_SALLE;
        $cnx = Database::getInstance();
        $res = $cnx->query($kweri);
        return $res;
    }
    public static function findAll()
    {
        try {
            $liste = Array();
                
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
            $liste = Array();
            
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
