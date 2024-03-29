<?php
include_once('./Classes/Location.class.php');
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
if (isset($_SESSION['salleId'])) {
    $salleId = $_SESSION['salleId'];
} else {
    $action = "afficher_salles";
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
                        <h1>Reservation</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section m-auto">
    <div class="col-4 m-auto">
        <?php
        if (isset($_SESSION['msg']['err_validation'])) {
            ?>
            <div class="msg-conn"><?php echo $_SESSION['msg']['err_validation'] ?></div>
            <?php
            unset($_SESSION['msg']['err_validation']);
        }
        ?>
    </div>
    <form method="post" id="reservation_form">
        <div class="col-2 m-auto ">
            <label for="datepicker">Date de debut :</label><input type="text" name="dateDebut" id="datepicker"
                                                                  class="float-right"/><br/>
            <label for="datepickerFin">Date de fin :</label><input type="text" name="dateFin" id="datepickerFin"
                                                                   class="float-right"/><br/>
            <input type="hidden" name="action" value="valider_reservation"/>
            <input type="submit" value="valider" class="m-auto col-12 btn btn-primary btn-block rounded"/>
        </div>
        <div class="col-2 m-auto">
            <div>
                <table class="index_calendar">
                    <tr>
                        <td class="reserver"></td>
                        <td> = non disponible</td>
                    </tr>
                    <tr>
                        <td class="today"></td>
                        <td> = aujourdhui</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-8 m-auto">
            <?php
            include('vues/calendrier.php');
            ?>
        </div>

    </form>
</div>
<footer class="site-footer">
    <?php
    include('vues/footer.php');
    ?>
</footer>
</body>
</html>