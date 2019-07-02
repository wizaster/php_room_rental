<?php
if (!isset($_SESSION)) {
    session_start();
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
                <form action="#" method="post" id="formAjout" class="p-5 bg-white" enctype="multipart/form-data">
                    <div class=" form-group">
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
                                    echo "<input type='checkbox' name='equipSalle[]' value='" . $equip->getNom() . "'/> " . "<label>" . $equip->getNom() . "</label><br/>";
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
                                    echo "<input type='checkbox' name='accessSalle[]' value='" . $access->getNom() . "'/> " . "<label>" . $access->getNom() . "</label><br/>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="roomAttr">
                            <div>
                                <h4>Images</h4>
                                <p>Il est fortement conseille de mettre plusieurs images de votre salle dans votre
                                    annonce</p>
                            </div>
                            <div>
                                <input type="file" name="uploadImage">
                                <button type="button" name="btnImageUpload">Ajouter</button>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="validerAction">
                        <input type="submit" name="valider_option" value="valider"
                               class="bg-primary text-white rounded">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
