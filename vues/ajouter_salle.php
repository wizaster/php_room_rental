<?php
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/salle_adresseDAO.class.php');
include_once('./Classes/Salle_adresse.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');


$sDao = new SalleDAO();
$saDao = new salle_adresseDAO();
$db = Database::getInstance();

$no_civique = "";
$no_local = "";
$rue = "";
$ville = "";
$code_postal = "";
$province = "";
$pays = "";
$superficie = "";
$capacite = "";
$titre = "";
$desc = "";

if (ISSET($_REQUEST['btn'])) {
    $no_civique = $_REQUEST['noCivique'];
    $no_local = $_REQUEST['local-room'];
    $rue = $_REQUEST['rue-room'];
    $ville = $_REQUEST['ville-room'];
    $code_postal = $_REQUEST['codePostal-room'];
    $province = $_REQUEST['province-room'];
    $pays = $_REQUEST['pays-room'];
    $superficie = (int)$_REQUEST['superficie'];
    $capacite = (int)$_REQUEST['capacite'];
    $titre = $_REQUEST['titre'];
    $desc = $_REQUEST['description-room'];
    $adresse = new Salle_adresse($no_civique, $no_local, $rue, $ville, $code_postal, $province, $pays);
    $adr = $saDao->create($adresse);
    $id_adr = $db->lastInsertId();
    $salle = new Salle($titre, $superficie, $capacite, $id_adr, $desc, 1);
    $res = $sDao->create($salle);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Abbys'List - Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/rangeslider.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<?php
include('vues/header.php');
?>
    </header>


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(./images/banquet_login.jpg);"
     data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Afficher votre salle</h1>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-12" data-aos="fade">


                    <form action="#" method="post" class="p-5 bg-white">

                        <div class=" form-group">

                            <div class=" row col-md-12">
                                <p>Veuillez remplir tous les champs.</p>
                            </div>
                            <div class="row col-12">
                                <div class="col-2 form-room">
                                    <label class="text-black" for="noCivique">No civique</label>
                                    <input type="text" name="noCivique" class="form-control">
                                </div>
                                <div class="col-1 form-room">
                                    <label class="text-black" for="local-room">Local</label>
                                    <input type="text" name="local-room" class="form-control">
                                </div>
                                <div class="col-5 form-room">
                                    <label class="text-black" for="rue-room">Rue</label>
                                    <input type="text" name="rue-room" class="form-control">
                                </div>
                                <div class="col-4 form-room">
                                    <label class="text-black" for="ville-room">Ville</label>
                                    <input type="text" name="ville-room" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="codePostal-room">Code postal</label>
                                    <input type="text" name="codePostal-room" class="form-control">
                                </div>
                                <div class="col-4 form-room">
                                    <label class="text-black" for="province-room">Province</label>
                                    <input type="text" name="province-room" class="form-control">
                                </div>
                                <div class="col-5 form-room">
                                    <label class="text-black" for="pays-room">Pays</label>
                                    <input type="text" name="pays-room" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">
                                    <label class="text-black" for="titre">Titre</label>
                                    <input type="text" name="titre" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">
                                    <label class="text-black" for="description-room">Description</label>
                                    <textarea rows="5" name="description-room" class="form-control"></textarea>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row col-md-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="capaciteRoom">Capacité</label>
                                    <input type="text" name="capaciteRoom" class="form-control"/>
                                </div>
                                <div class="col-3 form-room">
                                    <label class="text-black" for="superficieRoom">Superficie (en M²)</label>
                                    <input type="text" name="superficieRoom" class="form-control"/>
                                </div>
                                <div class="col-3 form-room">
                                    <label class="text-black" for="prix_jour">Prix journalier</label>
                                    <input type="text" min="1" step="any" name="prix_jour" class="form-control"/>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">

                                </div>
                            </div>
                        </div>


                        <div class="row col-12">
                            <div class="form-room col-12">
                                <input type="button" value="Suivant"
                                       class="btn btn-primary py-2 px-4 text-white btn-suivant" id="btn-suivant">
                            </div>
                        </div>

                        <div class="roomAttr">
                            <div>
                                <h4>Équipement disponible</h4>
                                <p>Veuillez cocher tous les équipement disponible avec votre salle, avec ou sans
                                    supplément</p>
                            </div>
                            <div>
                                <?php
                                $eDao = new EquipementDAO();
                                $liste = $eDao->findAll();
                                foreach ($liste as $equip) {
                                    echo "<input type='checkbox' name='allo' value='allo'/> " . "<label>" . $equip->getNom() . "</label><br/>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="roomAttr">
                            <div>
                                <h4>Éléments d'accessibilté</h4>
                                <p>Veuillez cocher tous les accomodements près de votre salle</p>
                            </div>
                            <div>
                                <?php
                                $aDao = new AccessibiliteDAO();
                                $listeAccess = $aDao->findAll();
                                foreach ($listeAccess as $access) {
                                    echo "<input type='checkbox' name='allo' value='allo'/> " . "<label>" . $access->getNom() . "</label><br/>";
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="newsletter bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Newsletter</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-md-6">

                    <form class="d-flex">
                        <input type="text" class="form-control" placeholder="Email">
                        <input type="submit" value="Subscribe" class="btn btn-white">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <?php
        include('vues/footer.php');
        ?>
    </footer>
</div>



</body>

