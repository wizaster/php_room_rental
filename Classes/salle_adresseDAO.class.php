<?php
include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Salle_adresse.class.php');

class Salle_adresseDAO
{
    public function __construct()
    {

    }

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare("INSERT INTO `" . config::DB_TABLE_ADRESSE . "`(`no_civique`, `no_local`, `rue`, `ville`, `code_postal`, `province`, `pays`)
             VALUES(:no_civique, :no_local, :rue, :ville
                , :code_postal, :province, :pays)");
            $n = $pstmt->execute(array(
                ':no_civique' => (int)$x->getNoCivique(),
                ':no_local' => $x->getNoLocal(),
                ':rue' => $x->getRue(),
                ':ville' => $x->getVille(),
                ':code_postal' => $x->getCodePostal(),
                ':province' => $x->getProvince(),
                ':pays' => $x->getPays()));
            $pstmt->closeCursor();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }

}