<?php
include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Salle.class.php');

class SalleDAO
{
    public function __construct(){}
    
    public function create($x) {
        try {
            $db = Database::getInstance();
            var_dump($x);
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
            return $n;
        }
        catch(PDOException $e)
        {
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
        }
        catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br>";
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
        }
        catch(PDOException $e) 
        {
            throw $e;
        }
    }
    
    public static function findByVille($ville)
    {
        try 
        {
            $liste = Array();
            
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("SELECT * FROM ".Config::DB_TABLE_SALLE." WHERE VILLE = :x");
            $pstmt->execute(array(':x' => $ville));
            
                                    // TODO Pas sur!
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            foreach($result as $row) {
                $s = new Salle();
                
                $s->loadFromArray($row);
                
                array_push($liste,$s);
            }
            $pstmt->closeCursor();
            //$db->close();
            return liste;
        }
        catch(PDOException $e) 
        {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }
    
    public static function findByIdProp($idProp)
    {
        try 
        {
            $liste = Array();
            
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("SELECT * FROM ".Config::DB_TABLE_SALLE." WHERE IDPROP = :x");
            $pstmt->execute(array(':x' => $idProp));
            
                                    // TODO Pas sur!
            $result = $pstmt->fetch(PDO::FETCH_OBJ);
            
            foreach($result as $row) {
                $s = new Salle();
                
                $s->loadFromArray($row);
                
                array_push($liste,$s);
            }
            $pstmt->closeCursor();
            //$db->close();
            return liste;
        }
        catch(PDOException $e) 
        {
            print "Error!: ".$e->getMessage()."<br>";
            return $liste;
        }
    }
    
    public function update($x) {
		try
		{
			$db = Database::getInstance();
            
            $pstmt = $db->prepare(
                "UPDATE '".Config::DB_TABLE_SALLE."' SET 
                NOM = :nom, 
                SUPERFICIE = :sup, 
                CAPACITE = :cap,
                DESC = :des,
                STATUT = :sta, 
                SUPERFICIE = :s, 
                TARIF = :tar,
                CODE_POSTAL = :cod,
                PAYS = :pay, 
                PROVINCE = :pro, 
                VILLE = :vil,
                RUE = :rue,
                NO_CIVIQUE = :noc, 
                APPT_SUITE = :app
                WHERE ID = :i");
            
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
		}
		catch(PDOException $e)
		{
			throw $e;
		}
    }
    
    public function delete($x)
    {
        try
        {
            $db = Database::getInstance();
            
            $pstmt = $db->prepare("DELETE FROM ".Config::DB_TABLE_SALLE." WHERE ID = :x");
            $n = $pstmt->execute(array(':x' => $x));
            
            $pstmt->closeCursor();
            //$db->close();
            return $n;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }
}
