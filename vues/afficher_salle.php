<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
if (isset($_REQUEST['listing'])) {
    $salleId = $_REQUEST['listing'];
} else {
    $action = "afficher_salles";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ClassyAds &mdash; Colorlib Website Template</title>
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
include('header.php');
$image = ImageDAO::findBySalle($salleId);
$salle = SalleDAO::findById($salleId);
?>
<div class="site-blocks-cover inner-page-cover overlay" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="site-blocks-cover inner-page-cover overlay salleBanniere m-auto col-8"
        <?php
        if (!empty($image)) {
            ?>
            style="background-image: url(<?php echo $image[0][0] ?>);"
            <?php
        }
        ?>
    >
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1><?php echo $salle->getNom() ?></h1>
                        <p class="mb-0"></p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="">
            <div class="mb-5">
                <div class="col-12 m-auto">

                    <div class="mb-4 col-lg-6 col-sm-12">
                        <?php
                        if (!empty($image)) {
                            ?>
                            <div class="slide-one-item home-slider owl-carousel ">
                                <?php
                                foreach ($image as $img) {
                                    ?>
                                    <div class="imgSlide"><img src="<?php echo $img[0] ?>" alt="Image"
                                                               class="img-fluid"></div>
                                    <?php
                                }
                                ?>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div <?php
                    if (empty($image)){
                        ?> class="row col-4" <?php
                    } else {
                    ?> class="row testrow col-4"> <?php
                        }
                        ?>
                        <h4 class="h5 mb-4 text-black">Description</h4>
                        <p><?php echo $salle->getDesc() ?></p>
                    </div>
                    <div class="row col-6 m-auto">
                        <form>
                            <?php
                            if ($loggedIn) {
                                $user = UserDAO::findByUsername($_SESSION['connecte']);
                                switch ($user->getTypeutilisateurId()) {
                                    case 1:
                                        ?>
                                        <input type="hidden" name="salleId" value="<?php echo $salleId ?>"/>
                                        <input type="hidden" name="action" value="reserver_salle"/>
                                        <input type="submit" class="btn btn-primary btn-block rounded"
                                               value="Reserver cette salle"/>
                                        <?php
                                        break;
                                    case 2:
                                        if ($user->getId() == $salle->getIdProp()) {
                                            ?>
                                            <input type="hidden" name="salleId" value="<?php echo $salleId ?>"/>
                                            <input type="hidden" name="action" value="modifier_salle"/>
                                            <input type="submit" class="btn btn-primary btn-block rounded"
                                                   value="Modifier ma salle"/>
                                            <?php
                                        } else {
                                            ?>
                                            <input type="hidden" name="salleId" value="<?php echo $salleId ?>"/>
                                            <input type="hidden" name="action" value="reserver_salle"/>
                                            <input type="submit" class="btn btn-primary btn-block rounded"
                                                   value="Reserver cette salle"/>
                                            <?php
                                        }

                                        break;
                                    case 3:
                                        ?>
                                        <input type="hidden" name="salleId" value="<?php echo $salleId ?>"/>
                                        <input type="hidden" name="action" value="modifier_salle"/>
                                        <input type="submit" class="btn btn-primary btn-block rounded"
                                                   value="Modifier cette salle"/>
                                        <?php
                                        break;
                                }
                            } else {
                                ?>
                                <input type="hidden" name="salleId" value="<?php echo $salleId ?>"/>
                                <input type="hidden" name="action" value="connexion"/>
                                <input type="submit" class="btn btn-primary btn-block rounded"
                                        value="Reserver cette salle"/>
                                <?php
                            }
                            ?>
                        </form>

                    </div>
                </div>
            </div>


            <footer class="site-footer">
                <?php
                include('vues/footer.php');
                ?>
            </footer>
        </div>
    </div>
</div>

        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery-migrate-3.0.1.min.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery.stellar.min.js"></script>
        <script src="../js/jquery.countdown.min.js"></script>
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
        <script src="../js/aos.js"></script>
        <script src="../js/rangeslider.min.js"></script>

        <script src="../js/main.js"></script>

</body>
</html>