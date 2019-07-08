<?php

include_once('./Classes/User.class.php');
include_once('./Classes/UserDAO.class.php');

$uDao = new UserDAO();
$db = Database::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
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
</body>

