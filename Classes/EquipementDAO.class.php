<?php

include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Equipement.class.php');

class EquipementDAO
{
    function __construct()
    {
    }

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare("INSERT INTO `" . config::DB_TABLE_EQUIP . "` (`nom`, `description`)
            VALUES(:nom, :description)");
            $n = $pstmt->execute(array(
                ':nom' => $x->getNom(),
                ':description' => getDescription()));
            $pstmt->closeCursor();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function findAll()
    {
        try {
            $liste = Array();

            $query = 'SELECT * FROM ' . Config::DB_TABLE_EQUIP;
            $cnx = Database::getInstance();

            $result = $cnx->query($query);
            foreach ($result as $row) {
                $s = new Equipement();

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

    public static function findByAnything($terme)
    {
        try {
            $liste = Array();

            $db = Database::getInstance();

            $pstmt = $db->prepare("SELECT * FROM " . Config::DB_TABLE_EQUIP . " WHERE 
            nom LIKE %" . ":x" . "% OR
            description LIKE %" . ":x" . "%");
            $pstmt->execute(array(':x' => $_REQUEST['main_recherche']));

            // TODO Pas sur!
            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            foreach ($result as $row) {
                $s = new Equipement();

                $s->loadFromArray($row);

                array_push($liste, $s);
            }
            $pstmt->closeCursor();
            //$db->close();
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }

}
