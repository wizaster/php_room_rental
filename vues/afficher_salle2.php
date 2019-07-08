<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
if (isset($_REQUEST['salleId'])) {
    $salleId = $_REQUEST['salleId'];
} else {
    return "afficher_salles";
}
?>
<!DOCTYPE html>
<html lang="en">
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
                        <h1>Votre reception de reve</h1>
                        <p class="mb-0">a portee de main</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="site-footer">
    <?php
    include('vues/footer.php');
    ?>
</footer>
</body>
</html>