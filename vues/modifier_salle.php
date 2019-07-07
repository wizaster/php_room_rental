<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');

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


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(./images/banquet_login.jpg);"
     data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Editer votre salle</h1>
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


                    <form action="#" method="post" id="formAjout" class="p-5 bg-white" enctype="multipart/form-data">

                        <div class=" form-group">

                            <div class=" row col-md-12">
                                <p>Veuillez remplir tous les champs.</p>
                            </div>
                            <div class="row col-12">
                                <div class="col-2 form-room">
                                    <label class="text-black" for="noCivique">No civique</label>
                                    <input type="text" id="noCivique" name="noCivique" class="form-control" value="<?= $_SESSION['salleEdit']->getNoCivique() ?>">
                                </div>
                                <div class="col-1 form-room">
                                    <label class="text-black" for="local_room">Local</label>
                                    <input type="text" id="local_room" name="local_room" class="form-control" value="<?= $_SESSION['salleEdit']->getApptSuite() ?>">
                                </div>
                                <div class="col-5 form-room">
                                    <label class="text-black" for="rue_room">Rue</label>
                                    <input type="text" id="rue_room" name="rue_room" class="form-control" value="<?= $_SESSION['salleEdit']->getRue() ?>">
                                </div>
                                <div class="col-4 form-room">
                                    <label class="text-black" for="ville_room">Ville</label>
                                    <input type="text" id="ville_room" name="ville_room" class="form-control" value="<?= $_SESSION['salleEdit']->getVille() ?>">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="codePostal_room">Code postal</label>
                                    <input type="text" id="codePostal_room" name="codePostal_room" class="form-control" value="<?= $_SESSION['salleEdit']->getCodePostal() ?>">
                                </div>
                                <div class="col-4 form-room">
                                    <label class="text-black" for="province_room">Province</label>
                                    <input type="text" id="province_room" name="province_room" class="form-control" value="<?= $_SESSION['salleEdit']->getProvince() ?>">
                                </div>
                                <div class="col-5 form-room">
                                    <label class="text-black" for="pays_room">Pays</label>
                                    <input type="text" id="pays_room" name="pays_room" class="form-control" value="<?= $_SESSION['salleEdit']->getPays() ?>">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">
                                    <label class="text-black" for="titre">Titre</label>
                                    <input type="text" id="titre" name="titre" class="form-control" value="<?= $_SESSION['salleEdit']->getNom() ?>">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">
                                    <label class="text-black" for="description_room">Description</label>
                                    <textarea rows="5" id="description_room" name="description_room"
                                              class="form-control"><?= $_SESSION['salleEdit']->getDesc()?></textarea>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row col-md-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="capaciteRoom">Capacité</label>
                                    <input type="text" id="capaciteRoom" name="capaciteRoom" class="form-control" value="<?= $_SESSION['salleEdit']->getCapacite() ?>"/>
                                </div>
                                <div class="col-3 form-room">
                                    <label class="text-black" for="superficieRoom">Superficie (en M²)</label>
                                    <input type="text" id="superficieRoom" name="superficieRoom" class="form-control" value="<?= $_SESSION['salleEdit']->getSuperficie() ?>"/>
                                </div>
                                <div class="col-3 form-room">
                                    <label class="text-black" for="prix_jour">Prix journalier</label>
                                    <input type="number" min="1" step="any" id="prix_jour" name="prix_jour" class="form-control" value="<?= $_SESSION['salleEdit']->getTarif() ?>"/>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class=" form-group">
                                    <div class="roomAttr">
                                        <div>
                                            <h4>Équipement disponible</h4>
                                            <p>Veuillez cocher tous les équipement disponible avec votre salle, avec ou
                                                sans
                                                supplément</p>
                                        </div>
                                        <div>
                                            <?php
                                            $eDao = new EquipementDAO();
                                            $liste = $eDao->findAll();
                                            foreach ($liste as $equip) {
                                                echo "<input type='checkbox' name='equipSalle[]' value='" . $equip->getId() . "'";
                                                foreach($_SESSION['salleEditEquipement'] as $salleEquip) {
                                                    if ($equip->getId() == $salleEquip) {
                                                        echo " checked ";
                                                    }
                                                }
                                                echo "/> " . "<label>" . $equip->getNom() . "</label><br/>";
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
                                                echo "<input type='checkbox' name='accessSalle[]' value='" . $access->getId() . "'";
                                                foreach($_SESSION['salleEditAccessibilite'] as $salleAccess) {
                                                    if ($access->getId() == $salleAccess) {
                                                        echo " checked ";
                                                    }
                                                }
                                                echo "/> " . "<label>" . $access->getNom() . "</label><br/>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="roomAttr images">
                                        <div>
                                            <h4>Images</h4>
                                            <p>Vous pouvez mettre jusqu'a 5 images sur votre annonce</p>
                                        </div>
                                        <div>
                                            <input type="file" name="uploadImage1">
                                            <input type="file" name="uploadImage2">
                                            <input type="file" name="uploadImage3">
                                            <input type="file" name="uploadImage4">
                                            <input type="file" name="uploadImage5">
                                        </div>


                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-12 form-room">
                                        <div>
                                            <input type="hidden" name="action" value="enregistrer_modifier_salle">
                                            <input type="submit" name="btnEnregistrer" id="btnEnregistrer" value="Enregistrer"
                                                   class="bg-primary text-white rounded">
                                        </div>
                                    </div>
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

