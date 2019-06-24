<?php

include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/User.class.php');

class UserDAO
{
    public function __construct()
    {
    }

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare("INSERT INTO `" . config::DB_TABLE_USER . "` (`password`, `nomUtilisateur`
                , `email`, `nom`, `prenom`, `adresse`, `description`, `Type_utilisateur_Id`)
             VALUES(:passwd, :username, :email, :nom
                , :prenom, :adresse, :description, :usertype)");
            $n = $pstmt->execute(array(
                ':passwd' => $x->getPassword(),
                ':username' => $x->getUsername(),
                ':email' => $x->getEmail(),
                ':nom' => $x->getNom(),
                ':prenom' => $x->getPrenom(),
                ':adresse' => $x->getAdresse(),
                ':description' => $x->getDescription(),
                ':usertype' => $x->getUserType()));
            $pstmt->closeCursor();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}