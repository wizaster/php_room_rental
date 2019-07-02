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
            var_dump($x);
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

    public function delete($x, $y)
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
}

