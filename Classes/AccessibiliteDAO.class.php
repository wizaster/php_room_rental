<?php
include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Accessibilite.class.php');


class AccessibiliteDAO
{
    function __construct()
    {
    }

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare("INSERT INTO `" . config::DB_TABLE_ACCESS . "` (`nom`, `description`)
            VALUES(:nom, :description)");
            $n = $pstmt->execute(array(
                ':nom' => $x->getNom(),
                ':description' => $x->getDescription()));
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

            $query = 'SELECT * FROM ' . Config::DB_TABLE_ACCESS;
            $cnx = Database::getInstance();

            $result = $cnx->query($query);
            foreach ($result as $row) {
                $s = new Accessibilite();

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

            $liste = array();


            $therme = $_REQUEST['main_recherche'];
            $res = $db->query("SELECT * FROM " . Config::DB_TABLE_ACCESS . " WHERE description LIKE '%" . $therme . "%' OR nom LIKE '%" . $therme . "%'");
            foreach ($res as $row) {
                array_push($liste, $row);
            }
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }
}
