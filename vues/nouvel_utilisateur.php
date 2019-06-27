<?php

include_once('./Classes/User.class.php');
include_once('./Classes/UserDAO.class.php');

$uDao = new UserDAO();
$db = Database::getInstance();

$username = "";
$password = "";
$nom = "";
$prenom = "";
$email = "";
$adresse = "";
$noCivique = "";
$appt = "";
$rue = "";
$codePostal = "";
$province = "";
$pays = "";
$desc = "";

if (ISSET($_REQUEST['action'])) {
    $username = $_REQUEST['create-username'];
    $password = $_REQUEST['create-password'];
    var_dump($password);
    var_dump($password);
    var_dump($password);
    var_dump($password);
    var_dump($password);
    var_dump($password);
    var_dump($password);

    $nom = $_REQUEST['create-nom'];
    $prenom = $_REQUEST['create-prenom'];
    $email = $_REQUEST['create-email'];
    $noCivique = (int)$_REQUEST['noCivique-user'];
    $appt = $_REQUEST['app-user'];
    $rue = $_REQUEST['rue-user'];
    $codePostal = $_REQUEST['codePostal-user'];
    $province = $_REQUEST['province-user'];
    $pays = $_REQUEST['pays-user'];
    $desc = $_REQUEST['description-user'];
    $adresse = $noCivique . "," . $appt . "," . $rue . "," . $codePostal . "," . $province . "," . $pays;

    $user = new User($username, $password, $nom, $prenom, $adresse, $email, $desc);
    $uDao->create($user);
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
                            <h1>Devenir membre</h1>
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
                            <div class="row col-md-12">
                                <div class="col-5">
                                    <label class="text-black" for="create-username">Nom Utilisateur</label>
                                    <input type="text" name="create-username" class="form-control">
                                </div>
                                <div class="col-5">
                                    <label class="text-black" for="create-password">Mot de passe</label>
                                    <input type="password" name="create-password" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-5">
                                    <label class="text-black" for="create-prenom">Prénom</label>
                                    <input type="text" name="create-prenom" class="form-control">
                                </div>
                                <div class="col-5">
                                    <label class="text-black" for="create-nom">Nom</label>
                                    <input type="text" name="create-nom" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-10">
                                    <label class="text-black" for="create-email">Adresse courriel</label>
                                    <input type="email" name="create-email" class="form-control">
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="noCivique-user">No civique</label>
                                    <input type="number" name="noCivique-user" class="form-control">
                                </div>
                                <div class="col-2 form-room">
                                    <label class="text-black" for="app-user">Appartement</label>
                                    <input type="text" name="app-user" class="form-control">
                                </div>
                                <div class="col-7 form-room">
                                    <label class="text-black" for="rue-user">Rue</label>
                                    <input type="text" name="rue-user" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="codePostal-user">Code postal</label>
                                    <input type="text" name="codePostal-user" class="form-control">
                                </div>
                                <div class="col-4 form-room">
                                    <label class="text-black" for="province-user">Province</label>
                                    <input type="text" name="province-user" class="form-control">
                                </div>
                                <div class="col-5 form-room">
                                    <label class="text-black" for="pays-user">Pays</label>
                                    <input type="text" name="pays-user" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">
                                    <label class="text-black" for="description-user">Description</label>
                                    <div>Dites quelque chose à propos de vous</div>
                                    <textarea rows="5" name="description-user" class="form-control"></textarea>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">

                                </div>
                            </div>
                        </div>


                        <div class="row col-12">
                            <div class="col-12">
                                <input type="submit" name="create_user" value="Devenir membre"
                                       class="btn btn-primary py-2 px-4 text-white btn-suivant">
                                <input type="hidden" name="action" value="Devenir membre"/>
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

