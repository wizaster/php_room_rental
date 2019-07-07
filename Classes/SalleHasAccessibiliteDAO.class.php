<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/Accessibilite.class.php');

class SalleHasAccessibiliteDAO
{
    public function __construct()
    {
    }

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare(
                "INSERT INTO " . Config::DB_TABLE_SALACC . " (
                Salle_Id,
                Accessibilite_Id
                )
            VALUES (:salle, :equip)");

            $n = $pstmt->execute(array(
                ':salle' => $x->getSalleId(),
                ':equip' => $x->getAccessibiliteId()));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function getSalleId($accessId)
    {
        {
            try {
                $liste = array();
                $db = Database::getInstance();

                $res = $db->query("SELECT Salle_Id FROM " . Config::DB_TABLE_SALACC . " WHERE Accessibilite_Id = '" . $accessId . "'");
                foreach ($res as $row) {
                    array_push($liste, $row[0]);
                }
                return $liste;
                return $res;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br>";
                return $res;
            }
        }
    }
    
    public static function getAllAccessOfSalle($salleId)
    {
        $res = Array();
        
        try {

            $query = "SELECT Accessibilite_Id FROM " . Config::DB_TABLE_SALACC . " WHERE Salle_Id = '" . $salleId . "'";
            $cnx = Database::getInstance();

            $result = $cnx->query($query);
            foreach ($result as $row) {
                array_push($res, $row['Accessibilite_Id']);
            }
            $result->closeCursor();
            //$cnx->close();
            return $res;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $res;
        }
    }
            
            
    public function deleteSpecific($x, $y)
    {
        try {
            $db = Database::getInstance();

            $pstmt = $db->prepare("DELETE FROM " . Config::DB_TABLE_SALACC . " 
            WHERE 
            Salle_Id = :x 
            AND 
            Accessibilite_Id = :y");
            $n = $pstmt->execute(array(
                ':x' => $x,
                ':y' => $y));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function deleteAccessibiliteReferences($x)
    {
        try {
            $db = Database::getInstance();

            $pstmt = $db->prepare("DELETE FROM " . Config::DB_TABLE_SALACC . " WHERE Accessibilite_Id = :x");
            $n = $pstmt->execute(array(':x' => $x));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function deleteAllOfSalle($x)
    {
        try {
            $db = Database::getInstance();

            $pstmt = $db->prepare("DELETE FROM " . Config::DB_TABLE_SALACC . " WHERE Salle_Id = :x");
            $n = $pstmt->execute(array(':x' => $x));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

