<!DOCTYPE html>
<html lang="en">
<head>
    <title>Loue ta Salle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="./fonts/icomoon/style.css">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/magnific-popup.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <link rel="stylesheet" href="./css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="./fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="./css/aos.css">
    <link rel="stylesheet" href="./css/rangeslider.css">

    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<?php
// -- Contrôleur frontal --
require_once('./controleur/ActionBuilder.class.php');
if (ISSET($_REQUEST["action"])) {
    //$vue = ActionBuilder::getAction($_REQUEST["action"])->execute();
    /*
    Ou :*/
    $action = ActionBuilder::getAction($_REQUEST["action"]);
    /**/
} else {
    $action = ActionBuilder::getAction("");

}
//On exécute l'action du controleur:
$vue = $action->execute();
// On affiche la page (vue)
include_once('vues/' . $vue . '.php');
?>
<script src="./js/jquery-3.3.1.min.js"></script>
<script src="./js/jquery-migrate-3.0.1.min.js"></script>
<script src="./js/jquery-ui.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="./js/jquery.stellar.min.js"></script>
<script src="./js/jquery.countdown.min.js"></script>
<script src="./js/jquery.magnific-popup.min.js"></script>
<script src="./js/bootstrap-datepicker.min.js"></script>
<script src="./js/aos.js"></script>
<script src="./js/rangeslider.min.js"></script>
<script src="./js/script.js"></script>
<script src="./js/main.js"></script>
<script src="js/jquery.validate.js"></script>
</body>
</html>