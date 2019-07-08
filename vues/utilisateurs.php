<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
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
                        <h1>Utilisateur</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <?php
                $users = UserDAO::findAll();
                foreach($users as $user) {
                    ?>
                    <div class="d-block d-md-flex listing col-10">
                        <div class="container row">
                            <div class="container row">
                                <p>ID - Type : <?= $user->getId() . " - " . $user->getTypeutilisateurId() ?></p>
                            </div>
                            <div class="container row">
                                <p>Nom d'utilisateur : <?= $user->getNomUtilisateur() ?></p>
                            </div>
                            <div class="container row">
                                <p>Nom : <?= $user->getNom() ?></p>
                            </div>
                            <div class="container row">
                                <p>Prenom : <?= $user->getPrenom() ?></p>
                            </div>
                        </div>
                        <div class="container row">
                            <div class="container row">
                                <p>Adresse : <?= $user->getAdresse() ?></p>
                            </div>
                            <div class="container row">
                                <p>Email : <?= $user->getEmail() ?></p>
                            </div>
                            <div class="container row">
                                <p>Utilisateur depuis : <?= $user->getUserSince() ?></p>
                            </div>
                            <div class="container row">
                                <p>Description : <?= $user->getDescription() ?></p>
                            </div>
                        </div>
                        <div class="container lh-content col-2">
                            <form action="?action=supprimer_utilisateur" method="post">
                                <input type="hidden" name="userId" value="<?= $user->getId() ?>">
                                <input type="submit" name="btnSupprimer" value="Supprimer">
                            </form>
                        </div>
                    </div>
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
</body>
</html>