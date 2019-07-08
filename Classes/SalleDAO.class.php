<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Salle.class.php');

class SalleDAO
{
    public function __construct(){}
    
    public static function create($x) {
        try {
            $db = Database::getInstance();
            //var_dump($x);
            $pstmt = $db->prepare(
                "INSERT INTO " . Config::DB_TABLE_SALLE . " (
                nom,
                superficie,
                capacite,
                description,
                tarif,
                no_civique,
                appt_suite,
                rue,
                code_postal,
                ville,
                province,
                pays,
                proprietaire_Id
                )
            VALUES (:nom, :sup, :cap, :descr, :tar, :nociv, :apsu, :rue, :code, :ville, :prov, :pays, :idProp)");

            $n = $pstmt->execute(array(
                ':nom' => $x->getNom(),
                ':sup' => $x->getSuperficie(),
                ':cap' => $x->getCapacite(),
                ':descr' => $x->getDesc(),
                ':tar' => $x->getTarif(),
                ':nociv' => $x->getNoCivique(),
                ':apsu' => $x->getApptSuite(),
                ':rue' => $x->getRue(),
                ':code' => $x->getCodePostal(),
                ':ville' => $x->getVille(),
                ':prov' => $x->getProvince(),
                ':pays' => $x->getPays(),
                ':idProp' => $x->getIdProp()));

            $pstmt->closeCursor();
            //$db->close();
            if ($n) {
                return $db->lastInsertId();
            } else {
                return 0;
            }
        } catch(PDOException $e) {
            throw $e;
        }
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
        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }

    public static function findAllWithPages()
    {
        try {
            $liste = Array();

            $query = 'SELECT * FROM ' . Config::DB_TABLE_SALLE . ' LIMIT ' . $_SESSION['offset'] . ', ' . $_SESSION['rowsperpage'];
            $cnx = Database::getInstance();

            $result = $cnx->query($query);
            foreach ($result as $row) {
                $s = new Salle();

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
            
            foreach($result as $row) {
                $s = new Salle();
                
                $s->loadFromArray($row);
                
                array_push($liste,$s);
            }
            
            $pstmt->closeCursor();
            //$db->close();
            return null;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    
    public static function findByVille($ville)
    {
        $liste = Array();
        
        try 
        {
            $db = Database::getInstance();
            $res = $db->query("SELECT * FROM salle WHERE  ville = '" . $ville . "'");
            foreach ($res as $row) {
                $obj = new Salle();
                $obj->loadFromArray($row);
                array_push($liste, $obj);
            }
            return $liste;
        } catch(PDOException $e) {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }
    
    public static function findByIdProp($idProp)
    {
        $liste = Array();
        $db = Database::getInstance();
        try {
            $stmt = $db->prepare("SELECT * FROM " . config::DB_TABLE_SALLE . " where proprietaire_Id = :x");
            if ($stmt->execute(array(':x' => $idProp))) {
                while ($row = $stmt->fetch()) {
                    $l = new Salle();

                    $l->loadFromArray($row);

                    array_push($liste, $l);
                }
                return $liste;
            }
        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }
    
    public static function update($x) {
        try
        {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare(
                "UPDATE ".Config::DB_TABLE_SALLE." SET 
                nom = :nom , 
                superficie = :sup , 
                capacite = :cap ,
                description = :des ,
                statut = :sta ,
                tarif = :tar ,
                code_postal = :cod ,
                pays = :pay , 
                province = :pro , 
                ville = :vil ,
                rue = :rue ,
                no_civique = :noc , 
                appt_suite = :app
                WHERE Id = :i");
            
            $n = $pstmt->execute(array(
                ':nom' => $x->getNom(),
                ':sup' => $x->getSuperficie(),
                ':cap' => $x->getCapacite(),
                ':des' => $x->getDesc(),
                ':sta' => $x->getStatut(),
                ':tar' => $x->getTarif(),
                ':cod' => $x->getCodePostal(),
                ':pay' => $x->getPays(),
                ':pro' => $x->getProvince(),
                ':vil' => $x->getVille(),
                ':rue' => $x->getRue(),
                ':noc' => $x->getNoCivique(),
                ':app' => $x->getApptSuite(),
                ':i' => $x->getId()));
            
            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch(PDOException $e) {
            throw $e;
        }
    }

    public static function findByAnything()
    {
        try {
            $db = Database::getInstance();

            $liste = array();


            $lieux = $_REQUEST['main_recherche_lieu'];
            $therme = $_REQUEST['main_recherche'];
            $res = $db->query("SELECT * FROM salle WHERE (description LIKE '%" . $therme . "%' OR nom LIKE '%" . $therme . "%') AND ville = '" . $lieux . "'");
            foreach ($res as $row) {
                $obj = new Salle();
                $obj->loadFromArray($row);
                array_push($liste, $obj);
            }
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }

    public static function findAllCities()
    {
        try {
            $db = Database::getInstance();
            $liste = array();
            $res = $db->query("SELECT distinct ville FROM salle WHERE ville <> ' '");
            foreach ($res as $row) {
                array_push($liste, $row['ville']);
            }
            return $liste;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }
    
    public static function matchesWithProp($x, $y)
    {
        try 
        {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("SELECT ID FROM ".Config::DB_TABLE_SALLE." WHERE ID = :x AND proprietaire_Id = :y");
            $pstmt->execute(array(':x' => $x, ':y' => $y));
            
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            $pstmt->closeCursor();
            //$db->close();
            
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            throw $e;
        }
    }
    
    public static function delete($x)
    {
        try
        {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("DELETE FROM ".Config::DB_TABLE_SALLE." WHERE ID = :x");
            $n = $pstmt->execute(array(':x' => $x));
            
            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch(PDOException $e) {
            throw $e;
        }
    }

    public static function getCountSalles()
    {
        $liste = Array();
        $db = Database::getInstance();
        try {
            $stmt = $db->prepare("SELECT count(*) FROM " . config::DB_TABLE_SALLE);
            if ($stmt->execute(array())) {
                while ($row = $stmt->fetch()) {
                    return $row;
                }
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            return $liste;
        }
    }
}
