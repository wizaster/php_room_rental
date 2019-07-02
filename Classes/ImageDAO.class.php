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
            var_dump($x);
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

    public static function findById($id)
    {
        try {
            $db = Database::getInstance();

            $pstmt = $db->prepare("SELECT * FROM " . Config::DB_TABLE_IMAGE . " WHERE ID = :x");
            $pstmt->execute(array(':x' => $id));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if ($result) {
                $s = new Salle();
                $s->loadFromObject($result);

                $pstmt->closeCursor();
                return $s;
            }

            foreach ($result as $row) {
                $s = new Salle();

                $s->loadFromArray($row);

                array_push($liste, $s);
            }

            $pstmt->closeCursor();
            //$db->close();
            return null;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function findBySalle($salleId)
    {
        try {
            $liste = Array();

            $db = Database::getInstance();

            $pstmt = $db->prepare("SELECT * FROM " . Config::DB_TABLE_IMAGE . " WHERE salle_Id = :x");
            $pstmt->execute(array(':x' => $salleId));

            // TODO Pas sur!
            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            foreach ($result as $row) {
                $s = new Image();

                $s->loadFromArray($row);

                array_push($liste, $s);
            }
            $pstmt->closeCursor();
            //$db->close();
            return liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }

    public function update($x)
    {
        try {
            $db = Database::getInstance();

            $pstmt = $db->prepare(
                "UPDATE " . Config::DB_TABLE_IMAGE . " SET 
                emplacement = :nom, 
                salle_Id = :sid
                WHERE ID = :i");

            $n = $pstmt->execute(array(
                ':emp' => $x->getEmplsacement(),
                ':sid' => $x->getsalleId(),
                ':i' => $x->getId()));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function delete($x)
    {
        try {
            $db = Database::getInstance();

            $pstmt = $db->prepare("DELETE FROM " . Config::DB_TABLE_IMAGE . " WHERE ID = :x");
            $n = $pstmt->execute(array(':x' => $x));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}