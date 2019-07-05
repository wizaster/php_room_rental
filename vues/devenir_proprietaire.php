<?php

include_once('./Classes/User.class.php');
include_once('./Classes/UserDAO.class.php');

$uDao = new UserDAO();
$db = Database::getInstance();
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
include('header.php');
?>
    
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/banquet_login.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Votre Profil</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    

    <div class="col-2">
        <?php
            if ($_SESSION['role'] == 1) {
                ?>
                <div class="row">
                    <form action="#" method="post" id="Options" class="p-2">
                        <input type="submit" value="Devenir Proprietaire"/>
                        <input type="hidden" name="action" value="confirm_devenir_proprietaire"/>
                    </form>
                </div>
                <?php
            } else {
                ?>
                <div class="row">
                    <p>Vous êtes maintenant proprietaire!</p>
                </div>
                <?php
            }
        ?>
    </div>


    <footer class="site-footer">
        <?php
        include('vues/footer.php');
        ?>
    </footer>
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
