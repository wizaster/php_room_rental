<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
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
include('header.php');
?>
</header>


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/banquet_login.jpg);"
     data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Connectez-vous</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5" data-aos="fade">


                <form action="#" class="p-5 bg-white">
                    <?php
                    if (ISSET($_SESSION['msg']['err_connection'])) {
                        ?>
                        <div class="msg-conn">
                            <p><?php echo $_SESSION['msg']['err_connection'] ?></p>
                        </div>
                        <?php
                        unset($_SESSION['msg']['err_connection']);
                    }
                    if (ISSET($_SESSION['msg']['succ_deconnection'])) {
                        ?>
                        <div class="msg-succ">
                            <p><?php echo $_SESSION['msg']['succ_deconnection'] ?></p>
                        </div>
                        <?php
                        unset($_SESSION['msg']['succ_deconnection']);
                    }
                    ?>


                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="username">Nom utilisateur</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Mot de passe</label>
                            <input type="password" name="password" id="subject" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12">
                            <p>Vous n'êtes pas membre ? <a href="?action=nouvel_utilisateur">Soyez-le en deux
                                    minutes!</a></p>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="action" value="connecte">
                            <input type="submit" value="Se connecter" class="btn btn-primary py-2 px-4 text-white">
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