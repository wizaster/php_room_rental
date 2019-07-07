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
    <title>ClassyAds &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
                        <h1>Erreur</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section m-auto">
    <br/><br/><br/><br/><br/><br/>
    <div class="col-4 m-auto">
        <?php
        if (isset($_SESSION['msg']['err_erreur'])) {
            ?>
            <div class="msg-conn"><?php echo $_SESSION['msg']['err_validation'] ?></div>
            <?php
            unset($_SESSION['msg']['err_erreur']);
        }
        ?>
        <a href="?action=default" class="cta"><span
                    class="bg-primary text-white rounded">Retour a la page d'acceuil</span></a>
    </div>
</div>

<footer class="site-footer">
    <?php
    include('vues/footer.php');
    ?>
</footer>
</body>


</html>