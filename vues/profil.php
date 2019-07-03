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
    <title>Abbys'List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/rangeslider.css">

    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
<?php
include('header.php');
?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(./images/banquet_login.jpg);"
     data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Profil</h1>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="site-section bg-light ">
    <div class="container row col-12 profil">
        <div class=" m-auto">
            <fieldset>
                <legend>Informations personnelles</legend>
                <div>Nom Utilisateur :</div>
                <div><?php echo $_SESSION['connecte'] ?></div>
                <br/>
                <div>Prenom :</div>
                <div><?php echo $_SESSION['user']['prenom'] ?></div>
                <br/>
                <div>Nom :</div>
                <div><?php echo $_SESSION['user']['nom'] ?></div>
                <br/>
                <div>Adresse :</div>
                <div><?php echo $_SESSION['user']['adresse'] ?></div>
                <br/>
                <div>Email :</div>
                <div><?php echo $_SESSION['user']['email'] ?></div>
                <br/>
                <div>Membre depuis :</div>
                <div><?php echo $_SESSION['user']['membreDepuis'] ?></div>
                <br/>
                <div>Bio :</div>
                <div><?php echo $_SESSION['user']['bio'] ?></div>
                <br/>
            </fieldset>
        </div>
        <div class="col-6">
            <?php
            switch ($_SESSION['role']) {
                case 1:
                    ?>
                    <input type="button" value="consulter_historique">consulter historique</input>
                    <input type="button" value="Editer_utilisateur">Editer utilisateur</input>
                    <input type="button" value="Editer_salle">Editer salle</input>
                    <?php
                    break;
                case 2:
                    ?>
                    <input type="button" value="modifier salle"/>
                    <input type="button" value="modifer profil"/>
                    <input type="button" value="Ajouter salle"/>
                    <?php
                    break;
                case 3:
                    ?>
                    <input type="button" value="devenir proprietaire"/>
                <?php
            }
            ?>

        </div>
    </div>
</div>

<footer class="site-footer">
    <?php
    include('vues/footer.php');
    ?>
</footer>


<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/jquery.countdown.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/rangeslider.min.js"></script>
<script src="/js/script.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
