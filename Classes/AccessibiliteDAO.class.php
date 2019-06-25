<?php
include_once('./configs/config.php');
include_once('./Classes/Accessibilte.class.php');
include_once('./Database.class.php');

class AccessibilteDAO
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
                ':description' => getDescription()));
            $pstmt->closeCursor();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
