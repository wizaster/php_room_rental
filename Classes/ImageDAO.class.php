<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Image.class.php');

class ImageDAO
{
    public function __construct()
    {
    }

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare(
                "INSERT INTO " . Config::DB_TABLE_IMAGE . " (
                emplacement,
                salle_Id
                )
            VALUES (:emp, :sid)");

            $n = $pstmt->execute(array(
                ':emp' => $x->getEmplacement(),
                ':sid' => $x->getSalleId()));


            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function findAll()
    {
        try {
            $liste = Array();

            $query = 'SELECT * FROM ' . Config::DB_TABLE_IMAGE;
            $cnx = Database::getInstance();

            $result = $cnx->query($query);
            foreach ($result as $row) {
                $s = new Image();

                $s->loadFromArray($row);

                array_push($liste, $s);
            }
            $result->closeCursor();
            //$cnx->close();
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }

    public static function findBySalle($salleId)
    {
        try {
            $liste = Array();

            $db = Database::getInstance();
            $res = $db->query("SELECT emplacement FROM " . Config::DB_TABLE_IMAGE . " WHERE salle_Id = '" . $salleId . "'");
            foreach ($res as $row) {
                array_push($liste, $row);
            }
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }

    public static function delete($emplacement)
    {
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare(
                "DELETE FROM " . Config::DB_TABLE_IMAGE . " WHERE emplacement = :emp");

            $n = $pstmt->execute(array(
                ':emp' => $emplacement));


            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }


}